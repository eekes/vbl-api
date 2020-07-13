<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class Player
{
    private string $id;
    private string $name;
    private ?string $membershipNumber;
    private ?\DateTimeImmutable $birthDate;
    private ?\DateTimeImmutable $affiliationDate;

    public static function createFromResponse(\stdClass $response): self
    {
        $player = new self();

        $player->id = $response->relGuid;
        $player->name = $response->naam;
        $player->membershipNumber = $response->lidNr;
        $player->birthDate = \DateTimeImmutable::createFromFormat('d-m-Y', $response->sGebDat);
        $player->affiliationDate = \DateTimeImmutable::createFromFormat('d-m-Y H:i', $response->sAanslDat) ?: null;

        return $player;
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

    public function getBirthDate(): ?\DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function getAffiliationDate(): ?\DateTimeImmutable
    {
        return $this->affiliationDate;
    }
}