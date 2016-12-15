<?php

namespace unit\Configuru\Commands;

use Configuru\Commands\UpdateCommand;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Console\Command\Command;

class UpdateCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(UpdateCommand::class);
        $this->configure();
    }

    function it_is_a_command()
    {
        $this->shouldHaveType(Command::class);
    }

    function it_has_a_name()
    {
        $this->getName()->shouldReturn('update');
    }

    function it_has_a_description()
    {
        $this->getDescription()->shouldReturn('Updates your configuration');
    }

    function it_has_a_help()
    {
        $this->getHelp()->shouldReturn('Run this command to rebuild your configuration from .guru files.');
    }
}
