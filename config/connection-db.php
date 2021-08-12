<?php
define('LOCAL', 'localhost');
define('DB', 'market');
define('USER', 'root');
define('PASSWORD', '12345');
define('DB_CHARSET', 'utf8mb4_general_ci');

class Connection
{
    public static $instance;

    private function __construct()
    {
        //
    }

    public static function getInstance()
    {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO(
                    'mysql:host =' . LOCAL . 'dbname =' . DB,
                    USER,
                    PASSWORD,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4')
                );
            };
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        } catch (PDOException $e) {
            die("Error! Couldnt connect to database: " . $e->getMessage());
        }
    }
}
