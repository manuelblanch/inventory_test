<?php

namespace Tests;

abstract class NotificationTest extends TestCase
{
    public function __construct()
    {
        // We have no interest in testing Eloquent
      $this->mock = Mockery::mock('Eloquent', 'Notification_Model');
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

        $this->app->instance('Notification_Model', $this->mock);

        $this->call('GET', 'notification_models');

        $this->assertViewHas('notification_models');
    }
}
