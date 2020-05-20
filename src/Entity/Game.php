<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class Game
{
    const RESULT_WIN = 'win';
    const RESULT_LOSS = 'loss';
    const RESULT_DRAW = 'draw';

    private string $id;
    private string $gameId;
    private string $homeTeamId;
    private string $awayTeamId;
    private string $homeTeamName;
    private string $awayTeamName;
    private \DateTimeImmutable $start;
    private ?string $accommodationId;
    private ?string $accommodationName;
    private string $groupId;
    private string $groupName;
    private int $homeScore = 0;
    private int $awayScore = 0;
    private string $homeResult;
    private string $awayResult;

    public static function createFromResponse(\stdClass $response): self
    {
        $game = new static;

        $game->id = $response->guid;
        $game->gameId = $response->wedID;
        $game->homeTeamId = $response->tTGUID;
        $game->homeTeamName = $response->tTNaam;
        $game->awayTeamId = $response->tUGUID;
        $game->awayTeamName = $response->tUNaam;
        $game->accommodationId = $response->accGUID;
        $game->accommodationName = $response->accNaam;
        $game->groupId = $response->pouleGUID;
        $game->groupName = $response->pouleNaam;
        $game->start = $game->buildStartDateTime($response->datumString, $response->beginTijd);

        $scores = explode("-", $response->uitslag);

        if (isset($scores[1])) {
            $game->homeScore = (int)$scores[0];
            $game->awayScore = (int)$scores[1];

            if ($game->getHomeScore() === $game->getAwayScore()) {
                $game->homeResult = self::RESULT_DRAW;
                $game->awayResult = self::RESULT_DRAW;
            } elseif ($game->getHomeScore() > $game->getAwayScore()) {
                $game->homeResult = self::RESULT_WIN;
                $game->awayResult = self::RESULT_LOSS;
            } else {
                $game->homeResult = self::RESULT_LOSS;
                $game->awayResult = self::RESULT_WIN;
            }
        }

        return $game;
    }

    private function buildStartDateTime(string $date, string $time): \DateTimeImmutable
    {
        return \DateTimeImmutable::createFromFormat('d-m-Y H.i', $date . ' ' . $time);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getGameId(): string
    {
        return $this->gameId;
    }

    public function getHomeTeamId(): string
    {
        return $this->homeTeamId;
    }

    public function getAwayTeamId(): string
    {
        return $this->awayTeamId;
    }

    public function getHomeTeamName(): string
    {
        return $this->homeTeamName;
    }

    public function getAwayTeamName(): string
    {
        return $this->awayTeamName;
    }

    public function getStart(): \DateTimeImmutable
    {
        return $this->start;
    }

    public function getAccommodationId(): ?string
    {
        return $this->accommodationId;
    }

    public function getAccommodationName(): ?string
    {
        return $this->accommodationName;
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getHomeScore(): int
    {
        return $this->homeScore;
    }

    public function getAwayScore(): int
    {
        return $this->awayScore;
    }

    public function getHomeResult(): string
    {
        return $this->homeResult;
    }

    public function getAwayResult(): string
    {
        return $this->awayResult;
    }

    public function isPlayed(): bool
    {
        if ($this->start < new \DateTimeImmutable('now')) {
            return true;
        }

        return false;
    }
}
