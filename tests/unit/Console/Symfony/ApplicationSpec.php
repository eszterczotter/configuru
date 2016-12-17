<?php

namespace unit\Configuru\Console\Symfony;

use Configuru\Console\Symfony\Commands\BuildCommand;
use Configuru\Console\Application as ApplicationContract;
use Configuru\Console\Symfony\Application as Application;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Console\Application as Symfony;

class ApplicationSpec extends ObjectBehavior
{
    function let(Symfony $symfony)
    {
        $this->beConstructedWith($symfony);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Application::class);
    }

    function it_is_a_console_application()
    {
        $this->shouldHaveType(ApplicationContract::class);
    }

    function it_runs(Symfony $symfony)
    {
        $this->run();

        $symfony->setName('Configuru')->shouldHaveBeenCalled();
        $symfony->add(Argument::type(BuildCommand::class))->shouldHaveBeenCalled();
        $symfony->run()->shouldHaveBeenCalled();
    }

    function it_creates_itself()
    {
        $this->beConstructedThrough('build');
        $this->shouldHaveType(Application::class);
    }
}
