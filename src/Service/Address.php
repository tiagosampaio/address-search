<?php

declare(strict_types = 1);

namespace AddressSearch\Service;

/**
 * Class Address
 *
 * @package AddressSearch\Service
 */
class Address implements AddressInterface
{
    /**
     * @var string
     */
    private $provider;

    /**
     * @var string
     */
    private $postcode;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $complement;

    /**
     * @var string
     */
    private $neighborhood;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $country;

    /**
     * @var array
     */
    private $additionalInformation = [];

    /**
     * @inheritDoc
     */
    public function setProvider(string $provider) : AddressInterface
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setPostcode(string $postcode) : AddressInterface
    {
        $this->postcode = $postcode;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setStreet(string $street) : AddressInterface
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setNumber(string $number) : AddressInterface
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setComplement(string $complement) : AddressInterface
    {
        $this->complement = $complement;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setNeighborhood(string $neighborhood) : AddressInterface
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setCity(string $city) : AddressInterface
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setState(string $state) : AddressInterface
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setCountry(string $country) : AddressInterface
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setAdditionalInformation(array $additionalInformation = []) : AddressInterface
    {
        $this->additionalInformation = $additionalInformation;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getProvider() : string
    {
        return $this->provider;
    }

    /**
     * @inheritDoc
     */
    public function getPostcode() : string
    {
        return $this->postcode;
    }

    /**
     * @inheritDoc
     */
    public function getStreet() : string
    {
        return $this->street;
    }

    /**
     * @inheritDoc
     */
    public function getNumber() : string
    {
        return $this->number;
    }

    /**
     * @inheritDoc
     */
    public function getComplement() : string
    {
        return $this->complement;
    }

    /**
     * @inheritDoc
     */
    public function getNeighborhood() : string
    {
        return $this->neighborhood;
    }

    /**
     * @inheritDoc
     */
    public function getCity() : string
    {
        return $this->city;
    }

    /**
     * @inheritDoc
     */
    public function getState() : string
    {
        return $this->state;
    }

    /**
     * @inheritDoc
     */
    public function getCountry() : string
    {
        return $this->country;
    }

    /**
     * @inheritDoc
     */
    public function getAdditionalInformation() : array
    {
        return $this->additionalInformation;
    }
}
