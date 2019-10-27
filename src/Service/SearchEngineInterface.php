<?php

declare(strict_types = 1);

namespace AddressSearch\Service;

/**
 * Class SearchEngineInterface
 *
 * @package AddressSearch\Service
 */
interface SearchEngineInterface
{
    /**
     * @param string $postcode
     *
     * @return AddressInterface
     */
    public function search(string $postcode) : ?AddressInterface;
}
