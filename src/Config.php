<?php

namespace Dykyi;

/**
 * Class Config
 * @package Dykyi
 */
class Config
{
    /**
     * @param $key
     * @return array
     */
    public static function env($key)
    {
        return isset($_ENV[$key]) ? $_ENV[$key] : [];
    }
}
