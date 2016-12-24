<?php

namespace Configuru\File\Symfony;

use Symfony\Component\Finder\Finder as Symfony;

class Finder implements \Configuru\File\Finder
{
    /**
     * @var Finder
     */
    private $symfony;

    public function __construct(Symfony $symfony)
    {
        $this->symfony = $symfony;
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
                    ->name('/\.guru(\.|$)/')
            )
        );
    }
}
