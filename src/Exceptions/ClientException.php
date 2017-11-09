<?php

namespace Dykyi\Exceptions;

use Exception;

/**
 * Class ClientException
 * @package Dykyi\Exceptions
 */
class ClientException extends Exception
{
    const ERROR_1 = 'File %s not found!';
}