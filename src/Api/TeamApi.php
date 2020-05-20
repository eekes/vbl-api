<?php
declare(strict_types=1);

namespace Eekes\VblApi\Api;

use Eekes\VblApi\Entity\Team as TeamEntity;

class TeamApi extends AbstractApi
{
    public static function byId(string $id): TeamEntity
    {
        $api = new self();

        $response = $api->call("TeamDetailByGuid?teamguid=" .  $id);

        return TeamEntity::createFromResponse($response[0]);
    }
}


