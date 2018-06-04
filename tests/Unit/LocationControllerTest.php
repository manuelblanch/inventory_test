<?php

namespace Tests\Unit;
use App\Http\Controllers\LocationController;
use Illuminate\Http\RedirectResponse;
use App\Location;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Tests\TestCase;
use Illuminate\Http\Request;
use Mockery;


class LocationControllerTest extends \PHPUnit_Framework_TestCase
{

  /**
     * @var \Mockery\Mock|\Illuminate\Database\Connection
     */
    protected $db;
    /**
     * @var \Mockery\Mock|App\Location
     */
    protected $locationMock;
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
            $this->locationMock = m::mock(Location::class . '[update, delete]');
        });
        parent::setUp();
    }


    public function test_index_returns_view()
    {
        $controller = new LocationController();
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "location"',
            [],
            m::any(),
        ])->andReturn((object) ['aggregate' => 10]);
        $view = $controller->index();
        $this->assertEquals('location.list', $view->getName());
        $this->assertArrayHasKey('location', $view->getData());
    }
    public function test_it_stores_new_location()
    {
        $controller = new LocationController();
        $data = [
            'name' => 'Nova Localitzacio',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once();
        $this->db->getPdo()->shouldReceive('lastInsertId')->andReturn(333);
        $this->db->shouldReceive('insert')->once()
            ->withArgs([
                'insert into "location" ("name", "updated_at", "created_at") values (?, ?, ?)',
                m::on(function ($arg) {
                    return is_array($arg) &&
                        $arg[0] == 'Nova Localitzacio';
                })
            ])
            ->andReturn(true);
        /** @var RedirectResponse $response */
        $response = $controller->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('location.index'), $response->headers->get('Location'));
        $this->assertEquals(333, $response->getSession()->get('created'));
    }
    public function test_it_throws_error_on_duplicate_name()
    {
        $controller = new LocationController();
        $data = [
            'name' => 'Nova localitzacio',
        ];
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "location" where "name" = ?',
            ['Nova Localitzacio'],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 1]]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $this->expectException(ValidationException::class);
        $controller->store($request);
    }
    public function test_store_new_location_throw_query_exception()
    {
        $controller = new LocationController();
        $data = [
            'name' => 'Nova Localitzacio',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once();
        $this->db->shouldReceive('insert')->once()
            ->withArgs([
                'insert into "location" ("name", "updated_at", "created_at") values (?, ?, ?)',
                m::on(function ($arg) {
                    return is_array($arg) &&
                        $arg[0] == 'Nova Localitzacio';
                })
            ])
            ->andReturnUsing(function() {
                throw new QueryException('', [], new \Exception);
            });
        /** @var RedirectResponse $response */
        $response = $controller->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
        $this->assertArrayHasKey('system', $response->getSession()->get('errors')->messages());
    }
    public function test_it_fires_event_and_shows_location()
    {
        $controller = new LocationController();
        $location = new Location(['id' => 111]);
        $events = m::mock(Dispatcher::class);
        $events->shouldReceive('dispatch')->with(m::on(function ($arg) use ($location) {
            return $arg instanceof BrandShown && $arg->brand === $brand;
        }));
        $view = $controller->show($events, $location);
        $this->assertEquals('location.item', $view->getName());
        $this->assertArrayHasKey('location', $view->getData());
    }
    public function test_create_returns_view()
    {
        $controller = new LocationController();
        $view = $controller->create();
        $this->assertEquals('location.create', $view->getName());
        $this->assertArraySubset(['location' => null], $view->getData());
    }
    public function test_edit_location()
    {
        $locationInfo = ['id' => 1, 'name' => 'Nova Localitzacio'];
        $location = new Location($locationInfo);
        $controller = new LocationController();
        $view = $controller->edit($location);
        $this->assertEquals('brand.form', $view->getName());
        $this->assertArraySubset(['location' => $location], $view->getData());
    }
    public function test_update_existing_location()
    {
        $controller = new LocationController();
        $data = [
            'id' => 1,
            'name' => 'Nova Localitzacio',
        ];
        $location = $this->locationMock->forceFill(['id' => 1, 'name' => 'Localitzacio Antiga']);
        $newLocation = (new Location())->forceFill(['id' => 1, 'name' => $data['name']]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "location" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 0]]);
        $this->brandMock->shouldReceive('update')->once()->withArgs([
            m::on(function($arg) {
                return is_array($arg) && $arg['name'] == 'Nova Localitzacio';
            }
        )])->andReturn($newLocation);
        $this->db->getPdo()->shouldReceive('lastInsertId')->andReturn($data['id']);
        $response = $controller->update($request, $location);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('location.index'), $response->headers->get('Location'));
        $this->assertEquals($data['id'], $response->getSession()->get('updated'));
    }
    public function test_update_throws_error_on_duplicate_name()
    {
        $controller = new LocactionController();
        $data = [
            'id' => 1,
            'name' => 'Nova Localitzacio',
        ];
        $location = new Location();
        $location->forceFill(['id' => 1, 'name' => $data['name']]);
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "location" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 1]]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $this->expectException(ValidationException::class);
        $controller->update($request, $location);
    }
    public function test_update_existing_location_throw_query_exception()
    {
        $controller = new LocationController();
        $data = [
            'id' => 1,
            'name' => 'Nova Localitzacio',
        ];
        $brand = $this->brandMock->forceFill(['id' => 1, 'name' => 'Localitzacio Antiga']);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "location" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 0]]);
        $this->locationMock->shouldReceive('update')->once()->withArgs([
            m::on(function($arg) {
                return is_array($arg) && $arg['name'] == 'Nova Localitzacio';
            }
        )])->andThrow(new QueryException('', [], new \Exception));
        $response = $controller->update($request, $location);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
        $this->assertArrayHasKey('system', $response->getSession()->get('errors')->messages());
    }
    public function test_destroy_existing_location()
    {
        $controller = new LocationController();
        $data = [
            'id' => 1,
            'name' => 'Nova Localitzacio',
        ];
        $location = $this->brandMock->forceFill($data);
        $this->locationMock->shouldReceive('delete')->once()->andReturn(true);
        $response = $controller->destroy($location);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('location.index'), $response->headers->get('Location'));
        $this->assertEquals($data['id'], $response->getSession()->get('deleted'));
    }
    public function test_destroy_existing_location_throw_query_exception()
    {
        $controller = new LocationController();
        $data = [
            'id' => 1,
            'name' => 'Nova Localitzacio',
        ];
        $location = $this->locationMock->forceFill($data);
        $this->locationMock->shouldReceive('delete')->once()->andReturnUsing(function() {
            throw new QueryException('', [], new \Exception);
        });
        $response = $controller->destroy($brand);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
        $this->assertArrayHasKey('system', $response->getSession()->get('errors')->messages());
    }
}
