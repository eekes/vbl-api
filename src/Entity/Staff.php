<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class Staff
{
    private string $id;
    private string $name;
    private ?string $membershipNumber;
    private ?string $position;

    public static function createFromResponse(\stdClass $response): self
    {
        $staff = new self();

        $staff->id = $response->guid;
        $staff->name = $response->naam;
        $staff->membershipNumber = $response->lidNr;
        $staff->position = $response->tvCaC;

        return $staff;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMembershipNumber(): ?string
    {
        return $this->membershipNumber;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }
}
