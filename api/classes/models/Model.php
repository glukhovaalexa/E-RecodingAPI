<?php

namespace Api\Classes\Models;
use Api\Core\Classes\DB\Db;

class Model extends Db{

    /**
     * get all rows from table
     */
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

    /**
     * insert into table
     */
    public static function insert($table, $data)
    {
        
        $db = new Db;
        $params = \array_keys($data);
        $values = [];
        foreach($params as $param)
        {
            $values[] = ':' . $param;
        }
        $params = implode(', ', $params);
        $values = implode(', ', $values);
        $sql = "INSERT INTO $table ($params) VALUES ($values)";
        $stmt = $db->dbh->prepare($sql);
        foreach($data as $key => $value)
        {
            $stmt->bindParam(":$key", $value);
        }
        if($stmt->execute())
        {
            return self::getLastInsert($table);
        }

        return false;

    }

    public static function getLastInsert($table)
    {
        $db = new Db;
        $stmt = $db->dbh->prepare("SELECT * FROM $table ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $stmt = null;
        $db->close();
        return $result;
    }
}