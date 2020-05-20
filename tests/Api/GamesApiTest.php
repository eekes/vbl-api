<?php
declare(strict_types=1);

namespace Eekes\VblApi\Tests\Api;

use Eekes\VblApi\Api\MembersApi;
use Eekes\VblApi\Entity\MemberCollection;
use PHPUnit\Framework\TestCase;

class GamesApiTest extends TestCase
{
    public function testApiByClubId()
    {
        $response = MembersApi::byClubId(getenv('CLUB_ID'));
        $this->assertInstanceOf(MemberCollection::class, $response);
    }

    public function testWithEmptyResult()
    {
        $response = MembersApi::byClubId('xxx');
        $this->assertInstanceOf(MemberCollection::class, $response);
    }
}