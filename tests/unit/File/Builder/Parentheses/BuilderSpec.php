<?php

namespace unit\Configuru\File\Builder\Parentheses;

use Configuru\Converter\Converter;
use Configuru\File\Builder\Parentheses\Builder;
use Configuru\File\Builder\Parentheses\FilePutContents;
use Configuru\File\Extension\Extension;
use PhpSpec\ObjectBehavior;
use SplFileInfo;

class BuilderSpec extends ObjectBehavior
{
    function let(Extension $extension, Converter $converter)
    {
        require_once("file_get_contents.php"); // Mock of php's file_get_contents();
        require_once("file_put_contents.php"); // Mock of php's file_put_contents();
        $this->beConstructedWith($extension, $converter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Builder::class);
    }

    function it_is_a_builder()
    {
        $this->shouldHaveType(\Configuru\File\Builder\Builder::class);
    }

    function it_builds_a_file(
        Extension $extension,
        Converter $converter,
        SplFileInfo $file
    ) {
        // Given
        $file->getRealPath()->willReturn('path.guru');
        $extension->remove('path.guru')->willReturn('path');
        $converter->convert('path.guru content')->willReturn('converted content');

        // Then
        $this->shouldThrow(FilePutContents::class)->during('build', [$file]);
    }
}
