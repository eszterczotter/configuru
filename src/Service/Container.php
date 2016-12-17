<?php

namespace Configuru\Service;

use League\Container\Container as League;
use League\Container\ReflectionContainer;

class Container
{
    /**
     * @var League|null
     */
    private $league;

    public function __construct(?League $league = null)
    {
        $this->league = $league ?: new League();
        $this->league->delegate(new ReflectionContainer());
    }

    public function get(string $service)
    {
        return $this->league->get($service);
    }

    public function set(string $service, $instance)
    {
        $this->league->add($service, $instance);
    }

    public function share(string $service)
    {
        $this->league->share($service);
    }
}
