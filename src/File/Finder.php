<?php

namespace Configuru\File;

use SplFileInfo;

interface Finder
{
    /**
     * @return SplFileInfo[]
     */
    public function findGuruFiles(string $path) : array;
}