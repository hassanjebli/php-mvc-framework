<?php

namespace app\core\form;

use app\core\Model;

/**
 * @package app\core\form
 */

class Form
{
    public static function begin($action, $method)
    {
        echo "<form action='$action' method='$method'>";
        return new Form();
    }
    public static function end()
    {
        return '</form>';
    }
    public static function field(Model $model, $attribute)
    {
        return new InputField($model, $attribute);
    }
}
