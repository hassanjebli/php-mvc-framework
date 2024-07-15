<?php

namespace app\core;


/**
 * @package app\core;
 */

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
    public function redirect(string $path)
    {
        header("location:$path");
    }
}
