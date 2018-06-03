<?php

// app/tests/controllers/PostsControllerTest.php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class PostControllerTest extends \PHPUnit_Framework_TestCase
{
    use WithoutMiddleware;

    public function tearDown()
    {
        Mockery::close();
    }

    public function setUp()
    {
        parent::setUp();

        $this->mock('');
    }

    public function mock($class)
    {
        $this->mock = Mockery::mock($class);

        $this->app->instance($class, $this->mock);

        return $this->mock;
    }

    public function testIndex()
    {
        $this->mock->shouldReceive('getPaginated')->once();

        $response = $this->call('GET', 'people');

        $this->assertResponseOk();
    }
}
