<?php

namespace Configuru\Commands\Build;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Parser;

class Handler
{
    /**
     * @var Finder
     */
    private $finder;
    /**
     * @var Yaml
     */
    private $yaml;

    public function __construct(Finder $finder, Parser $yaml)
    {
        $this->finder = $finder;
        $this->yaml = $yaml;
    }

    public function handle(Command $command)
    {
        $config = $this->yaml->parse(file_get_contents(getcwd() . '/configuru.yml'));
        $replace = [];
        foreach ($config['replace'] ?? [] as $key => $value) {
            $replace[":({$key})"] = $value;
        }
        $files = $this->finder->files()->exclude('tests')->in(getcwd())->name('*.guru');
        foreach ($files as $file) {
            $path = preg_replace('/\.guru$/', '', $file->getRealPath());
            file_put_contents($path, strtr($file->getContents(), $replace));
        }
    }
}