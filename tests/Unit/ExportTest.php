<?php

namespace Tests\Unit;

use Illuminate\Events\Dispatcher;
use Illuminate\Http\RedirectResponse;
use Mockery as m;
use App\City;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Controllers\ExportController;

class ExportTest extends TestCase
{

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
        $this->cityMock = m::mock(Export::class . '[update, delete]');
    });
    parent::setUp();
}
    public function testIndex()
    {
        /*$this->mock
         ->shouldReceive('all')
         ->once()
         ->andReturn('foo');
        $this->app->instance('ExportController', $this->mock);
        $this->call('GET', 'exportcontrollers');
        $this->assertViewHas('exportcontrollers');*/
    }
}
