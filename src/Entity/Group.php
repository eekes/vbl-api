<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class Group
{
    private string $id;
    private string $name;
    private ?string $category;
    private ?string $region;
    private ?string $regionId;
    private GroupTeamCollection $teams;

    public static function createFromResponse(\stdClass $response): self
    {
        $group = new self();

        $group->id = $response->guid;
        $group->name = $response->naam;
        $group->category = $response->categorie;
        $group->region = $response->regioNaam;
        $group->regionId = $response->regioGUID;
        $group->teams = GroupTeamCollection::createFromArrayResponse($response->teams);

        return $group;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function getRegionId(): ?string
    {
        return $this->regionId;
    }

    public function getTeams(): GroupTeamCollection
    {
        return $this->teams;
    }
}
