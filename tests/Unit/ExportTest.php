<?php

namespace Tests\Unit;

use App\Http\Controllers\ExportController;
use Illuminate\Database\Connection;
use Mockery as m;
use Tests\TestCase;

class ExportTest extends \PHPUnit_Framework_TestCase
{
<<<<<<< HEAD

  public function setUp()
{
    /*$this->afterApplicationCreated(function () {
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
    parent::setUp();*/
}
=======
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
            $this->cityMock = m::mock(Export::class.'[update, delete]');
        });
        parent::setUp();
    }

>>>>>>> 0a5dfbf8ebe4ba9b18e6226ba17c6102ff2c5bd5
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
