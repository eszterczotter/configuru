<?php

namespace Configuru\File\Finder;

use SplFileInfo;

interface Finder
{
    /**
     * @return SplFileInfo[]
     */
    public function findGuruFiles(string $path) : array;
}