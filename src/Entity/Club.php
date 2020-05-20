<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class Club
{
    private ?string $id;
    private ?string $matricule;
    private string $name;
    private ?string $place;
    private ?string $email;
    private ?string $website;
    private Address $address;

    private BoardMemberCollection $boardMembers;
    private AccommodationCollection $accommodations;
    private ClubTeamCollection $teams;

    public static function createFromResponse(\stdClass $response): self
    {
        $club = new self();

        $club->id = $response->guid;
        $club->matricule = $response->stamNr;
        $club->name = $response->naam;
        $club->place = $response->plaats;
        $club->email = $response->email;
        $club->website = $response->website;

        $club->address = Address::createFromResponse($response->adres);
        $club->boardMembers = BoardMemberCollection::createFromArrayResponse($response->bestuur);
        $club->accommodations = AccommodationCollection::createFromArrayResponse($response->accomms);
        $club->teams = ClubTeamCollection::createFromArrayResponse($response->teams);

        return $club;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function getBoardMembers(): BoardMemberCollection
    {
        return $this->boardMembers;
    }

    public function getAccommodations(): AccommodationCollection
    {
        return $this->accommodations;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getTeams(): ClubTeamCollection
    {
        return $this->teams;
    }
}