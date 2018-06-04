<?php

namespace Tests\Unit;

use App\Brand;
use App\Http\Controllers\BrandController;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;

class BrandControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Mockery\Mock|\Illuminate\Database\Connection
     */
    protected $db;
    /**
     * @var \Mockery\Mock|App\Brand
     */
    protected $brandMock;

    public function setUp()
    {
        $this->afterApplicationCreated(function () {
            $this->db = m::mock(
                Connection::class.'[select,update,insert,delete]',
                [m::mock(\PDO::class)]
            );
            $manager = $this->app['db'];
            $manager->setDefaultConnection('mock');
            $r = new \ReflectionClass($manager);
            $p = $r->getProperty('connections');
            $p->setAccessible(true);
            $list = $p->getValue($manager);
            $list['mock'] = $this->db;
            $p->setValue($manager, $list);
            $this->brandMock = m::mock(Brand::class.'[update, delete]');
        });
        parent::setUp();
    }

    public function test_index_returns_view()
    {
        $controller = new BrandController();
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "brand"',
            [],
            m::any(),
        ])->andReturn((object) ['aggregate' => 10]);
        $view = $controller->index();
        $this->assertEquals('brand.list', $view->getName());
        $this->assertArrayHasKey('brand', $view->getData());
    }

    public function test_it_stores_new_brand()
    {
        $controller = new BrandController();
        $data = [
            'name' => 'Nova Marca',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once();
        $this->db->getPdo()->shouldReceive('lastInsertId')->andReturn(333);
        $this->db->shouldReceive('insert')->once()
            ->withArgs([
                'insert into "brand" ("name", "updated_at", "created_at") values (?, ?, ?)',
                m::on(function ($arg) {
                    return is_array($arg) &&
                        $arg[0] == 'Nova Marca';
                }),
            ])
            ->andReturn(true);
        /** @var RedirectResponse $response */
        $response = $controller->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('brand.index'), $response->headers->get('Location'));
        $this->assertEquals(333, $response->getSession()->get('created'));
    }

    public function test_it_throws_error_on_duplicate_name()
    {
        $controller = new BrandController();
        $data = [
            'name' => 'Nova Marca',
        ];
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "brand" where "name" = ?',
            ['Nova Marca'],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 1]]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $this->expectException(ValidationException::class);
        $controller->store($request);
    }

    public function test_store_new_city_throw_query_exception()
    {
        $controller = new BrandController();
        $data = [
            'name' => 'Nova Marca',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once();
        $this->db->shouldReceive('insert')->once()
            ->withArgs([
                'insert into "brand" ("name", "updated_at", "created_at") values (?, ?, ?)',
                m::on(function ($arg) {
                    return is_array($arg) &&
                        $arg[0] == 'Nova Marca';
                }),
            ])
            ->andReturnUsing(function () {
                throw new QueryException('', [], new \Exception());
            });
        /** @var RedirectResponse $response */
        $response = $controller->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
        $this->assertArrayHasKey('system', $response->getSession()->get('errors')->messages());
    }

    public function test_it_fires_event_and_shows_city()
    {
        $controller = new BrandController();
        $city = new City(['id' => 111]);
        $events = m::mock(Dispatcher::class);
        $events->shouldReceive('dispatch')->with(m::on(function ($arg) use ($brand) {
            return $arg instanceof BrandShown && $arg->brand === $brand;
        }));
        $view = $controller->show($events, $brand);
        $this->assertEquals('brand.item', $view->getName());
        $this->assertArrayHasKey('brand', $view->getData());
    }

    public function test_create_returns_view()
    {
        $controller = new BrandController();
        $view = $controller->create();
        $this->assertEquals('brand.form', $view->getName());
        $this->assertArraySubset(['brand' => null], $view->getData());
    }

    public function test_edit_brand()
    {
        $cityInfo = ['id' => 1, 'name' => 'Nova Marca'];
        $brand = new Brand($brandInfo);
        $controller = new BrandController();
        $view = $controller->edit($brand);
        $this->assertEquals('brand.form', $view->getName());
        $this->assertArraySubset(['brand' => $brand], $view->getData());
    }

    public function test_update_existing_brand()
    {
        $controller = new BrandController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Marca',
        ];
        $brand = $this->brandMock->forceFill(['id' => 1, 'name' => 'Marca Antiga']);
        $newBrand = (new Brand())->forceFill(['id' => 1, 'name' => $data['name']]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "brand" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 0]]);
        $this->brandMock->shouldReceive('update')->once()->withArgs([
            m::on(function ($arg) {
                return is_array($arg) && $arg['name'] == 'Nova Marca';
            }
        ), ])->andReturn($newBrand);
        $this->db->getPdo()->shouldReceive('lastInsertId')->andReturn($data['id']);
        $response = $controller->update($request, $brand);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('brand.index'), $response->headers->get('Location'));
        $this->assertEquals($data['id'], $response->getSession()->get('updated'));
    }

    public function test_update_throws_error_on_duplicate_name()
    {
        $controller = new BrandController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Marca',
        ];
        $brand = new Brand();
        $brand->forceFill(['id' => 1, 'name' => $data['name']]);
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "brand" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 1]]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $this->expectException(ValidationException::class);
        $controller->update($request, $brand);
    }

    public function test_update_existing_brand_throw_query_exception()
    {
        $controller = new BrandController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Marca',
        ];
        $brand = $this->brandMock->forceFill(['id' => 1, 'name' => 'Marca Antiga']);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "brand" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 0]]);
        $this->brandMock->shouldReceive('update')->once()->withArgs([
            m::on(function ($arg) {
                return is_array($arg) && $arg['name'] == 'Nova Marca';
            }
        ), ])->andThrow(new QueryException('', [], new \Exception()));
        $response = $controller->update($request, $brand);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
        $this->assertArrayHasKey('system', $response->getSession()->get('errors')->messages());
    }

    public function test_destroy_existing_brand()
    {
        $controller = new BrandController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Marca',
        ];
        $brand = $this->brandMock->forceFill($data);
        $this->brandMock->shouldReceive('delete')->once()->andReturn(true);
        $response = $controller->destroy($brand);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('brand.index'), $response->headers->get('Location'));
        $this->assertEquals($data['id'], $response->getSession()->get('deleted'));
    }

    public function test_destroy_existing_brand_throw_query_exception()
    {
        $controller = new BrandController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Marca',
        ];
        $brand = $this->brandMock->forceFill($data);
        $this->brandMock->shouldReceive('delete')->once()->andReturnUsing(function () {
            throw new QueryException('', [], new \Exception());
        });
        $response = $controller->destroy($brand);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
        $this->assertArrayHasKey('system', $response->getSession()->get('errors')->messages());
    }
}