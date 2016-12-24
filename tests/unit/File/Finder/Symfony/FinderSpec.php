<?php

namespace unit\Configuru\File\Finder\Symfony;

use Configuru\File\Extension\Extension;
use Symfony\Component\Finder\Finder as Symfony;
use Configuru\File\Finder\Symfony\Finder;
use PhpSpec\ObjectBehavior;

class FinderSpec extends ObjectBehavior
{
    function let(Symfony $symfony, Extension $extension)
    {
        $this->beConstructedWith($symfony, $extension);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Finder::class);
        $this->shouldHaveType(\Configuru\File\Finder\Finder::class);
    }

    function it_finds_the_guru_files(
        Symfony $symfony,
        \Iterator $iterator,
        Extension $extension
    ) {
        $symfony->files()->willReturn($symfony);
        $symfony->ignoreDotFiles(false)->willReturn($symfony);
        $symfony->in('path')->willReturn($symfony);
        $symfony->name('/pattern/')->willReturn($symfony);
        $symfony->getIterator()->willReturn($iterator);

        $extension->pattern()->willReturn('/pattern/');

        $this->findGuruFiles('path')->shouldReturn([]);
    }
}
