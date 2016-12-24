<?php

namespace unit\Configuru\File\Builder\Parentheses;

use Configuru\Configuration\Configuration;
use Configuru\File\Builder\Parentheses\Builder;
use PhpSpec\ObjectBehavior;

class BuilderSpec extends ObjectBehavior
{
    function let(Configuration $configuration)
    {
        $this->beConstructedWith($configuration);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Builder::class);
    }

    function it_is_a_builder()
    {
        $this->shouldHaveType(\Configuru\File\Builder\Builder::class);
    }
}
