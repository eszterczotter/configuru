<?php

namespace Configuru\Configuration\Yaml;

use Configuru\Configuration\Configuration as ConfigurationContract;
use Symfony\Component\Yaml\Parser as Yaml;

class Configuration implements ConfigurationContract
{
    /**
     * @var Yaml
     */
    private $yaml;

    public function __construct(Yaml $yaml)
    {
        $this->yaml = $yaml;
    }
}
