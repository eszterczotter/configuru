<?php

namespace Configuru\File\Extension;

interface Extension
{
    public function remove(string $path) : string;

    public function pattern() : string;
}