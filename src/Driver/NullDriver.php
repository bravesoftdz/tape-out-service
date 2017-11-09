<?php

namespace Dykyi\Driver;

use Dykyi\Handle\SocialDriverInterface;

/**
 * Class NullDriver
 * @package Dykyi\Driver
 */
class NullDriver implements SocialDriverInterface
{

    public function show()
    {
        return '';
    }

}