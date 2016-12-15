<?php

namespace unit\Configuru\Console;

use Configuru\Commands\UpdateCommand;
use Configuru\Console\SymfonyApplication as Application;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Console\Application as Symfony;

class SymfonyApplicationSpec extends ObjectBehavior
{
    function let(Symfony $symfony)
    {
        $this->beConstructedWith($symfony);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Application::class);
    }

    function it_runs(Symfony $symfony)
    {
        $this->run();

        $symfony->setName('Configuru')->shouldHaveBeenCalled();
        $symfony->add(Argument::type(UpdateCommand::class))->shouldHaveBeenCalled();
        $symfony->run()->shouldHaveBeenCalled();
    }
}
