<?php

declare(strict_types = 1);

namespace AddressSearch\Framework\Object;

use AddressSearch\Framework\ObjectManager;

/**
 * Class FactoryAbstract
 *
 * @package AddressSearch\Framework\Object
 */
class FactoryAbstract implements FactoryInterface
{
    /**
     * @var string
     */
    protected $objectClass = null;

    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * FactoryAbstract constructor.
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(
        ObjectManager $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function create(array $parameters = [])
    {
        try {
            $instance = $this->objectManager->create($this->objectClass, $parameters);
        } catch (\Exception $e) {
            /** @todo debug error or throw exception. */
        }

        return $instance;
    }
}
