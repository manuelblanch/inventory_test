<?php

namespace Tests;

abstract class MaterialTypeControllerTest extends TestCase
{
    public function __construct()
    {
        // We have no interest in testing Eloquent
        $this->mock = Mockery::mock('Eloquent', 'MaterialType');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testIndex()
    {
        $this->mock
           ->shouldReceive('all')
           ->once()
           ->andReturn('foo');
        $this->app->instance('MaterialTypeController', $this->mock);
        $this->call('GET', 'materialtypecontrollers');
        $this->assertViewHas('materialtypecontrollers');
    }
}
