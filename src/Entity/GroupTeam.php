<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class GroupTeam
{
    private string $id;
    private string $name;
    private int $rank = 0;
    private int $gamesPlayed = 0;
    private int $rankingPoints = 0;
    private int $pointsMade = 0;
    private int $pointsAgainst = 0;
    private ?string $remarks;
    private int $gamesWon = 0;
    private int $gamesLost = 0;
    private int $gamesDrawn = 0;
    private int $gamesForfeited = 0;

    public static function createFromResponse(\stdClass $response): self
    {
        $groupTeam = new self();

        $groupTeam->id = $response->guid;
        $groupTeam->name = $response->naam;
        $groupTeam->rank = (int) $response->rangNr;
        $groupTeam->gamesPlayed = (int) $response->wedAant;
        $groupTeam->rankingPoints = (int) $response->wedPunt;
        $groupTeam->pointsMade = (int) $response->ptVoor;
        $groupTeam->pointsAgainst = (int) $response->ptTegen;
        $groupTeam->remarks = $response->opmerk;
        $groupTeam->gamesWon = (int) $response->wedWinst;
        $groupTeam->gamesDrawn = (int) $response->wedGelijk;
        $groupTeam->gamesLost = (int) $response->wedVerloren;
        $groupTeam->gamesForfeited = (int) $response->wedNOKD;

        return $groupTeam;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function getGamesPlayed(): int
    {
        return $this->gamesPlayed;
    }

    public function getRankingPoints(): int
    {
        return $this->rankingPoints;
    }

    public function getPointsMade(): int
    {
        return $this->pointsMade;
    }

    public function getPointsAgainst(): int
    {
        return $this->pointsAgainst;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function getGamesWon(): int
    {
        return $this->gamesWon;
    }

    public function getGamesLost(): int
    {
        return $this->gamesLost;
    }

    public function getGamesDrawn(): int
    {
        return $this->gamesDrawn;
    }

    public function getGamesForfeited(): int
    {
        return $this->gamesForfeited;
    }
}
