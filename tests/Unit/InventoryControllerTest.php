<?php

namespace Tests\Unit;
use App\Http\Controllers\InventoryController;
use Illuminate\Http\RedirectResponse;
use App\Inventory;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Tests\TestCase;
use Illuminate\Http\Request;
use Mockery;


class InventoryControllerTest extends \PHPUnit_Framework_TestCase
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
            $this->inventoryMock = m::mock(Inventory::class . '[update, delete]');
        });
        parent::setUp();
    }


    public function test_index_returns_view()
    {
        $controller = new InventoryController();
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "inventories"',
            [],
            m::any(),
        ])->andReturn((object) ['aggregate' => 10]);
        $view = $controller->index();
        $this->assertEquals('inventories.list', $view->getName());
        $this->assertArrayHasKey('inventories', $view->getData());
    }
    public function test_it_stores_new_inventory()
    {
        $controller = new InventoryController();
        $data = [
            'name' => 'Nou Objecte',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once();
        $this->db->getPdo()->shouldReceive('lastInsertId')->andReturn(333);
        $this->db->shouldReceive('insert')->once()
            ->withArgs([
                'insert into "inventories" ("name", "updated_at", "created_at") values (?, ?, ?)',
                m::on(function ($arg) {
                    return is_array($arg) &&
                        $arg[0] == 'Nou Objecte';
                })
            ])
            ->andReturn(true);
        /** @var RedirectResponse $response */
        $response = $controller->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('inventories.index'), $response->headers->get('Location'));
        $this->assertEquals(333, $response->getSession()->get('created'));
    }
    public function test_it_throws_error_on_duplicate_name()
    {
        $controller = new InventoryController();
        $data = [
            'name' => 'Nou Objecte',
        ];
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "inventories" where "name" = ?',
            ['Nou Objecte'],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 1]]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $this->expectException(ValidationException::class);
        $controller->store($request);
    }
    public function test_store_new_inventory_throw_query_exception()
    {
        $controller = new InventoryController();
        $data = [
            'name' => 'Nou Objecte',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once();
        $this->db->shouldReceive('insert')->once()
            ->withArgs([
                'insert into "inventories" ("name", "updated_at", "created_at") values (?, ?, ?)',
                m::on(function ($arg) {
                    return is_array($arg) &&
                        $arg[0] == 'Nou Objecte';
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
    public function test_it_fires_event_and_shows_inventory()
    {
        $controller = new InventoryController();
        $city = new Inventory(['id' => 111]);
        $events = m::mock(Dispatcher::class);
        $events->shouldReceive('dispatch')->with(m::on(function ($arg) use ($brand) {
            return $arg instanceof BrandShown && $arg->brand === $brand;
        }));
        $view = $controller->show($events, $brand);
        $this->assertEquals('inventories.item', $view->getName());
        $this->assertArrayHasKey('inventories', $view->getData());
    }
    public function test_create_returns_view()
    {
        $controller = new InventoryController();
        $view = $controller->create();
        $this->assertEquals('inventories.form', $view->getName());
        $this->assertArraySubset(['inventories' => null], $view->getData());
    }
    public function test_edit_inventory()
    {
        $inventoriInfo = ['id' => 1, 'name' => 'Nou Objecte'];
        $brand = new Inventory($inventoryInfo);
        $controller = new BrandController();
        $view = $controller->edit($inventory);
        $this->assertEquals('inventory.form', $view->getName());
        $this->assertArraySubset(['brand' => $inventory], $view->getData());
    }
    public function test_update_existing_inventory()
    {
        $controller = new InventoryController();
        $data = [
            'id' => 1,
            'name' => 'Nou Objecte',
        ];
        $inventory = $this->inventoryMock->forceFill(['id' => 1, 'name' => 'Objecte Antic']);
        $newInventory = (new Inventory())->forceFill(['id' => 1, 'name' => $data['name']]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "inventories" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 0]]);
        $this->brandMock->shouldReceive('update')->once()->withArgs([
            m::on(function($arg) {
                return is_array($arg) && $arg['name'] == 'Nou Objecte';
            }
        )])->andReturn($newInventory);
        $this->db->getPdo()->shouldReceive('lastInsertId')->andReturn($data['id']);
        $response = $controller->update($request, $inventory);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('inventories.index'), $response->headers->get('Location'));
        $this->assertEquals($data['id'], $response->getSession()->get('updated'));
    }
    public function test_update_throws_error_on_duplicate_name()
    {
        $controller = new InventoryController();
        $data = [
            'id' => 1,
            'name' => 'Nou Objecte',
        ];
        $inventory = new Inventory();
        $inventory->forceFill(['id' => 1, 'name' => $data['name']]);
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "inventories" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 1]]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $this->expectException(ValidationException::class);
        $controller->update($request, $brand);
    }
    public function test_update_existing_inventory_throw_query_exception()
    {
        $controller = new InventoryController();
        $data = [
            'id' => 1,
            'name' => 'Nou Objecte',
        ];
        $inventory = $this->brandMock->forceFill(['id' => 1, 'name' => 'Objecte Antic']);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query
        $this->db->shouldReceive('select')->once()->withArgs([
            'select count(*) as aggregate from "inventories" where "name" = ? and "id" <> ?',
            [$data['name'], $data['id']],
            m::any(),
        ])->andReturn([(object) ['aggregate' => 0]]);
        $this->brandMock->shouldReceive('update')->once()->withArgs([
            m::on(function($arg) {
                return is_array($arg) && $arg['name'] == 'Nou Objecte';
            }
        )])->andThrow(new QueryException('', [], new \Exception));
        $response = $controller->update($request, $inventory);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
        $this->assertArrayHasKey('system', $response->getSession()->get('errors')->messages());
    }
    public function test_destroy_existing_inventory()
    {
        $controller = new InventoryController();
        $data = [
            'id' => 1,
            'name' => 'Nova Marca',
        ];
        $brand = $this->brandMock->forceFill($data);
        $this->brandMock->shouldReceive('delete')->once()->andReturn(true);
        $response = $controller->destroy($inventory);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('brand.index'), $response->headers->get('Location'));
        $this->assertEquals($data['id'], $response->getSession()->get('deleted'));
    }
    public function test_destroy_existing_inventory_throw_query_exception()
    {
        $controller = new InventoryController();
        $data = [
            'id' => 1,
            'name' => 'Nou Objecte',
        ];
        $brand = $this->brandMock->forceFill($data);
        $this->brandMock->shouldReceive('delete')->once()->andReturnUsing(function() {
            throw new QueryException('', [], new \Exception);
        });
        $response = $controller->destroy($inventory);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
        $this->assertArrayHasKey('system', $response->getSession()->get('errors')->messages());
    }
}
