<?php

namespace Tests;

abstract class ProvidersModelTest extends TestCase
{
    public function __construct()
    {
        // We have no interest in testing Eloquent
      $this->mock = Mockery::mock('Eloquent', 'ProvidersModel');
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
        $this->app->instance('ProvidersModel', $this->mock);
        $this->call('GET', 'providersmodels');
        $this->assertViewHas('providersmodels');
    }
}
