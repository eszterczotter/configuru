<?php

namespace unit\Configuru\File\Extension\Flexible;

use Configuru\Configuration\Configuration;
use Configuru\File\Extension\Flexible\Extension;
use PhpSpec\ObjectBehavior;

class ExtensionSpec extends ObjectBehavior
{
    function let(Configuration $configuration)
    {
        $this->beConstructedWith($configuration);
        $configuration->getExtension()->willReturn('guru');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Extension::class);
    }

    function it_is_an_extension()
    {
        $this->shouldHaveType(\Configuru\File\Extension\Extension::class);
    }
}
