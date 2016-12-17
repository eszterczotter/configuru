<?php

namespace Configuru\Console\Symfony;

use Configuru\Console\Application as BaseApplication;
use Configuru\Console\Symfony\Commands\BuildCommand;
use Symfony\Component\Console\Application as Symfony;

class Application extends BaseApplication
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
