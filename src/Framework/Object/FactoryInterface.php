<?php

declare(strict_types = 1);

namespace AddressSearch\Framework\Object;

/**
 * Class FactoryInterface
 *
 * @package AddressSearch\Framework\Object
 */
interface FactoryInterface
{
    /**
     * @param array $parameters
     * @return mixed
     */
    public function create(array $parameters = []);
}
