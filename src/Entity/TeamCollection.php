<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class TeamCollection implements \IteratorAggregate
{
    private array $teams = [];

    public static function createFromClubArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $team) {
            $collection->teams[$team->guid] = Team::createFromResponse($team);
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
