<?php

declare(strict_types = 1);

namespace AddressSearch\Framework\DI;

use DI\ContainerBuilder;
use AddressSearch\Framework\Exception;

/**
 * Class ContainerRepository
 *
 * @package AddressSearch\Framework\DI
 */
class ContainerRepository
{
    /**
     * @var \DI\ContainerBuilder
     */
    private static $instanceBuilder;

    /**
     * @var \DI\Container
     */
    private static $instance;

    /**
     * @var array
     */
    private static $config = [
        'definitions' => null
    ];

    /**
     * Create a reusable instance.
     *
     * @param array $config
     *
     * @return \DI\Container
     * @throws Exception\ExceptionInterface
     */
    public static function getInstance(array $config = [])
    {
        if (!self::$instance) {
            self::buildInstance($config);
        }

        return self::$instance;
    }

    /**
     * Always create a new instance.
     *
     * @param array $config
     *
     * @return \DI\Container
     * @throws Exception\ExceptionInterface
     */
    public static function createInstance(array $config = [])
    {
        self::buildInstance($config);

        return self::$instance;
    }

    /**
     * @param array $config
     *
     * @throws Exception\ExceptionInterface
     */
    private static function buildInstance(array $config = [])
    {
        self::$config = array_merge(self::$config, $config);
        self::$instanceBuilder = new ContainerBuilder();

        if (!empty(self::getDefinitions()) && realpath(self::getDefinitions())) {
            self::$instanceBuilder->addDefinitions(self::getDefinitions());
        }

        try {
            self::$instance = self::$instanceBuilder->build();
        } catch (\Exception $e) {
            /** @todo Throw new \Telegram\Framework\Exception\ExceptionInterface instance. */
        }
    }

    /**
     * @return string|null
     */
    private static function getDefinitions()
    {
        return self::$config['definitions'];
    }
}
