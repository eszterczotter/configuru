<?php

namespace unit\Configuru\Commands;

use Configuru\Commands\BuildCommand;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Console\Command\Command;

class BuildCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BuildCommand::class);
        $this->configure();
    }

    function it_is_a_command()
    {
        $this->shouldHaveType(Command::class);
    }

    function it_has_a_name()
    {
        $this->getName()->shouldReturn('build');
    }

    function it_has_a_description()
    {
        $this->getDescription()->shouldReturn('Build your configuration');
    }

    function it_has_a_help()
    {
        $this->getHelp()->shouldReturn('Run this command to (re)build your configuration from the .guru files.');
    }
}
