<?php

namespace App\Classes\Models;
use App\Core\Classes\DB\Db;

class Model extends Db{

    public static function getAll($table)
    {
        $db = new Db;
        $stmt = $db->dbh->prepare("SELECT * FROM $table");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $stmt = null;
        $db->close();
        return $result;
    }

    public static function insert($table, $data)
    {
        $db = new Db;
        $stmt = $db->dbh->prepare("SELECT * FROM $table");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}