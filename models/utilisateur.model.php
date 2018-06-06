<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:49
 */

class utilisateur
{
    private static $table = 'user';

    public static function login(array $values) {
        $db = database::connect();
        $req = $db->prepare("SELECT login, password FROM " . self::$table . " WHERE login = :login AND password = :password");
        if ($req->execute($values)) {
            if(!empty($req->fetch())){
                return null;
            }
            else {
                return "Login ou mot de passe incorrect";
            }
        }
        else {
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);
        }
        return null;

    }

    public static function getId($values){
        $db = database::connect();
        $req = $db->prepare("SELECT id FROM " . self::$table . " WHERE login = :login");
        if ($req->execute([':login' => $values[':login']])) {
            $res = $req->fetch();
            return $res['id'];
        }
        else {
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);
        }
        return null;
    }

    public static function create(array $values){
        $db = database::connect();

        $req = $db->prepare("INSERT INTO " . self::$table . " (login, password, email) VALUES (:login, :password, :email)");
        if ($req->execute($values)) {
            return null;
        }
        else {
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);
        }
        return null;
    }

    public static function isAdmin($values){
        $db = database::connect();

        $req = $db->prepare("SELECT admin FROM ".self::$table." WHERE login = :login");
        if ($req->execute([':login' => $values[':login']])){
            return $req->fetch();
        }
        else{
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);
        }
    }

}
