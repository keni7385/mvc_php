<?php

// passare ad un depency injection container un giorno
/*class Session {
    public static function init() {
        session_start();
    }

    public static function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function destroy() {
        session_unset();
        session_destroy();
    }
}*/
// Singleton, seems having something wrong
final class Session
{
    private static $instance = null;

    private function __construct() {
        session_start();
    }
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new Session();
        }

        return self::$instance;
    }

    public static function set($k, $v) {
        $_SESSION[$k] = $v;
    }

    public static function get($k) {
        return (isset($_SESSION[$k]) ? $_SESSION[$k] : null);
    }

    public static function destroy() {
        session_unset();
        session_destroy();
        // ? unset(self::$instance);
    }
}



?>