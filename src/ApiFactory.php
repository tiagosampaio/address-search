<?php

declare(strict_types = 1);

namespace AddressSearch;

use AddressSearch\Framework\DI\ContainerRepository;
use AddressSearch\Framework\Exception;

/**
 * Class ApiFactory
 *
 * @package AddressSearch
 */
class ApiFactory
{
    /**
     * @var \DI\Container
     */
    private static $container;

    /**
     * @var array
     */
    private static $config = [
        'definitions' => ADDRESS_SEARCH_DIR_DI_CONFIG
    ];

    /**
     * @var array
     */
    private static $customConfig = [];

    /**
     * @param array $config
     *
     * @return ApiInterface
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public static function create(array $config = [])
    {
        if (!empty($config)) {
            /** If there's a customized configuration the application can load it. */
            self::$customConfig = (array) $config;
        }
        self::setupContainer();

        $api = self::createApiInstance();

        self::$container->set(ApiInterface::class, $api);

        return $api;
    }

    /**
     * @param string $token
     *
     * @return ApiInterface
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    private static function createApiInstance()
    {
        return self::$container->make(ApiInterface::class);
    }

    /**
     * Setup the container.
     *
     * @throws Exception\ExceptionInterface
     */
    private static function setupContainer()
    {
        self::$container = ContainerRepository::getInstance(self::getConfig());
    }

    /**
     * @param array $customConfig
     *
     * @return array
     */
    private static function getConfig()
    {
        $config = array_merge_recursive(self::$config, self::$customConfig);
        return $config;
    }
}
