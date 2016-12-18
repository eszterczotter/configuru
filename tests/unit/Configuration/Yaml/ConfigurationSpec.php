<?php

namespace unit\Configuru\Configuration\Yaml;

use Configuru\Configuration\Configuration as ConfigurationContract;
use Configuru\Configuration\Yaml\Configuration;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Yaml\Parser as Yaml;

class ConfigurationSpec extends ObjectBehavior
{
    function let(Yaml $yaml)
    {
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
}
