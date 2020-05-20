<?php
declare(strict_types=1);

namespace Eekes\VblApi\Api;

use Eekes\VblApi\Entity\Club as ClubEntity;

class ClubApi extends AbstractApi
{
    public static function byId(string $id): ClubEntity
    {
        $api = new self();

        $response = $api->call("OrgDetailByGuid?issguid=" .  $id);

        return ClubEntity::createFromResponse($response[0]);
    }
}


