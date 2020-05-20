<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class ClubTeam
{
    private string $id;
    private ?string $name;
    private ?string $category;
    private ?string $clubId;
    private ?string $shirtColor;
    private ?string $shirtReserveColor;
    private ClubTeamGroupCollection $groups;

    public static function createFromResponse(\stdClass $response): self
    {
        $team = new self();

        $team->id = $response->guid;
        $team->name = $response->naam;
        $team->category = $response->categorie;
        $team->clubId = $response->organisationGUID;
        $team->shirtColor = $response->shirtKleur;
        $team->shirtReserveColor = $response->shirtReserve;
        $team->groups = ClubTeamGroupCollection::createFromArrayResponse($response->poules);

        return $team;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getClubId(): ?string
    {
        return $this->clubId;
    }

    public function getShirtColor(): ?string
    {
        return $this->shirtColor;
    }

    public function getShirtReserveColor(): ?string
    {
        return $this->shirtReserveColor;
    }

    public function getGroups(): ClubTeamGroupCollection
    {
        return $this->groups;
    }
}