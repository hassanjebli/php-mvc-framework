<?php

require_once __DIR__ . "/vendor/autoload.php";

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(__DIR__,$config);



$app->db->applyMigrations();
