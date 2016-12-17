<?php

namespace Configuru\Console;

use Configuru\Commands\UpdateCommand;
use Symfony\Component\Console\Application as Symfony;

class SymfonyApplication implements Application
{
    private $symfony;

    public function __construct(Symfony $symfony)
    {
        $this->symfony = $symfony;
    }

    public function run() : void
    {
        $this->configure();
        $this->symfony->run();
    }

    private function configure()
    {
        $this->symfony->setName('Configuru');
        $this->symfony->add(new UpdateCommand());
    }
}
