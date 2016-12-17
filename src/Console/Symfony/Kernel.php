<?php

namespace Configuru\Console\Symfony;

use Configuru\Console\Kernel as KernelContract;
use Configuru\Console\Symfony\Commands\BuildCommand;
use Symfony\Component\Console\Application as Symfony;

class Kernel implements KernelContract
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

    public function process() : void
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
