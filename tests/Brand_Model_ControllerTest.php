<?php

namespace Tests;

abstract class Brand_Model_ControllerTest extends TestCase
{
    public function __construct()
    {
        // We have no interest in testing Eloquent
      $this->mock = Mockery::mock('Eloquent', 'Brand_Model_Controller');
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

        $this->app->instance('Brand_Model_Controller', $this->mock);

        $this->call('GET', 'brand_model_controller_models');

        $this->assertViewHas('brand_model_controller_models');
    }
}
