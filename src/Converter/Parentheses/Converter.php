<?php

namespace Configuru\Converter\Parentheses;

use Configuru\Configuration\Configuration;

class Converter implements \Configuru\Converter\Converter
{
    /**
     * @var array
     */
    private $replacements;

    public function __construct(Configuration $configuration)
    {
        $this->replacements = $configuration->getReplacements();
    }

    public function convert(string $content): string
    {
        return $this->getReplacedContent($content);
    }

    private function getReplacedContent(string $content) : string
    {
        return strtr($content, $this->getReplacePairs());
    }

    private function getReplacePairs() : array
    {
        $replacements = [];

        foreach ($this->replacements as $key => $value) {
            $replacements["\\:({$key})"] = ":({$key})";
            $replacements[":({$key})"] = $value;
        }

        return $replacements;
    }
}
