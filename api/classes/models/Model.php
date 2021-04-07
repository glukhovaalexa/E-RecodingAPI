<?php

namespace Api\Classes\Models;
use Api\Core\Classes\DB\Db;

class Model{

    /**
     * get all rows from table
     */
    public static function getAll()
    {
        $db = Db::getInstance();
        $table = static::getTableName();
        $stmt = $db->dbh->prepare("SELECT * FROM $table");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
        $stmt = null;
        // $db->close();
        return $result;
    }

    /**
     * insert into table
     */
    public static function insert($data)
    {
        
        $db = Db::getInstance();
        $params = \array_keys($data);
        $values = [];
        $table = static::getTableName();
        
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
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute())
        {
            return self::getLastInsert();
        }

        return false;

    }

    /**
     * get last insert
     */
    public static function getLastInsert() : array
    {
        $db = Db::getInstance();
        $table = static::getTableName();

        $stmt = $db->dbh->prepare("SELECT * FROM $table ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $stmt = null;
        $db->close();
        return $result;
    }

    public static function getTableName()
    {
        $refl = new \ReflectionClass(static::class);
        $table = '';
        $className = mb_strtolower($refl->getShortName());
        if(mb_substr($className, -1) === 'y')
        {
            $table = mb_substr($className, 0, strlen($className) - 1) . 'ies';
            return $table;
        }
        $table = mb_strtolower($refl->getShortName()) . 's';
        return $table;
    }

    //////////// relationship /////////////////
    /**
     * get one  row from table
     */
    public static function getOne($id)
    {
        $db = Db::getInstance();
        $table = static::getTableName();
        $stmt = $db->dbh->prepare("SELECT * FROM $table WHERE id=$id");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
        $stmt = null;
        // $db->close();
        return $result;
    }

     /**
     * get many rows from table
     */
    public static function getMany($key, $id)
    {
        $db = Db::getInstance();
        $table = static::getTableName();
        $stmt = $db->dbh->prepare("SELECT * FROM $table WHERE $key=$id");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
        $stmt = null;
        // $db->close();
        return $result;
    }

    public function has($class, $model, $key)
    {
        $res = $class::getOne($model->$key)[0];
        return  $res;
    }

    public function belongsToMany($class, $model, $key)
    {
        $res = $class::getMany($key, $model->id);
        return  $res;
    }
}