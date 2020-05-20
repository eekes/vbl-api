<?php
declare(strict_types=1);

namespace Eekes\VblApi\Tests\Api;

use Eekes\VblApi\Api\TeamApi;
use Eekes\VblApi\Entity\Team;
use PHPUnit\Framework\TestCase;

class TeamApiTest extends TestCase
{
    public function testApiById()
    {
        $response = TeamApi::byId(getenv('TEAM_ID'));
        $this->assertInstanceOf(Team::class, $response);
    }
}