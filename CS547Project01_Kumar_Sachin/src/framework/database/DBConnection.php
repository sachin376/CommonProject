<?php
namespace AztecGameStudios\framework\database;

use PDO;

class DBConnection
{
    private static $db = null;
    private function __construct()
    {
    }

    public static function getdb($host, $dbName, $username, $password)
    {

        try {
            if (is_null(self::$db)) {
                self::$db = new PDO("mysql:host=" . $host . ";dbname=" . $dbName, $username, $password);
            }
        } catch (PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        }

        return self::$db;
    }
}
