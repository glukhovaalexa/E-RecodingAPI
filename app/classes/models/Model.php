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
        // $sql = "INSERT INTO users (name, lastname, city, phone, email, pass, pass_rep) 
        //          VALUES (:name, :lastname, :city, :phone, :email, :pass, :pass_rep)";
        // $stmt = $db->dbh->prepare($sql);
        // $array = [];
        // foreach($data as $key => $value)
        // {
        //     $array[] = $value;
        // }
        // list($name, $lastname, $city, $phone, $email, $pass, $pass_rep) = $array;
        // $susccess = $stmt->execute([':name' => $name, ':lastname' => $lastname, ':city' => $city, ':phone' => $phone, ':email' => $email, 
        //     ':pass' => $pass, ':pass_rep' => $pass_rep]);
        // $stmt = null;
        // $db->close();
        // return $susccess;
        $params = \array_keys($data);
        $sep = ':';
        // // var_dump($params);
        // //         exit;
        // $b = array_walk($params, function($sep){
        //     $array = [];
        //     foreach($params as $value)
        //     {
        //         var_dump($value);
        //         exit;
        //     }
        // });

        // var_dump($b);
        //////!!!! попробовать замыкание !!!/////
        $sql = "INSERT INTO $table ($params) 
                VALUES (:name, :lastname, :city, :phone, :email, :pass, :pass_rep)";
                exit;
        $stmt = $db->dbh->prepare($sql);
        foreach($data as $key => $value)
        {
            $stmt->bindParam(":$key", $value);
        }
        var_dump($stmt->execute());
        exit;
    }
}