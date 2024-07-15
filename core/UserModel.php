<?php

namespace app\core;

use app\core\db\DbModel;

/**
 * @package app\core
 */

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}
