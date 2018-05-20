<?php

namespace Tests\Unit;

class ExportTest extends \PHPUnit_Framework_TestCase
{
  public function testIndex()
  {
      $this->mock
         ->shouldReceive('all')
         ->once()
         ->andReturn('foo');
      $this->app->instance('ExportController', $this->mock);
      $this->call('GET', 'exportcontrollers');
      $this->assertViewHas('exportcontrollers');
  }
}
