<?php
namespace AztecGameStudios\application\model;

use AztecGameStudios\framework\database\DBConnection;

// require_once __DIR__ . "/../../framework/database/DBConnection.php";

abstract class AbstractModel
{

    protected static $db;
    protected static $host = '127.0.0.1';
    protected static $dbName = 'sachin_ags_1';
    protected static $username = 'root';
    protected static $password = '';

    public function __construct()
    {
        self::$db = DBConnection::getdb(self::$host, self::$dbName, self::$username, self::$password);
    }
}
