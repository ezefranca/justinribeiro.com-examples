<?php

namespace Guzzle\Service\Command\Factory;

/**
 * Command factory used when explicitly mapping strings to command classes
 */
class MapFactory implements FactoryInterface
{
    /**
     * @var Associative array mapping command names to classes
     */
    protected $map;

    /**
     * @param array $map (optional) Associative array mapping command names to
     *     classes
     */
    public function __construct(array $map)
    {
        $this->map = $map;
    }

    /**
     * {@inheritdoc}
     */
    public function factory($name, array $args = array())
    {
        if (isset($this->map[$name])) {
            $class = $this->map[$name];
            return new $class($args);
        }
    }
}
