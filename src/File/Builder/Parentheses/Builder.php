<?php

namespace Configuru\File\Builder\Parentheses;

use Configuru\Configuration\Configuration;
use Configuru\File\Extension\Extension;
use SplFileInfo;

class Builder implements \Configuru\File\Builder\Builder
{
    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @var Extension
     */
    private $extension;

    public function __construct(Configuration $configuration, Extension $extension)
    {
        $this->configuration = $configuration;
        $this->extension = $extension;
    }

    public function build(SplFileInfo $file)
    {
        $this->replaceContent($file);
    }

    private function replaceContent(SplFileInfo $file)
    {
        file_put_contents($this->getFileName($file), $this->getReplacedContent($file));
    }

    private function getFileName(SplFileInfo $file) : string
    {
        return $this->extension->remove($file->getRealPath());
    }

    private function getReplacedContent($file) : string
    {
        return strtr(file_get_contents($file->getRealPath()), $this->getReplacePairs());
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
