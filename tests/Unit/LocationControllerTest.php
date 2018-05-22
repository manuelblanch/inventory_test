<?php

namespace Tests\Unit;

class LocationControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testIndex()
    {
        $this->mock
         ->shouldReceive('all')
         ->once()
         ->andReturn('foo');
        $this->app->instance('LocationControllerController', $this->mock);
        $this->call('GET', 'locationcontrollers');
        $this->assertViewHas('locationcontrollers');
    }
}
