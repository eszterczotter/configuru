<?php

namespace Configuru\Commands\Build;

use Configuru\Configuration\Configuration;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

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

    public function handle(Command $command)
    {
        foreach ($this->getGuruFiles($command) as $file) {
            $this->replaceContent($file);
        }
    }

    private function getGuruFiles(Command $command) : Finder
    {
        return $this->findGuruFiles($this->getPath($command));
    }

    private function replaceContent($file): int
    {
        return file_put_contents($this->getFileName($file), $this->getReplacedContent($file));
    }

    private function findGuruFiles(string $path) : Finder
    {
        return $this->finder->in($path)->files()->name('*.guru');
    }

    private function getPath(Command $command): string
    {
        return realpath($command->getPath());
    }

    private function getFileName(SplFileInfo $file): string
    {
        return preg_replace('/\.guru$/', '', $file->getRealPath());
    }

    private function getReplacedContent($file): string
    {
        return strtr($file->getContents(), $this->getReplacements());
    }

    private function getReplacements()
    {
        $replacements = [];

        foreach ($this->configuration->getReplacements() as $key => $value) {
            $replacements["\\:({$key})"] = ":({$key})";
            $replacements[":({$key})"] = $value;
        }

        return $replacements;
    }
}