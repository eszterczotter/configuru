<?php

namespace unit\Configuru\Console;

use Configuru\Console\Application;
use PhpSpec\ObjectBehavior;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Application::class);
    }
}
