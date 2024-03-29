<?php

declare(strict_types = 1);

namespace AddressSearch\Framework;

/**
 * Class ObjectManager
 *
 * @package AddressSearch\Framework
 */
class ObjectManager
{
    /**
     * @var array
     */
    private static $resolvedObjects = [];

    /**
     * @param string $class
     *
     * @return mixed
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public static function create($class, array $parameters = [])
    {
        return DI\ContainerRepository::getInstance()->make($class, $parameters);
    }

    /**
     * @param string $class
     *
     * @return mixed
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public static function get($class, array $parameters = [])
    {
        if (!isset(self::$resolvedObjects[$class])) {
            self::$resolvedObjects[$class] = self::create($class, $parameters);
        }

        return self::$resolvedObjects[$class];
    }
}
