<?php

namespace unit\Configuru\File\Builder\Parentheses;

use Configuru\Configuration\Configuration;
use Configuru\File\Builder\Parentheses\Builder;
use Configuru\File\Builder\Parentheses\FilePutContents;
use PhpSpec\ObjectBehavior;
use SplFileInfo;

class BuilderSpec extends ObjectBehavior
{
    function let(Configuration $configuration)
    {
        require_once("file_get_contents.php"); // Mock of php's file_get_contents();
        require_once("file_put_contents.php"); // Mock of php's file_put_contents();
        $this->beConstructedWith($configuration);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Builder::class);
    }

    function it_is_a_builder()
    {
        $this->shouldHaveType(\Configuru\File\Builder\Builder::class);
    }

    function it_builds_a_file(Configuration $configuration, SplFileInfo $file)
    {
        // Given
        $configuration->getReplacements()->willReturn(['key' => 'value']);

        // Then
        $this->shouldThrow(FilePutContents::class)->during('build', [$file]);
    }
}
