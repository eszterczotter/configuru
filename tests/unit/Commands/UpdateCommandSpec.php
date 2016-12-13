<?php

namespace unit\Effy\Configuru\Commands;

use Effy\Configuru\Commands\UpdateCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
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
}
