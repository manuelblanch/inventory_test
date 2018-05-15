<?php

namespace Tests;

abstract class Material_typeTest extends TestCase
{
    public function __construct()
    {
        // We have no interest in testing Eloquent
        $this->mock = Mockery::mock('Eloquent', 'Material_Type_Model');
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

        $this->app->instance('Material_Type_Model', $this->mock);

        $this->call('GET', 'material_type_models');

        $this->assertViewHas('material_type_models');
    }
}
