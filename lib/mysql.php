<?php

class MySQL {
    private static $instance = NULL;
    
    private function __construct() {}
    private function __clone() {}
    
    public static function getInstance() {
        if (!self::$instance) {
            //self::$instance = new PDO("mysql:host=localhost;dbname=teamblog;charset=utf8", "root");
            self::$instance = new PDO("mysql:host=localhost;dbname=teamblog", "root", "shrank*cage6tide");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}

?>
