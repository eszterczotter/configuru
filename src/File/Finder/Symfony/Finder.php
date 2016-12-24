<?php

namespace Configuru\File\Finder\Symfony;

use Configuru\File\Extension\Extension;
use Symfony\Component\Finder\Finder as Symfony;

class Finder implements \Configuru\File\Finder\Finder
{
    /**
     * @var Finder
     */
    private $symfony;

    /**
     * @var Extension
     */
    private $extension;

    public function __construct(Symfony $symfony, Extension $extension)
    {
        $this->symfony = $symfony;
        $this->extension = $extension;
    }

    /**
     * @return SplFileInfo[]
     */
    public function findGuruFiles(string $path) : array
    {
        return array_values(
            iterator_to_array(
                $this
                    ->symfony
                    ->ignoreDotFiles(false)
                    ->in($path)
                    ->files()
                    ->name($this->extension->pattern())
            )
        );
    }
}
