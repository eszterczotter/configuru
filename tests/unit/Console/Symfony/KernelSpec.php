<?php

namespace unit\Configuru\Console\Symfony;

use Configuru\Console\Symfony\Commands\BuildCommand;
use Configuru\Console\Kernel as KernelContract;
use Configuru\Console\Symfony\Kernel;
use Configuru\Service\Container;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Console\Application as Symfony;
use Symfony\Component\Console\Command\Command;

class KernelSpec extends ObjectBehavior
{
    function let(Symfony $symfony, Container $container, Command $command)
    {
        $this->beConstructedWith($symfony, $container);
        $container->get(BuildCommand::class)->willReturn($command);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }

    function it_is_a_console_application()
    {
        $this->shouldHaveType(KernelContract::class);
    }

    function it_processes(Symfony $symfony)
    {
        $this->process();

        $symfony->setName('Configuru')->shouldHaveBeenCalled();
        $symfony->run()->shouldHaveBeenCalled();
    }
}
