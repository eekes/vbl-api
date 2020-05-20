<?php
declare(strict_types=1);

namespace Eekes\VblApi\Tests\Api;

use Eekes\VblApi\Api\GamesApi;
use Eekes\VblApi\Entity\GameCollection;
use PHPUnit\Framework\TestCase;

class MembersApiTest extends TestCase
{
    public function testApiByClubId()
    {
        $response = GamesApi::byClubId(getenv('CLUB_ID'));
        $this->assertInstanceOf(GameCollection::class, $response);
    }

    public function testApiByTeamId()
    {
        $response = GamesApi::byTeamId(getenv('TEAM_ID'));
        $this->assertInstanceOf(GameCollection::class, $response);
    }

    public function testWithEmptyResult()
    {
        $response = GamesApi::byClubId('xxx');
        $this->assertInstanceOf(GameCollection::class, $response);

        $response = GamesApi::byTeamId('xxx');
        $this->assertInstanceOf(GameCollection::class, $response);
    }
}