<?php

/**
 * This file is part of sc/rest-client
 *
 * © Konstantin Zamyakin <dev@weblab.pro>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sc\RestClient\ResponseParser;

use Psr\Http\Message\ResponseInterface;
use Sc\RestClient\ResponseParser\Exception\ParsingFailedException;

class JsonResponseParser implements ResponseParserInterface
{
    public function parseResponse(ResponseInterface $response)
    {
        $result = json_decode((string) $response->getBody(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ParsingFailedException();
        }

        return $result;
    }
}
