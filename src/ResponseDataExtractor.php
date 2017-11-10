<?php

namespace Dykyi;

use Dykyi\Exceptions\ClientException;
use Dykyi\Handle\ResponseDataExtractorInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * ResponseDataExtractor Extracts secret data from psr http Response
 */
class ResponseDataExtractor implements ResponseDataExtractorInterface
{
    /**
     * @param ResponseInterface $response
     * @throws ClientException
     * @return mixed
     */
    public function extract(ResponseInterface $response)
    {
        $responseBody = (string)$response->getBody();
        $rawDecoded   = json_decode($responseBody);

        if ($rawDecoded === null) {
            $oneLineResponseBody = str_replace("\n", '\n', $responseBody);
            throw new ClientException(sprintf(ClientException::ERROR_2, $oneLineResponseBody));
        }

        return $rawDecoded;
    }
}
