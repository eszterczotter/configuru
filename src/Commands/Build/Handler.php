<?php

namespace Configuru\Commands\Build;

use Configuru\Configuration\Configuration;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Parser;

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
        foreach ($this->configuration->getReplacements() as $key => $value) {
            $replace[":({$key})"] = $value;
        }
        $files = $this->finder->in(realpath($command->getPath()))->files()->name('*.guru');
        foreach ($files as $file) {
            $path = preg_replace('/\.guru$/', '', $file->getRealPath());
            file_put_contents($path, strtr($file->getContents(), $replace));
        }
    }
}