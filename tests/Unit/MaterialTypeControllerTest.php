<?php

namespace Tests\Unit;

class MaterialTypeControllerTest extends \PHPUnit_Framework_TestCase
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
