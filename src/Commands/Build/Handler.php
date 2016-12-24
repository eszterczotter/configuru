<?php

namespace Configuru\Commands\Build;

use Configuru\Configuration\Configuration;
use Configuru\File\Finder;
use SplFileInfo;

class Handler
{
    /**
     * @var Finder
     */
    private $finder;

    /**
     * @var Configuration
     */
    private $configuration;

    public function __construct(Finder $finder, Configuration $configuration)
    {
        $this->finder = $finder;
        $this->configuration = $configuration;
    }

    public function handle(Command $command) : void
    {
        $this->buildGuruFiles(...$this->findGuruFiles($command));
    }

    private function buildGuruFiles(SplFileInfo ...$files) : void
    {
        foreach ($files as $file) {
            $this->replaceContent($file);
        }
    }

    private function findGuruFiles(Command $command) : array
    {
        return $this->finder->findGuruFiles($this->getPath($command));
    }

    private function replaceContent(SplFileInfo $file): int
    {
        return file_put_contents($this->getFileName($file), $this->getReplacedContent($file));
    }

    private function getPath(Command $command): string
    {
        return realpath($command->getPath());
    }

    private function getFileName(SplFileInfo $file): string
    {
        return strtr($file->getRealPath(), '.guru', '');
    }

    private function getReplacedContent($file): string
    {
        return strtr($file->getContents(), $this->getReplacePairs());
    }

    private function getReplacePairs() : array
    {
        $replacements = [];

        foreach ($this->configuration->getReplacements() as $key => $value) {
            $replacements["\\:({$key})"] = ":({$key})";
            $replacements[":({$key})"] = $value;
        }

        return $replacements;
    }
}