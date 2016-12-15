<?php

namespace unit\Configuru\Console;

use Configuru\Console\SymfonyApplication;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Console\Application;

class SymfonyApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SymfonyApplication::class);
    }
}
