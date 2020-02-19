<?php

namespace App\utils\database;

class Database
{

    /**
     * @var stores the connection to the PDO type database
     */
    private $settings =[];
    private static $db_user;
    private static $db_pass;
    private static $db_host;
    private static $db_name;
    private static $pdo;


    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->settings = require(dirname(__DIR__) . '/config/config.php');
        self::$db_user = $this->settings['db_user'];
        self::$db_pass = $this->settings['db_pass'];
        self::$db_host = $this->settings['db_host'];;
        self::$db_name = $this->settings['db_name'];;
    }

    public static function getPDO(){
        if(is_null(self::$pdo)) {
            self::$pdo = new \PDO('mysql:dbame='. self::$db_name .';host='. self::$db_host, self::$db_user, self::$db_pass);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;
    }
}