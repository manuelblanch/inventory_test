<?php

// app/tests/controllers/PostsControllerTest.php

namespace Tests;

abstract class LocationModelTest extends TestCase
{
    public function __construct()
    {
        // We have no interest in testing Eloquent
      $this->mock = Mockery::mock('Eloquent', 'Location');
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
        $this->app->instance('Location', $this->mock);
        $this->call('GET', 'locations');
        $this->assertViewHas('locations');
    }
}
