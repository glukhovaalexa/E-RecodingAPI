<?php

namespace App\Core\Classes\DB;

class Db extends \PDO {

    public $dbh;
    public function __construct()
    {
        try {
            $this->dbh = new \PDO("mysql:host=localhost;dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASS']);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}