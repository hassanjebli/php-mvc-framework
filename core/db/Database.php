<?php

namespace app\core\db;



/**
 * @package app\core\db
 */

use app\core\Application;
use PDO;

class Database
{
    public PDO $pdo;
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? "";
        $user = $config['user'] ?? "";
        $password = $config['password'] ?? "";
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Apply migrations
     * 
     * @return void
     */

    function applyMigrations(): void
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();


        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR . '/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach ($toApplyMigrations as $migration) {
            if ($migration === "." || $migration === "..") {
                continue;
            }

            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);

            $instance = new $className();
            $this->log("applying migrations $migration");
            /** @var object $instance */
            $instance->up();
            $this->log("applied migrations $migration");
            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("all migrations are applied");
        }
    }

    function createMigrationsTable()
    {
        $this->pdo->exec("
            CREATE TABLE IF NOT EXISTS migrations(
                id INT AUTO_INCREMENT PRIMARY KEY,
                migration VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;
        ");
    }
    function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare('SELECT migration FROM migrations');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }
    function saveMigrations(array $migrations)
    {

        $str = implode(",", array_map(fn ($m) => "('$m')", $migrations));


        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $str");
        $statement->execute();
    }
    function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    function log($message)
    {
        echo '[' . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
    }
}
