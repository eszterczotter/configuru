<?php

namespace Configuru\Commands;

use Configuru\Service\Container;

class Commander
{
    /**
     * @var array
     */
    private $handlers = [
        Build\Command::class => Build\Handler::class,
    ];

    /**
     * @var Container
     */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function execute($command)
    {
        $handler = $this->container->get($this->getHandler($command));
        if (method_exists($handler, 'handle')) {
            return $handler->handle($command);
        }
    }

    private function getHandler($command)
    {
        return $this->handlers[get_class($command)];
    }
}