<?php

declare(strict_types = 1);

namespace AddressSearch\Service\ViaCEP;

use AddressSearch\Service\AddressFactory;
use AddressSearch\Service\ClientFactory;
use AddressSearch\Service\AddressInterface;
use AddressSearch\Service\SearchEngineInterface;

/**
 * Class SearchEngine
 */
class SearchEngine implements SearchEngineInterface
{
    /**
     * @const $string
     */
    const CODE = 'ViaCEP';

    /**
     * @var ClientFactory
     */
    private $clientFactory;

    /**
     * @var AddressFactory
     */
    private $addressFactory;

    /**
     * SearchEngine constructor.
     *
     * @param ClientFactory $clientFactory
     */
    public function __construct(
        ClientFactory $clientFactory,
        AddressFactory $addressFactory
    ) {
        $this->clientFactory = $clientFactory;
        $this->addressFactory = $addressFactory;
    }

    /**
     * @param string $postcode
     *
     * @return AddressInterface
     */
    public function search(string $postcode) : ?AddressInterface
    {
        $type = 'json';

        /** @var \GuzzleHttp\ClientInterface $client */
        $client = $this->clientFactory->create();

        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $client->request('GET', "https://viacep.com.br/ws/{$postcode}/{$type}/");

        if (200 === $response->getStatusCode()) {
            /** @var array $data */
            $data = json_decode((string) $response->getBody(), true);
            return $this->createAddressObject($data);
        }

        return null;
    }

    /**
     * @param array $data
     *
     * @return AddressInterface
     */
    private function createAddressObject(array $data) : AddressInterface
    {
        /** @var AddressInterface $address */
        $address = $this->addressFactory->create();
        $address->setProvider(self::CODE)
            ->setPostcode($data['cep'])
            ->setStreet($data['logradouro'])
            ->setNeighborhood($data['bairro'])
            ->setCity($data['localidade'])
            ->setState($data['uf'])
            ->setCountry('BR')
            ->setAdditionalInformation([
                'unidade' => $data['unidade'],
                'ibge' => $data['ibge'],
                'gia' => $data['gia'],
            ]);

        return $address;
    }
}
