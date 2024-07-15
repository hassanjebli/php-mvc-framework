<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;
use LDAP\Result;

/**
 * @package app\controllers
 */

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Hassan AIT JABLI'
        ];
        return $this->render('home', $params);
    }
}
