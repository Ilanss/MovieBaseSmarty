<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:49
 */

class film
{
    private static $table = 'movie';

    public static function all(){
        $db = database::connect();
        $req = $db->prepare('SELECT * FROM '.self::$table);

        if ($req->execute()) {
            return $req->fetchAll(PDO::FETCH_OBJ);
        }
        return null;
    }

    public static function filmFromUser($values){
        $db = database::connect();
        $req = $db->prepare('SELECT id, title, description, image, 1 as list, vu  FROM '.self::$table.' INNER JOIN movie_has_user ON movie_has_user.movie_id = movie.id WHERE user_id = :id');
        if ($req->execute([':id' => $values[':id']])) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        else {
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);
        }
    }

    public static function allFilmPlusList($values){
        $db = database::connect();
        $req = $db->prepare('SELECT id, title, description, image, SUM(CASE WHEN user_id = :id THEN 1 ELSE 0 END) AS list, vu   FROM '.self::$table.' LEFT JOIN movie_has_user ON movie_has_user.movie_id = movie.id GROUP BY title');
        if ($req->execute([':id' => $values[':id']])) {
            $res = $req->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }
        else {
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);
        }
    }

    public static function create($values){
        $db = database::connect();
        $req = $db->prepare('INSERT INTO '.self::$table.' (title, description, image) VALUES (:title, :description, :image)');
        if ($req->execute($values)) {
            return null;
        }
        else {
            // Si un problème est survenu lors de l'exécution de la requête
            // On lance une exception avec le message d'erreur de l'exécution ratée
            throw new Exception($req->errorInfo()[2]);
        }
    }

    public static function modify($values){
        $db = database::connect();
        $req = $db->prepare('UPDATE '.self::$table.' SET title = :title, description = :description, image = :image WHERE id = :id');
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