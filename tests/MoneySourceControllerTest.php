<?php

namespace Tests;

abstract class MoneySourceControllerTest extends TestCase
{
    public function __construct()
    {
        // We have no interest in testing Eloquent
        $this->mock = Mockery::mock('Eloquent', 'MoneySourceController');
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
        $this->app->instance('MoneySourceController', $this->mock);
        $this->call('GET', 'moneysourcecontrollers');
        $this->assertViewHas('moneysourcecontrollers');
    }
}
