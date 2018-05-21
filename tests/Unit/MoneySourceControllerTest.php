<?php

namespace Tests\Unit;

class MoneySourceControllerTest extends \PHPUnit_Framework_TestCase
{
  public function testIndex()
  {
      $this->mock
         ->shouldReceive('all')
         ->once()
         ->andReturn('foo');
      $this->app->instance('MoneySourceControllerController', $this->mock);
      $this->call('GET', 'moneysourcecontrollers');
      $this->assertViewHas('moneysourcecontrollers');
  }
}
