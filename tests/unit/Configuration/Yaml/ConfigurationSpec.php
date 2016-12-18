<?php

namespace unit\Configuru\Configuration\Yaml;

use Configuru\Configuration\Configuration as ConfigurationContract;
use Configuru\Configuration\Yaml\Configuration;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Yaml\Parser as Yaml;

class ConfigurationSpec extends ObjectBehavior
{
    function let(Yaml $yaml)
    {
        $yaml->parse(Argument::type('string'))->willReturn([]);
        $this->beConstructedWith($yaml);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Configuration::class);
    }

    function it_is_configuration()
    {
        $this->shouldHaveType(ConfigurationContract::class);
    }

    function its_default_replaces_is_empty()
    {
        $this->getReplaces()->shouldReturn([]);
    }

    function it_returns_the_correct_replaces(Yaml $yaml)
    {
        $yaml->parse(Argument::type('string'))->willReturn(['replace' => ['replaces']]);
        $this->beConstructedWith($yaml);
        $this->getReplaces()->shouldReturn(['replaces']);
    }
}
