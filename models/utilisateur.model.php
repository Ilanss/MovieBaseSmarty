<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:49
 */

/* --- Class contenant toutes les opérations sur la table user de la base de données --- */
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

    public static function showAll(){
        $db = database::connect();

        $req = $db->prepare("SELECT id, login, email, admin FROM ".self::$table);
        if ($req->execute()){
            return $req->fetchAll(PDO::FETCH_OBJ);
        }
        else{
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);
        }
    }

    public static function grantAdmin($values){
        $db = database::connect();

        $req = $db->prepare("UPDATE ".self::$table." SET admin = 1 WHERE id = :id");
        if ($req->execute($values)) {
            return null;
        }
        else{
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);

        }

    }

    public static function revokeAdmin($values){
        $db = database::connect();

        $req = $db->prepare("UPDATE ".self::$table." SET admin = 0 WHERE id = :id");
        if ($req->execute($values)) {
            return null;
        }
        else{
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);

        }

    }

    public static function delete($values){
        $db = database::connect();

        $req = $db->prepare("DELETE FROM ".self::$table." WHERE id = :id");
        if ($req->execute($values)) {
            return null;
        }
        else{
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);

        }

    }

    public static function updatePassword($values){
        $db = database::connect();

        $req = $db->prepare("UPDATE ".self::$table." SET password = :password WHERE id = :id");
        if ($req->execute($values)) {
            return null;
        }
        else{
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);

        }

    }

}
