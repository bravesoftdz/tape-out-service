<?php

namespace Dykyi\Driver;

use Dykyi\Handle\BuilderInterface;
use Dykyi\Handle\ResponseDataExtractorInterface;
use Dykyi\Handle\SocialDriverInterface;

/**
 * Class FacebookDriver
 * @package Dykyi\Driver
 */
class FacebookDriver implements SocialDriverInterface
{

    /**
     * @param ResponseDataExtractorInterface $extractor
     * @return array
     */
    public function getData(ResponseDataExtractorInterface $extractor)
    {
        return ['test' => '2345'];
    }

    /**
     * @param array $data
     * @param BuilderInterface $builder
     * @return string
     */
    public function build(array $data, BuilderInterface $builder)
    {
        return 'facebook';
    }
}