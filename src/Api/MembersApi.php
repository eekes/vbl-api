<?php
declare(strict_types=1);

namespace Eekes\VblApi\Api;

use Eekes\VblApi\Entity\MemberCollection;

class MembersApi extends AbstractApi
{
    public static function byClubId(string $id): MemberCollection
    {
        $api = new self();

        $response = $api->call("RelatiesByOrgGuid?orgguid=" .  $id);

        return MemberCollection::createFromArrayResponse($response);
    }
}


