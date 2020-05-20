<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class ClubTeamGroup
{
    private string $id;
    private string $name;

    public static function createFromResponse(\stdClass $response): self
    {
        $group = new self();

        $group->id = $response->guid;
        $group->name = $response->naam;

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
}
