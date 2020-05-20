<?php
declare(strict_types=1);

namespace Eekes\VblApi\Tests\Api;

use Eekes\VblApi\Api\ClubApi;
use Eekes\VblApi\Entity\Club;
use PHPUnit\Framework\TestCase;

class ClubApiTest extends TestCase
{
    public function testApiById()
    {
        $response = ClubApi::byId(getenv('CLUB_ID'));
        $this->assertInstanceOf(Club::class, $response);
    }
}