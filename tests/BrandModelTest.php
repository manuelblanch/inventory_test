<?php

# app/tests/controllers/PostsControllerTest.php

class BrandModelTest extends TestCase {

  public function __construct()
  {
      // We have no interest in testing Eloquent
      $this->mock = Mockery::mock('Eloquent', 'Brand_Model');
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

      $this->app->instance('Brand_Model', $this->mock);

      $this->call('GET', 'brand_models');

      $this->assertViewHas('brand_models');
  }

}
