<?php

namespace spec;

use Location;
use PhpSpec\ObjectBehavior;

class LocationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Location::class);
    }
}
