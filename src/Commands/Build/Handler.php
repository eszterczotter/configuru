<?php

namespace Configuru\Commands\Build;

use Configuru\Configuration\Configuration;
use Symfony\Component\Finder\Finder;
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
        $this->buildGuruFiles(...$this->getGuruFiles($command));
    }

    private function buildGuruFiles(SplFileInfo ...$files) : void
    {
        foreach ($files as $file) {
            $this->replaceContent($file);
        }
    }

    private function getGuruFiles(Command $command) : array
    {
        return $this->findGuruFiles($this->getPath($command));
    }

    private function replaceContent(SplFileInfo $file): int
    {
        return file_put_contents($this->getFileName($file), $this->getReplacedContent($file));
    }

    private function findGuruFiles(string $path) : array
    {
        return array_values(iterator_to_array($this->finder->files()->ignoreDotFiles(false)->in($path)->files()->name('/\.guru(\.|$)/')));
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