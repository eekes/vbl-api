<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class StaffCollection implements \IteratorAggregate
{
    private array $staff = [];

    public static function createFromArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $staff) {
            $collection->staff[$staff->guid] = Staff::createFromResponse($staff);
        }

        return $collection;
    }

    /**
     * @return ArrayIterator|\Traversable|Staff[]
     */
    public function getIterator()
    {
        return new ArrayIterator($this->staff);
    }
}
