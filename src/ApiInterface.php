<?php

declare(strict_types = 1);

namespace AddressSearch;

use AddressSearch\Service\AddressInterface;

/**
 * Class ApiInterface
 *
 * @package AddressSearch
 */
interface ApiInterface
{
    /**
     * @param string $postcode
     *
     * @return array
     */
    public function search(string $postcode) : ?AddressInterface;
}
