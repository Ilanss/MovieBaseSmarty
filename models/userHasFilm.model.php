<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 01.06.18
 * Time: 13:16
 */

class userHasFilm
{
    private static $table = 'movie_has_user';

    public static function add($values){
        $db = database::connect();
        $req = $db->prepare('INSERT INTO '.self::$table.' (movie_id, user_id) VALUES (:idFilm, :idUser)');
        if ($req->execute($values)) {
            return null;
        }
        else {
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);
        }

    }

    public static function view($values){
        $db = database::connect();
        $req = $db->prepare('UPDATE '.self::$table.' SET vu = true WHERE movie_id = :idFilm AND user_id = :idUser');
        if ($req->execute($values)) {
            return null;
        }
        else {
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);
        }
    }

}