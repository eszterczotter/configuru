<?php

namespace Configuru\File\Builder;

use SplFileInfo;

interface Builder
{
    public function build(SplFileInfo $file);
}