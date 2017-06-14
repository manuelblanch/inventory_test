<?php

namespace Tests;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel');
    }
}
