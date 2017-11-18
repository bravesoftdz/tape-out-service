<?php

namespace Dykyi\Driver;

use Dykyi\Handle\BuilderInterface;
use Dykyi\Handle\ResponseDataExtractorInterface;
use Dykyi\Handle\SocialDriverInterface;

/**
 * Class NullDriver
 * @package Dykyi\Driver
 */
class NullDriver implements SocialDriverInterface
{

    /**
     * @param ResponseDataExtractorInterface $extractor
     * @return array
     */
    public function getData(ResponseDataExtractorInterface $extractor)
    {
        return [true => 1];
    }

    /**
     * @param array $data
     * @param BuilderInterface $builder
     * @return string
     */
    public function build(array $data, BuilderInterface $builder)
    {
        return 'null';
    }

}