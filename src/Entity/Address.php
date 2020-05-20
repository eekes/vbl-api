<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class Address
{
    private ?string $street;
    private ?string $houseNumber;
    private ?string $houseNumberAddition;
    private ?string $zipCode;
    private ?string $city;
    private ?string $country;

    public static function createFromResponse(\stdClass $response): self
    {
        $address = new self();

        $address->street = $response->straat;
        $address->houseNumber = $response->huisNr;
        $address->houseNumberAddition = $response->huisNrToev;
        $address->zipCode = $response->postcode;
        $address->city = $response->plaats;
        $address->country = $response->land;

        return $address;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    public function getHouseNumberAddition(): ?string
    {
        return $this->houseNumberAddition;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }
}
