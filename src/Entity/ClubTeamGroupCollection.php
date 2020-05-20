<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class ClubTeamGroupCollection implements \IteratorAggregate
{
    private array $groups = [];

    public static function createFromArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $group) {
            $collection->groups[$group->guid] = ClubTeamGroup::createFromResponse($group);
        }

        return $collection;
    }

    /**
     * @return ArrayIterator|\Traversable|ClubTeamGroup[]
     */
    public function getIterator()
    {
        return new ArrayIterator($this->groups);
    }
}
