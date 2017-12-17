<?php

namespace Tests;

abstract class ProvidersControllerTest extends TestCase
{
    public function __construct()
    {
        // We have no interest in testing Eloquent
      $this->mock = Mockery::mock('Eloquent', 'ProvidersController');
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
        $this->app->instance('ProvidersController', $this->mock);
        $this->call('GET', 'providerscontrollers');
        $this->assertViewHas('providerscontrollers');
    }
}
