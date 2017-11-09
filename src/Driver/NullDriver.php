<?php

namespace Dykyi\Driver;

use Dykyi\Handle\BuilderInterface;
use Dykyi\Handle\SocialDriverInterface;

/**
 * Class NullDriver
 * @package Dykyi\Driver
 */
class NullDriver implements SocialDriverInterface
{

    public function getData()
    {
        return [];
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