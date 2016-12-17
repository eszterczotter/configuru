<?php

namespace Configuru\Console;

use Configuru\Console\Symfony\Kernel as SymfonyKernel;
use Configuru\Service\Container;
use Symfony\Component\Console\Application as Symfony;

class Application
{
    /**
     * @var Container|null
     */
    private $container;

    public function __construct(?Container $container = null)
    {
        $this->container = $container ?: new Container();
    }

    public function run()
    {
        $this->container->set(Kernel::class, new SymfonyKernel(new Symfony()));
        $app = $this->container->get(\Configuru\Console\Kernel::class);
        $app->process();
    }
}