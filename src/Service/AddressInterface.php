<?php

declare(strict_types = 1);

namespace AddressSearch\Service;

/**
 * Class AddressInterface
 *
 * @package AddressSearch\Service
 */
interface AddressInterface
{
    /**
     * @param string $provider
     *
     * @return $this
     */
    public function setProvider(string $provider) : self;

    /**
     * @param string $postcode
     *
     * @return $this
     */
    public function setPostcode(string $postcode) : self;

    /**
     * @param string $street
     *
     * @return $this
     */
    public function setStreet(string $street) : self;

    /**
     * @param string $number
     *
     * @return $this
     */
    public function setNumber(string $number) : self;

    /**
     * @param string $complement
     *
     * @return $this
     */
    public function setComplement(string $complement) : self;

    /**
     * @param string $neighborhood
     *
     * @return $this
     */
    public function setNeighborhood(string $neighborhood) : self;

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity(string $city) : self;

    /**
     * @param string $state
     *
     * @return $this
     */
    public function setState(string $state) : self;

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setCountry(string $country) : self;

    /**
     * @param array $additionalInformation
     *
     * @return $this
     */
    public function setAdditionalInformation(array $additionalInformation = []) : self;

    /**
     * @return string
     */
    public function getProvider() : string;

    /**
     * @return string
     */
    public function getPostcode() : string;

    /**
     * @return string
     */
    public function getStreet() : string;

    /**
     * @return string
     */
    public function getNumber() : string;

    /**
     * @return string
     */
    public function getComplement() : string;

    /**
     * @return string
     */
    public function getNeighborhood() : string;

    /**
     * @return string
     */
    public function getCity() : string;

    /**
     * @return string
     */
    public function getState() : string;

    /**
     * @return string
     */
    public function getCountry() : string;

    /**
     * @return array
     */
    public function getAdditionalInformation() : array;
}
