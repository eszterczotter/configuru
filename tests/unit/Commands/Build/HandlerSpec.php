<?php

namespace unit\Configuru\Commands\Build;

use Configuru\Commands\Build\Command;
use Configuru\Commands\Build\Handler;
use Configuru\File\Builder\Builder;
use Configuru\File\Finder\Finder;
use PhpSpec\ObjectBehavior;
use SplFileInfo;

class HandlerSpec extends ObjectBehavior
{
    function let(Finder $finder, Builder $builder)
    {
        require_once("realpath.php"); // Mock of php's realpath()
        $this->beConstructedWith($finder, $builder);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Handler::class);
    }

    function it_handles_the_command(
        Finder $finder,
        Builder $builder,
        Command $command,
        SplFileInfo $file
    ) {
        // Given
        $command->getPath()->willReturn('path');
        $finder->findGuruFiles('realpath')->willReturn([$file]);

        // When
        $this->handle($command);

        // Then
        $builder->build($file)->shouldHaveBeenCalled();
    }
}
