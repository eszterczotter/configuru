<?php

namespace Configuru\File\Builder\Parentheses;

use Configuru\Configuration\Configuration;
use Configuru\Converter\Converter;
use Configuru\File\Extension\Extension;
use SplFileInfo;

class Builder implements \Configuru\File\Builder\Builder
{
    /**
     * @var Extension
     */
    private $extension;

    /**
     * @var Converter
     */
    private $converter;

    public function __construct(Extension $extension, Converter $converter)
    {
        $this->extension = $extension;
        $this->converter = $converter;
    }

    public function build(SplFileInfo $file)
    {
        file_put_contents($this->getFileName($file), $this->getReplacedContent($file));
    }

    private function getFileName(SplFileInfo $file) : string
    {
        return $this->extension->remove($file->getRealPath());
    }

    private function getReplacedContent($file) : string
    {
        return $this->converter->convert(file_get_contents($file->getRealPath()));
    }
}
