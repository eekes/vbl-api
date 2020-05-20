<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class ClubTeamCollection implements \IteratorAggregate
{
    private array $teams = [];

    public static function createFromArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $team) {
            $collection->teams[$team->guid] = ClubTeam::createFromResponse($team);
        }

        return $collection;
    }

    /**
     * @return ArrayIterator|\Traversable|Team[]
     */
    public function getIterator()
    {
        return new ArrayIterator($this->teams);
    }
}
