<?php

namespace unit\Configuru\Converter\Parentheses;

use Configuru\Configuration\Configuration;
use Configuru\Converter\Parentheses\Converter;
use PhpSpec\ObjectBehavior;

class ConverterSpec extends ObjectBehavior
{
    function let(Configuration $configuration)
    {
        $this->beConstructedWith($configuration);
        $configuration->getReplacements()->willReturn(['key' => 'value']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Converter::class);
    }

    function it_is_a_converter()
    {
        $this->shouldHaveType(\Configuru\Converter\Converter::class);
    }

    function it_converts_the_keys()
    {
        $this->convert(':(key)')->shouldReturn('value');
    }

    function it_escapes_keys_with_backslash()
    {
        $this->convert('\:(key)')->shouldReturn(':(key)');
    }
}
