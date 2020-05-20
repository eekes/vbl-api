<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class Team
{
    private string $id;
    private string $name;
    private GroupCollection $groups;
    private PlayerCollection $players;
    private StaffCollection $staff;

    public static function createFromResponse(\stdClass $response): self
    {
        $team = new self();

        $team->id = $response->guid;
        $team->name = $response->naam;
        $team->groups = GroupCollection::createFromArrayResponse($response->poules);
        $team->players = PlayerCollection::createFromArrayResponse($response->spelers ?? []);
        $team->staff = StaffCollection::createFromArrayResponse($response->tvlijst ?? []);

        return $team;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGroups(): GroupCollection
    {
        return $this->groups;
    }

    public function getPlayers(): PlayerCollection
    {
        return $this->players;
    }

    public function getStaff(): StaffCollection
    {
        return $this->staff;
    }
}