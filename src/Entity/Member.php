<?php
declare(strict_types=1);

namespace Eekes\VblApi\Entity;

class Member
{
    private string $id;
    private ?string $lastName;
    private ?string $firstName;
    private ?\DateTimeImmutable $birthDate;

    public static function createFromResponse(\stdClass $response): self
    {
        $member = new self();

        $member->id = $response->relGuid;
        $member->lastName = $response->naam;
        $member->firstName = $response->vnaam;
        $member->birthDate = \DateTimeImmutable::createFromFormat('d-m-Y', $response->gebdat);

        return $member;
    }
}