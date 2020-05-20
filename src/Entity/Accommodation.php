<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class Accommodation
{
    private string $id;
    private ?string $name;
    private ?string $phoneNumber;
    private ?string $website;
    private ?string $key;
    private Address $address;

    public static function createFromResponse(\stdClass $response): self
    {
        $accommodation = new self();

        $accommodation->id = $response->guid;
        $accommodation->name = $response->naam;
        $accommodation->phoneNumber = $response->telefoon;
        $accommodation->website = $response->website;
        $accommodation->key = $response->key;
        $accommodation->address = Address::createFromResponse($response->adres);

        return $accommodation;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}