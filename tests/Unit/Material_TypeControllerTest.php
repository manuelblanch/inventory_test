<?php

namespace Tests\Unit;

use Mockery;



class Material_TypeControllerTest extends \PHPUnit_Framework_TestCase



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
        $this->app->instance('MaterialTypeController', $this->mock);
        $this->call('GET', 'materialtypecontrollers');
        $this->assertViewHas('materialtypecontrollers');
    }
}
