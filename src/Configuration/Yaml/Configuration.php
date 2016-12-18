<?php

namespace Configuru\Configuration\Yaml;

use Configuru\Configuration\Configuration as ConfigurationContract;
use Symfony\Component\Yaml\Parser as Yaml;

class Configuration implements ConfigurationContract
{
    private $configuration = [];

    public function __construct(Yaml $yaml)
    {
        $this->configuration = $yaml->parse(file_get_contents(getcwd() . '/configuru.yml'));
    }

    public function getReplacements(): array
    {
        return $this->configuration['replace'] ?? [];
    }
}
