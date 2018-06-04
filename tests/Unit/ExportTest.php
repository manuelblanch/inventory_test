<?php

namespace Tests\Unit;

use App\Http\Controllers\ExportController;
use Illuminate\Database\Connection;
use Mockery as m;

class ExportTest extends \PHPUnit_Framework_TestCase
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
            $this->cityMock = m::mock(Export::class.'[update, delete]');
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
