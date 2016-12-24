<?php

namespace Configuru\Configuration\Yaml;

use Configuru\Configuration\Configuration as ConfigurationContract;
use Symfony\Component\Yaml\Parser as Yaml;

class Configuration implements ConfigurationContract
{
    private $configuration = [];

    public function __construct(Yaml $yaml)
    {
        $this->configuration = $this->loadConfiguration($yaml);
    }

    public function getReplacements(): array
    {
        return $this->configuration['replace'] ?? [];
    }

    private function getConfigurationFilePath(): string
    {
        return getcwd() . '/configuru.yml';
    }

    private function getConfigurationFileContents(): string
    {
        return file_get_contents($this->getConfigurationFilePath());
    }

    private function loadConfiguration(Yaml $yaml): array
    {
        return $yaml->parse($this->getConfigurationFileContents());
    }
}
