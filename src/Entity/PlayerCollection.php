<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class PlayerCollection implements \IteratorAggregate
{
    private array $players = [];

    public static function createFromArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $player) {
            $collection->players[$player->relGuid] = Player::createFromResponse($player);
        }

        return $collection;
    }

    /**
     * @return ArrayIterator|\Traversable|Player[]
     */
    public function getIterator()
    {
        return new ArrayIterator($this->players);
    }
}
