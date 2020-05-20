<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class AccommodationCollection implements \IteratorAggregate
{
    private array $accommodation = [];

    public static function createFromArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $accommodation) {
            $collection->accommodation[$accommodation->guid] = Accommodation::createFromResponse($accommodation);
        }

        return $collection;
    }

    /**
     * @return ArrayIterator|\Traversable|Accommodation[]
     */
    public function getIterator()
    {
        return new ArrayIterator($this->accommodation);
    }
}
