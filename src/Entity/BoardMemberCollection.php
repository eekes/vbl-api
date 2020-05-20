<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class BoardMemberCollection implements \IteratorAggregate
{
    private array $members = [];

    public static function createFromArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $member) {
            $collection->members[$member->relGuid] = BoardMember::createFromResponse($member);
        }

        return $collection;
    }

    /**
     * @return ArrayIterator|\Traversable|BoardMember[]
     */
    public function getIterator()
    {
        return new ArrayIterator($this->members);
    }
}
