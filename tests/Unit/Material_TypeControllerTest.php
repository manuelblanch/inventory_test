<?php

namespace Tests\Unit;
use App\Http\Controllers\Material_TypeController;
use Illuminate\Http\RedirectResponse;
use App\Material_Type;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Tests\TestCase;
use Illuminate\Http\Request;
use Mockery;


class Material_TypeControllerTest extends \PHPUnit_Framework_TestCase
{

  /**
     * @var \Mockery\Mock|\Illuminate\Database\Connection
     */
    protected $db;
    /**
     * @var \Mockery\Mock|App\Material_Type
     */
    protected $material_typeMock;
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
            $this->material_typeMock = m::mock(Material_Type::class . '[update, delete]');
        });
        parent::setUp();
    }


    public function test_index_returns_view()
    {
        $controller = new Material_TypeController();
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "material_type"',
            [],
            m::any(),
        ])->andReturn((object) ['aggregate' => 10]);
        $view = $controller->index();
        $this->assertEquals('brand.list', $view->getName());
        $this->assertArrayHasKey('brand', $view->getData());
    }
    public function test_it_stores_new_material_type()
    {
        $controller = new Material_TypeController();
        $data = [
            'name' => 'Nou Tipus de material',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once();
        $this->db->getPdo()->shouldReceive('lastInsertId')->andReturn(333);
        $this->db->shouldReceive('insert')->once()
            ->withArgs([
                'insert into "material_type" ("name", "updated_at", "created_at") values (?, ?, ?)',
                m::on(function ($arg) {
                    return is_array($arg) &&
                        $arg[0] == 'Nou Tipus de material';
                })
            ])
            ->andReturn(true);
        /** @var RedirectResponse $response */
        $response = $controller->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('material_type.index'), $response->headers->get('Location'));
        $this->assertEquals(333, $response->getSession()->get('created'));
    }
    public function test_it_throws_error_on_duplicate_name()
    {
        $controller = new Material_TypeController();
        $data = [
            'name' => 'Nou Tipus de material',
        ];
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "material_type" where "name" = ?',
            ['Nou Tipus de material'],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 1]]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $this->expectException(ValidationException::class);
        $controller->store($request);
    }
    public function test_store_new_material_type_throw_query_exception()
    {
        $controller = new Material_TypeController();
        $data = [
            'name' => 'Nou tipus de material',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once();
        $this->db->shouldReceive('insert')->once()
            ->withArgs([
                'insert into "material_type" ("name", "updated_at", "created_at") values (?, ?, ?)',
                m::on(function ($arg) {
                    return is_array($arg) &&
                        $arg[0] == 'Nou tipus de material';
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
    public function test_it_fires_event_and_shows_material_type()
    {
        $controller = new Material_TypeController();
        $material_type = new Material_Type(['id' => 111]);
        $events = m::mock(Dispatcher::class);
        $events->shouldReceive('dispatch')->with(m::on(function ($arg) use ($material_type) {
            return $arg instanceof Material_TypeShown && $arg->material_type === $material_type;
        }));
        $view = $controller->show($events, $material_type);
        $this->assertEquals('material_type.item', $view->getName());
        $this->assertArrayHasKey('material_type', $view->getData());
    }
    public function test_create_returns_view()
    {
        $controller = new Material_TypeController();
        $view = $controller->create();
        $this->assertEquals('material_type.form', $view->getName());
        $this->assertArraySubset(['material_type' => null], $view->getData());
    }
    public function test_edit_material_type()
    {
        $material_typeInfo = ['id' => 1, 'name' => 'Nou Tipus de material'];
        $material_type = new Material_Type($material_typeInfo);
        $controller = new Material_TypeController();
        $view = $controller->edit($material_type);
        $this->assertEquals('material_type.form', $view->getName());
        $this->assertArraySubset(['material_type' => $material_type], $view->getData());
    }
    public function test_update_existing_material_type()
    {
        $controller = new Material_TypeController();
        $data = [
            'id' => 1,
            'name' => 'Nou Tipus de material',
        ];
        $material_type = $this->material_typeMock->forceFill(['id' => 1, 'name' => 'Tipus de material antic']);
        $newMaterial_type = (new Material_Type())->forceFill(['id' => 1, 'name' => $data['name']]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "material_type" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 0]]);
        $this->material_typeMock->shouldReceive('update')->once()->withArgs([
            m::on(function($arg) {
                return is_array($arg) && $arg['name'] == 'Nou Tipus de material';
            }
        )])->andReturn($newMaterial_type);
        $this->db->getPdo()->shouldReceive('lastInsertId')->andReturn($data['id']);
        $response = $controller->update($request, $material_type);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('material_type.index'), $response->headers->get('Location'));
        $this->assertEquals($data['id'], $response->getSession()->get('updated'));
    }
    public function test_update_throws_error_on_duplicate_name()
    {
        $controller = new Material_TypeController();
        $data = [
            'id' => 1,
            'name' => 'Nova tipus de material',
        ];
        $material_type = new Material_Type();
        $material_type->forceFill(['id' => 1, 'name' => $data['name']]);
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "material_type" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 1]]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $this->expectException(ValidationException::class);
        $controller->update($request, $material_type);
    }
    public function test_update_existing_material_type_throw_query_exception()
    {
        $controller = new Material_TypeController();
        $data = [
            'id' => 1,
            'name' => 'Nou Tipus de material',
        ];
        $material_type = $this->material_typeMock->forceFill(['id' => 1, 'name' => 'Tipus de material antic']);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "material_type" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 0]]);
        $this->material_typeMock->shouldReceive('update')->once()->withArgs([
            m::on(function($arg) {
                return is_array($arg) && $arg['name'] == 'Nou Tipus de material';
            }
        )])->andThrow(new QueryException('', [], new \Exception));
        $response = $controller->update($request, $matrial_type);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
        $this->assertArrayHasKey('system', $response->getSession()->get('errors')->messages());
    }
    public function test_destroy_existing_material_type()
    {
        $controller = new Material_TypeController();
        $data = [
            'id' => 1,
            'name' => 'Nou Tipus de material',
        ];
        $material_type = $this->material_typeMock->forceFill($data);
        $this->material_typeMock->shouldReceive('delete')->once()->andReturn(true);
        $response = $controller->destroy($material_type);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('material_type.index'), $response->headers->get('Location'));
        $this->assertEquals($data['id'], $response->getSession()->get('deleted'));
    }
    public function test_destroy_existing_material_type_throw_query_exception()
    {
        $controller = new Material_TypeController();
        $data = [
            'id' => 1,
            'name' => 'Nou Tipus de material',
        ];
        $material_type = $this->material_typeMock->forceFill($data);
        $this->material_typeMock->shouldReceive('delete')->once()->andReturnUsing(function() {
            throw new QueryException('', [], new \Exception);
        });
        $response = $controller->destroy($material_type);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
        $this->assertArrayHasKey('system', $response->getSession()->get('errors')->messages());
    }
}
