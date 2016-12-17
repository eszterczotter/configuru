<?php

namespace unit\Configuru\Console;

use Configuru\Console\Application;
use Configuru\Console\Kernel;
use Configuru\Console\Symfony\Kernel as SymfonyKernel;
use Configuru\Service\Container;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->beConstructedWith($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Application::class);
    }

    function it_runs(Container $container, Kernel $kernel)
    {
        $container->get(Kernel::class)->willReturn($kernel);
        $kernel->process()->shouldBeCalled();

        $this->run();
    }
}
