<?php

namespace spec;

use Location;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LocationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Location::class);
    }
}
