<?php

namespace Configuru\File\Extension\Flexible;

use Configuru\Configuration\Configuration;

class Extension implements \Configuru\File\Extension\Extension
{
    /**
     * @var string
     */
    private $suffix;

    public function __construct(Configuration $configuration)
    {
        $this->suffix = $configuration->getExtension();
    }

    public function remove(string $path): string
    {
        return str_replace('.' . $this->suffix, '', $path);
    }

    public function pattern(): string
    {
        return "/\\.{$this->suffix}(\\.|\$)/";
    }
}
