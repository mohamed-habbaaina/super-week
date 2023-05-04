<?php
namespace App\Model;
class DbConnect
{
    public function __construct()
    {

    }
    
    private static $servername = 'localhost';
    private static $username_b = 'root';
    private static $password_b = '';
    private static $database = 'super_week';
    private static ?\PDO $_db = null;

    public static function getDb()
    {
        if (!self::$_db) {
            try {
                // get database infos from ini file in config folder
                // $db = parse_ini_file('..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.ini');

                // define PDO dsn with retrieved data
                // self::$_db = new \PDO($db['type'] . ':dbname=' . $db['name'] . ';host=' . $db['host'] . ';charset=' . $db['charset'], $db['user'], $db['password']);

                self::$_db = new \PDO('mysql:dbname=' . self::$database . ';host=' . self::$servername . ';charset=utf8mb4', self::$username_b, self::$password_b);

                // prevent emulation of prepared requests
                self::$_db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            } catch (\PDOException $e) {
                header("HTTP/1.1 403 Acces refused to the database");
                die();
            }
        }
        return self::$_db;
    }
}