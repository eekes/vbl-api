<?php
declare(strict_types=1);

namespace Eekes\VblApi\Api;

use Eekes\VblApi\Entity\GameCollection;

class GamesApi extends AbstractApi
{
    public static function byTeamId(string $id): GameCollection
    {
        $api = new self();

        $response = $api->call("TeamMatchesByGuid?teamguid=" .  $id);

        return GameCollection::createFromArrayResponse($response);
    }

    public static function byClubId(string $id): GameCollection
    {
        $api = new self();

        $response = $api->call("OrgMatchesByGuid?issguid=" .  $id);

        return GameCollection::createFromArrayResponse($response);
    }
}


