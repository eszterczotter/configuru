<?php

namespace Configuru\Console;

use Configuru\Service\Container;

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
        $app = $this->container->get(Kernel::class);
        $app->process();
    }
}