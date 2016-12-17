<?php

namespace unit\Configuru\Console\Symfony;

use Configuru\Console\Symfony\Commands\BuildCommand;
use Configuru\Console\Kernel as KernelContract;
use Configuru\Console\Symfony\Kernel;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Console\Application as Symfony;

class KernelSpec extends ObjectBehavior
{
    function let(Symfony $symfony)
    {
        $this->beConstructedWith($symfony);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }

    function it_is_a_console_application()
    {
        $this->shouldHaveType(KernelContract::class);
    }

    function it_runs(Symfony $symfony)
    {
        $this->process();

        $symfony->setName('Configuru')->shouldHaveBeenCalled();
        $symfony->add(Argument::type(BuildCommand::class))->shouldHaveBeenCalled();
        $symfony->run()->shouldHaveBeenCalled();
    }

    function it_creates_itself()
    {
        $this->beConstructedThrough('build');
        $this->shouldHaveType(Kernel::class);
    }
}
