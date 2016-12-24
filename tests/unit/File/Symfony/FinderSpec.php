<?php

namespace unit\Configuru\File\Symfony;

use Symfony\Component\Finder\Finder as Symfony;
use Configuru\File\Symfony\Finder;
use PhpSpec\ObjectBehavior;

class FinderSpec extends ObjectBehavior
{
    function let(Symfony $symfony)
    {
        $this->beConstructedWith($symfony);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Finder::class);
        $this->shouldHaveType(\Configuru\File\Finder::class);
    }

    function it_finds_the_guru_files(Symfony $symfony, \Iterator $iterator)
    {
        $symfony->files()->willReturn($symfony);
        $symfony->ignoreDotFiles(false)->willReturn($symfony);
        $symfony->in('path')->willReturn($symfony);
        $symfony->name('/\.guru(\.|$)/')->willReturn($symfony);
        $symfony->getIterator()->willReturn($iterator);

        $this->findGuruFiles('path')->shouldReturn([]);
    }
}
