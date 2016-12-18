<?php

namespace unit\Configuru\Commands\Build;

use Configuru\Commands\Build\Command;
use PhpSpec\ObjectBehavior;

class CommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Command::class);
    }

    function its_default_path_is_the_current_directory()
    {
        $this->getPath()->shouldReturn('.');
    }

    function its_path_can_be_set_in_the_constructor()
    {
        $this->beConstructedWith('example');
        $this->getPath()->shouldReturn('example');
    }
}
