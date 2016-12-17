<?php

namespace unit\Configuru\Commands;

use Configuru\Commands\BuildCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BuildCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BuildCommand::class);
    }

    function it_is_a_command()
    {
        $this->shouldHaveType(\Configuru\Commands\Command::class);
    }

    function it_executes()
    {
        $this->execute();
    }
}
