<?php

namespace Dykyi;

use Dykyi\Exceptions\ClassNotFoundException;

/**
 * Class ServiceFactory
 * @package Dykyi
 */
abstract class ServiceFactory
{
    /**
     * @param $serviceName
     * @return mixed
     * @throws ClassNotFoundException
     */
    public function createByName($serviceName)
    {
        if (!class_exists($serviceName)){
            throw new ClassNotFoundException(sprintf(ClassNotFoundException::ERROR_1, $serviceName));
        }

        return new $serviceName();
    }
}