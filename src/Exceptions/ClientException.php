<?php

namespace Dykyi\Exceptions;

use RuntimeException;

/**
 * Class ClientException
 * @package Dykyi\Exceptions
 */
class ClientException extends RuntimeException
{
    const ERROR_1 = 'File %s not found!';
    const ERROR_2 = "Can't decode response: %s";
}