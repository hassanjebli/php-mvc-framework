<?php

namespace app\core\exception;

use Exception;

/**
 * @package app\core\exception
 */
class NotFoundException extends Exception
{
    protected $code =404;
    protected $message ="The page you're looking for doesn't exist.";
}
