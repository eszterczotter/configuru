<?php

namespace unit\Configuru\Service;

use Configuru\Configuration\Configuration;
use Configuru\Console\Kernel;
use Configuru\Console\Symfony\Kernel as SymfonyKernel;
use Configuru\Service\Container;
use League\Container\Container as League;
use League\Container\ReflectionContainer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use stdClass;

class ContainerSpec extends ObjectBehavior
{
    function let(League $league)
    {
        $this->beConstructedWith($league);
        $league->add(Container::class, $this)->shouldBeCalled();
        $league->add(Kernel::class, null)->shouldBeCalled();
        $league->add(Configuration::class, null)->shouldBeCalled();
        $league->delegate(Argument::type(ReflectionContainer::class))->shouldBeCalled();
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Container::class);
    }

    function it_gets_a_class(League $league, stdClass $instance)
    {
        $league->get(stdClass::class)->willReturn($instance);
        $this->get(stdClass::class)->shouldHaveType(stdClass::class);
    }

    function it_sets_a_class(League $league, stdClass $instance)
    {
        $league->get(stdClass::class)->willReturn($instance);
        $league->add(stdClass::class, $instance)->shouldBeCalled();

        $this->set(stdClass::class, $instance);
        $this->get(stdClass::class)->shouldReturn($instance);
    }
}
