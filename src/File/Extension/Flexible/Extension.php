<?php

namespace Configuru\File\Extension\Flexible;

class Extension implements \Configuru\File\Extension\Extension
{
    private $suffix = 'guru';

    public function remove(string $path): string
    {
        return strtr($path, ".{$this->suffix}", '');
    }

    public function pattern(): string
    {
        return "/\\.{$this->suffix}(\\.|\$)/";
    }
}
