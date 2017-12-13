<?php

namespace Tests;

abstract class MoneySourceModelTest extends TestCase
{
    public function __construct()
    {
        // We have no interest in testing Eloquent
      $this->mock = Mockery::mock('Eloquent', 'MoneySourceModel');
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
        $this->app->instance('MoneySourceModel', $this->mock);
        $this->call('GET', 'moneysourcemodels');
        $this->assertViewHas('moneysourcemodels');
    }
}
