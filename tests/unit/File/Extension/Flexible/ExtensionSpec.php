<?php

namespace unit\Configuru\File\Extension\Flexible;

use Configuru\File\Extension\Flexible\Extension;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Extension::class);
    }

    function it_is_an_extension()
    {
        $this->shouldHaveType(\Configuru\File\Extension\Extension::class);
    }
}
