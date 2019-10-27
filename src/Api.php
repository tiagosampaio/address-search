<?php

declare(strict_types = 1);

namespace AddressSearch;

use AddressSearch\Framework\ObjectManager;
use AddressSearch\Service\AddressInterface;
use AddressSearch\Service\SearchEngineInterface;
use AddressSearch\Service\ViaCEP\SearchEngine as ViaCEP;

/**
 * Class Api
 *
 * @package AddressSearch
 */
class Api implements ApiInterface
{
    /**
     * @var array
     */
    private $providers = [
        10 => ViaCEP::class,
    ];

    /**
     * @var ObjectManager
     */
    private $objectManager;

    public function __construct(
        ObjectManager $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    /**
     * {@inheritDoc}
     */
    public function search(string $postcode) : ?AddressInterface
    {
        /** @var string $providerClass */
        foreach ($this->providers as $providerClass) {
            /** @var SearchEngineInterface $provider */
            $provider = $this->objectManager->create($providerClass);

            /** @var AddressInterface $address */
            $address = $provider->search($postcode);

            if (!empty($address)) {
                return $address;
            }
        }

        return null;
    }
}
