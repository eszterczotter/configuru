<?php

namespace Configuru\Service;

use Configuru\Console\Kernel;
use Configuru\Console\Symfony\Kernel as SymfonyKernel;
use League\Container\Container as League;
use League\Container\ReflectionContainer;

class Container
{
    private $services = [
        Kernel::class => SymfonyKernel::class,
    ];

    /**
     * @var League|null
     */
    private $league;

    public function __construct(?League $league = null)
    {
        $this->league = $league ?: new League();
        $this->league->delegate(new ReflectionContainer());
        $this->configure();
    }

    public function get(string $service)
    {
        return $this->league->get($service);
    }

    public function set(string $service, $instance)
    {
        $this->league->add($service, $instance);
    }

    private function configure()
    {
        $this->set(self::class, $this);
        foreach ($this->services as $service => $implementation) {
            $this->set($service, $this->get($implementation));
        }
    }
}
