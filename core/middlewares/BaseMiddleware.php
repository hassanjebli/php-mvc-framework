<?php

namespace app\core\middlewares;

/**
 * @package app\core\middlewares
 */

abstract class BaseMiddleware
{
    abstract public function execute();
}
