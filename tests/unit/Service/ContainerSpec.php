<?php

namespace unit\Configuru\Service;

use Configuru\Service\Container;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContainerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Container::class);
    }
}
