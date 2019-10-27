<?php

declare(strict_types = 1);

namespace AddressSearch\Service;

use AddressSearch\Framework\Object\FactoryAbstract;

/**
 * Class ClientFactory
 *
 * @package AddressSearch\Service
 */
class AddressFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = AddressInterface::class;
}
