<?php
declare(strict_types=1);

namespace Eekes\VblApi\Api;

use GuzzleHttp\Client;

abstract class AbstractApi
{
    const BASE_URL = 'http://vblcb.wisseq.eu/VBLCB_WebService/data/';

    /**
     * @return array|\stdClass[]
     */
    protected function call(string $url): array
    {
        $client = new Client(['base_uri' => self:: BASE_URL]);
        $response = $client->get($url);

        return json_decode($response->getBody()->getContents());
    }
}