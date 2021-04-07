<?php

namespace Api\Core\Classes\DB;

class Db {

    public $dbh;
    private static $instance;

    private function __construct()
    {
        try {
            $this->dbh = new \PDO("mysql:host=localhost;dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASS']);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public static function getInstance(): self 
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function close()
    {
        return $this->dbh = null;
    }

}