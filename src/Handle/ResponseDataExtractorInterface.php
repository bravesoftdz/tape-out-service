<?php

namespace Dykyi\Handle;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface ResponseDataExtractorInterface
 * @package Dykyi\Handle
 */
interface ResponseDataExtractorInterface
{
    /**
     * @param  ResponseInterface   $response   psr-7 compliant result of http request
     * @return array data extracted from RequestInterface
     */
    public function extract(ResponseInterface $response);
}
