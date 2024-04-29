<?php

namespace Database;

use PDO;

class DB
{
    private static $instance;
    private $connection;

    private function __construct($configData)
    {
        $this->connection = new PDO("{$configData['DB_CONNECTION']}:host={$configData['DB_HOST']};port={$configData['DB_PORT']};dbname={$configData['DB_DATABASE']}", $configData['DB_USERNAME'], $configData['DB_PASSWORD']);
    }

    public static function getInstance($configData = '')
    {
        if (self::$instance === null) {
            if ($configData === '') {
                return 'Укажите начальные параметры для создания объекта';
            }
            self::$instance = new self($configData);
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    private function __clone() {}
    private function __wakeup() {}
}