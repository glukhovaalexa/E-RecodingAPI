<?php

namespace Api\Classes\Models;
use Api\Core\Classes\DB\Db;

class Model{

    /**
     * get all rows from table
     * 
     * return array
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
     * get one  row from table
     * 
     * return obj
     */
    public static function getOne($id)
    {
        $db = Db::getInstance();
        $table = static::getTableName();
        $stmt = $db->dbh->prepare("SELECT * FROM $table WHERE id=$id");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
        $stmt = null;
        if(!empty($result))
        {
            return $result[0];
        }
        // $db->close();
        return $result;
    }

     /**
     * get many rows from table
     * 
     * return array
     */
    public static function find($data)
    {
        $db = Db::getInstance();
        $table = static::getTableName();
        $sql = '';
        foreach($data as $key => $value)
        {
            if(!empty($value))
            {
                if(array_key_last($data) === $key)
                {
                    $sql .= "$key='$value'";
                }
                else{
                    $sql .= "$key=$value" . ' AND ';
                }
            }
        }
        $stmt = $db->dbh->prepare("SELECT * FROM $table WHERE $sql");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
        $stmt = null;
        // $db->close();
        return $result;
    }

    /**
     * insert into table
     * 
     * return array / bool
     */
    public static function create($data)
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
     * update table
     * 
     * return obj / bool
     */
    public static function update($data)
    {
        $db = Db::getInstance();
        $table = static::getTableName();

        $sql = "";
        foreach($data as $key => $value)
        {
            if(array_key_last($data) === $key)
            {
                $sql .= "$key=:$key";
            }
            else
            {
                $sql .= "$key=:$key, ";
            }
        }

        $sql = "UPDATE $table SET $sql WHERE id={$data['id']}";
        
        $stmt = $db->dbh->prepare($sql);
        if($stmt->execute($data))
        {
            return static::class::getOne($data['id']);
        }

        return false;
    }

    /**
     * delete from table
     * 
     * return obj / bool
     */
    public static function delete($id)
    {
        $db = Db::getInstance();
        $table = static::getTableName();
        $result = static::class::getOne($id); 

        $sql = "DELETE FROM $table WHERE id=$id";
        $stmt = $db->dbh->prepare($sql);
        if($stmt->execute())
        {
            return $result;
        }

        return false;
    }

    /**
     * get last insert
     * 
     * return array
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

    /**
     * get table name
     * 
     * return string
     */
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


    /////////////////////// relationship /////////////////////

    /**
    * has one
    *
    * return obj
    */
    public function has($class, $model, $key)
    {
        $res = $class::getOne($model->$key);
        return  $res;
    }

    /**
    * has many
    *
    * return array
    */
    public function hasMany($class, $model, $key)
    {
        $res = $class::getMany($key, $model->id);
        return  $res;
    }

    /**
    * belongs to many
    *
    * return array
    */
    public function belongsToMany($class, $model, $key)
    {
        $res = $class::getMany($key, $model->id);
        return  $res;
    }

    /**
    * get many rows from table
    *
    * return array
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
}