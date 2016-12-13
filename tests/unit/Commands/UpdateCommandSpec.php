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
        $this->shouldHaveType(Command::class);
        $this->configure();
    }

    function it_has_a_name()
    {
        $this->getName()->shouldReturn("update");
    }
}
