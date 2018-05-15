<?php

namespace Tests;

abstract class ProvidersTest extends TestCase
{
    public function __construct()
    {
        // We have no interest in testing Eloquent
        $this->mock = Mockery::mock('Eloquent', 'Provider_Model');
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

        $this->app->instance('Provider_Model', $this->mock);

        $this->call('GET', 'provider_models');

        $this->assertViewHas('provider_models');
    }
}
