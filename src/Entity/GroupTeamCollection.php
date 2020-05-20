<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class GroupTeamCollection implements \IteratorAggregate
{
    private array $teams = [];

    public static function createFromArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $team) {
            $collection->teams[$team->guid] = GroupTeam::createFromResponse($team);
        }

        return $collection;
    }

    /**
     * @return ArrayIterator|\Traversable|GroupTeam[]
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->teams);
    }

    /**
     * @return GroupTeam[]
     */
    public function sortedByRank(): array
    {
        $collection = $this->teams;

        usort($collection, fn($a, $b) => $a->getRank() < $b->getRank());

        return $collection;
    }
}
