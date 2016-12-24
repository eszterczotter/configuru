<?php

namespace Configuru\Commands\Build;

use Configuru\File\Builder\Builder;
use Configuru\File\Finder\Finder;
use SplFileInfo;

class Handler
{
    /**
     * @var Finder
     */
    private $finder;

    /**
     * @var Builder
     */
    private $builder;

    public function __construct(Finder $finder, Builder $builder)
    {
        $this->finder = $finder;
        $this->builder = $builder;
    }

    public function handle(Command $command)
    {
        $this->buildFilesFrom(...$this->findGuruFiles($command));
    }

    private function buildFilesFrom(SplFileInfo ...$files)
    {
        foreach ($files as $file) {
            $this->builder->build($file);
        }
    }

    private function findGuruFiles(Command $command) : array
    {
        return $this->finder->findGuruFiles($this->getPath($command));
    }

    private function getPath(Command $command): string
    {
        return realpath($command->getPath());
    }
}