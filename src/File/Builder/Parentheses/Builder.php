<?php

namespace Configuru\File\Builder\Parentheses;

use Configuru\Configuration\Configuration;
use SplFileInfo;

class Builder implements \Configuru\File\Builder\Builder
{
    /**
     * @var Configuration
     */
    private $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
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
        return strtr($file->getRealPath(), '.guru', '');
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
