<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 29.05.18
 * Time: 21:52
 */

class database
{
    public static function connect(){

        $ibConfig = include('config.php');

        try {
            $db = new PDO('mysql:host='.$ibConfig['DB_HOST'].';dbname='.$ibConfig['DB_NAME'],
                $ibConfig['DB_USER'],
                $ibConfig['DB_PASS'],
                array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        } catch (PDOException $e) {
            halt("Connexion failed: ".$e);
        }

        return $db;
    }
}