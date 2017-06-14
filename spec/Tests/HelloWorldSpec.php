<?php

namespace spec;

use HelloWorld;
use PhpSpec\ObjectBehavior;

class HelloWorldSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(HelloWorld::class);
    }
}
