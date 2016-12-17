<?php

namespace Configuru\Console\Symfony;

use Configuru\Console\Symfony\Commands\BuildCommand;
use Configuru\Console\Kernel as KernelContract;
use Configuru\Service\Container;
use Symfony\Component\Console\Application as Symfony;

class Kernel implements KernelContract
{
    private $commands = [
        BuildCommand::class,
    ];

    /**
     * @var Symfony
     */
    private $symfony;
    /**
     * @var Container
     */
    private $container;

    public function __construct(Symfony $symfony, Container $container)
    {
        $this->symfony = $symfony;
        $this->container = $container;
        $this->configure();
    }

    public function process() : void
    {
        $this->symfony->run();
    }

    private function configure()
    {
        $this->symfony->setName('Configuru');
        foreach ($this->commands as $command) {
            $command = $this->container->get($command);
            $this->symfony->add($command);
        }
    }
}
