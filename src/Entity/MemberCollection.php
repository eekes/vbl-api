<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class MemberCollection implements \IteratorAggregate
{
    private array $members = [];

    public static function createFromArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $member) {
            $collection->members[$member->relGuid] = Member::createFromResponse($member);
        }

        return $collection;
    }

    /**
     * @return ArrayIterator|\Traversable|Member[]
     */
    public function getIterator()
    {
        return new ArrayIterator($this->members);
    }
}
