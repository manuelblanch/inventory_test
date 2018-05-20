<?php

namespace Tests\Unit;

class InventoryControllerTest extends \PHPUnit_Framework_TestCase
{


    public function testtearDown()
    {
        Mockery::close();
    }

    public function testIndex()
    {
        $this->mock
           ->shouldReceive('all')
           ->once()
           ->andReturn('foo');
        $this->app->instance('InventoryController', $this->mock);
        $this->call('GET', 'inventorycontrollers');
        $this->assertViewHas('inventorycontrollers');
    }
}
