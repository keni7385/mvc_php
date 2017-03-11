<?php

// passare ad un dependecy injection container one day
final class Database
{
    private static $instance;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dname=" . DB_NAME, "DB_USER", "DB_PASS");
        }

        return self::$instance;
    }

}



?>