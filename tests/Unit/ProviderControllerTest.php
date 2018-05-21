<?php

namespace Tests\Unit;

class ProviderControllerTest extends \PHPUnit_Framework_TestCase
{
  public function testIndex()
  {
      $this->mock
         ->shouldReceive('all')
         ->once()
         ->andReturn('foo');
      $this->app->instance('ProviderControllerController', $this->mock);
      $this->call('GET', 'providercontrollers');
      $this->assertViewHas('providercontrollers');
  }
}
