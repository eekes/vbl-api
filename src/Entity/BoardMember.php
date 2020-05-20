<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class BoardMember
{
    private string $id;
    private ?string $group;
    private ?string $function;
    private string $name;
    private ?string $phoneNumber;
    private ?string $mobilePhone;
    private ?string $email;

    public static function createFromResponse(\stdClass $response): self
    {
        $member = new self();

        $member->id = $response->relGuid;
        $member->group = $response->kmGroep;
        $member->function = $response->kenmerk;
        $member->name = $response->naam;
        $member->phoneNumber = $response->telefoon;
        $member->mobilePhone = $response->mobiel;
        $member->email = $response->email;

        return $member;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getGroup(): ?string
    {
        return $this->group;
    }

    public function getFunction(): ?string
    {
        return $this->function;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}