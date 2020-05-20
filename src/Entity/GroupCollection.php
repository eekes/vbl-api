<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class GroupCollection implements \IteratorAggregate
{
    private array $groups = [];

    public static function createFromArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $group) {
            $collection->groups[$group->guid] = Group::createFromResponse($group);
        }

        return $collection;
    }

    /**
     * @return ArrayIterator|\Traversable|Group[]
     */
    public function getIterator()
    {
        return new ArrayIterator($this->groups);
    }
}
