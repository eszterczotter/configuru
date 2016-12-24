<?php

namespace unit\Configuru\Commands\Build;

use Configuru\Commands\Build\Handler;
use Configuru\File\Builder\Builder;
use Configuru\File\Finder\Finder;
use PhpSpec\ObjectBehavior;

class HandlerSpec extends ObjectBehavior
{
    function let(Finder $finder, Builder $builder)
    {
        $this->beConstructedWith($finder, $builder);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Handler::class);
    }
}
