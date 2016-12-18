<?php

namespace Configuru\Commands\Build;

class Command
{
    /**
     * @var string
     */
    private $path;

    public function __construct(?string $path = '.')
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
}