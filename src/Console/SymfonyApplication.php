<?php

namespace Configuru\Console;

use Configuru\Console\Commands\BuildCommand;
use Symfony\Component\Console\Application as Symfony;
use Symfony\Component\Finder\Finder;

class SymfonyApplication implements Application
{
    private $symfony;

    public function __construct(Symfony $symfony)
    {
        $this->symfony = $symfony;
    }

    public static function build()
    {
        return new self(new Symfony());
    }

    public function run() : void
    {
        $this->configure();
        $this->symfony->run();
    }

    private function configure()
    {
        $this->symfony->setName('Configuru');
        $this->symfony->add(new BuildCommand());
    }
}
