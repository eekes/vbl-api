<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

use ArrayIterator;

class GameCollection implements \IteratorAggregate
{
    private array $games = [];

    public static function createFromArrayResponse(array $response): self
    {
        $collection = new self();

        foreach ($response as $game) {
            $collection->games[$game->guid] = Game::createFromResponse($game);
        }

        return $collection;
    }

    /**
     * @return ArrayIterator|\Traversable|Game[]
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->games);
    }

    /**
     * @return Game[]
     */
    public function sortedByDate(): array
    {
        $collection = $this->games;

        usort($collection, fn($a, $b) => $a->getStart() > $b->getStart());

        return $collection;
    }
}
