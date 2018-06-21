<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:48
 */

/* --- Appel du model film pour les actions sur la base de données --- */
require_once ('models/film.model.php');

/* --- Controlleur pour toutes les opérations concernant les films --- */
class filmCtrl{

    /* --- Fonction gérant la création d'un film --- */
    public static function create($smarty){
        $values = [
            ':title' => empty($_POST['title']) ? null : $_POST['title'],
            ':image' => ($_FILES['image']['size'] == 0) ? "/assets/img/poster-placeholder.png" : "/assets/img/poster/" . basename($_FILES['image']['name']),
            ':description' => empty($_POST['description']) ? null : $_POST['description']
        ];

        (empty($values[':title']) OR empty($values[':description'])) ? $errors = "Veuillez donner un titre et une description" : '';

        if(empty($errors)) {
            if(($_FILES['image']['size'] != 0)) {
                $uploadfile = ".." . $_SESSION['root'] . "/assets/img/poster/" . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {}
                else {
                    $smarty->assign('errors', "Erreur au transfert de l'image...");
                    $errors = "Erreur au transfert de l'image...";
                    $smarty->display('film/create.html.tpl');
                    $smarty->clearAssign('errors');
                }
            }
            if(empty($errors)) {
                $errors = film::create($values);

                if (empty($errors)) {
                    $smarty->assign('success', "Le film " . $values[':title'] . " a été créé!");
                    filmCtrl::all($smarty);
                } else {
                    $smarty->assign('errors', "Une erreur s'est produite lors de l'insertion du film dans la base de donnée...");
                    $smarty->display('film/create.html.tpl');
                }
            }
        }
        else {
            $smarty->display('film/create.html.tpl');
        }
    }

    /* --- Fonction gérant la modification d'un film --- */
    public static function modify($smarty){
        $values = [
            ':title' => empty($_POST['title']) ? null : $_POST['title'],
            ':image' => ($_FILES['image']['size'] == 0) ? "/assets/img/poster-placeholder.png" : "/assets/img/poster/" . basename($_FILES['image']['name']),
            ':description' => empty($_POST['description']) ? null : $_POST['description'],
            ':id' => $_POST['id']
        ];

        (empty($values[':title']) OR empty($values[':description'])) ? $smarty->assign('errors', "Veuillez donner un titre et une description") : '';

        if(empty($errors)) {
            if(($_FILES['image']['size'] != 0)) {
                $uploadfile = ".." . $_SESSION['root'] . "/assets/img/poster/" . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {}
                else {
                    $smarty->assign('errors', "Erreur au transfert de l'image...");
                    $smarty->display('film/create.html.tpl');
                }
            }
            if(empty($errors)) {
                $errors = film::modify($values);

                if (empty($errors)) {
                    $smarty->assign('success', "Le film " . $values[':title'] . " a été modifié!");
                    filmCtrl::all($smarty);
                } else {
                    $smarty->assign('errors', "Une erreur s'est produite lors de l'insertion du film dans la base de donnée...");
                    $smarty->display('film/create.html.tpl');
                }
            }
        }
        else {
            $smarty->display('film/create.html.tpl');
        }
    }

    /* --- Fonction gérant la suppression d'un film --- */
    public static function delete($smarty){
        $values = [
            ':id' => $_POST['id']
        ];

        require_once ('models/userHasFilm.model.php');

        (empty($values[':id'])) ? $errors = "Pas d'id reçus..." : '';

        if (empty($errors)) {
            $db = database::connect();
            $db->beginTransaction();

            try {
                userHasFilm::deleteMovie($values);
                film::delete($values);
                // Si on arrive jusqu'à cette ligne, c'est que toutes les créations se font correctement
                // Du coup, on "valide" toutes les opérations effectuées sur la base de données
                $db->commit();
                $smarty->assign('success', "Le film a été supprimé!");
                filmCtrl::all($smarty);
            } catch (Exception $e) {
                // Si on capte la moindre erreur, c'est qu'une des opérations n'a pas été
                // Dans ce cas, on annule tout ce qu'on a tenté de faire depuis le début de la transaction
                $db->rollback();
                $smarty->assign('errors', "Une erreur s'est produite lors de la suppression du film...");
                filmCtrl::all($smarty);
            }
        }
        else {
            $smarty->assign('errors', "Pas d'id reçus...");
            filmCtrl::all($smarty);
        }
    }

    /* --- Fonction gérant l'affichage de tous les films --- */
    public static function all($smarty){

        if(isset($_SESSION['id'])){
            $values = [
              ':id' => $_SESSION['id']
            ];
            $smarty->assign('films', film::allFilmPlusList($values));
        }
        else {

            $smarty->assign('films', film::all());
        }
        $smarty->display('film/index.html.tpl');
    }

    /* --- Fonction gérant l'affichage de tous les films d'un utilisateur --- */
    public static function allFromUser($smarty){
        $values = [
            ':id' => $_SESSION['id']
            ];

        $smarty->assign('films', film::filmFromUser($values));
        $smarty->display('film/index.html.tpl');
    }

    /* --- Fonction gérant l'ajout d'un film dans la liste d'un utilisateur --- */
    public static function add($smarty){
        $values = [
            ':idFilm' => $_POST['id'],
            ':idUser' => $_SESSION['id']
        ];

        require_once ('models/userHasFilm.model.php');

        $errors = userHasFilm::add($values);

        if(empty($errors)){
            $smarty->assign('success', "Le film a été ajouté à votre liste");
            $values = [
                ':id' => $_SESSION['id']
            ];
            $smarty->assign('films', film::allFilmPlusList($values));
            filmCtrl::all($smarty);
        }
        else{
            $smarty->assign('errors', "Une erreur s'est produite lors de l'insertion du film dans votre liste...");
            filmCtrl::all($smarty);
        }
    }

    /* --- Fonction gérant l'ajout d'un film dans les vu de l'utilisateur --- */
    public static function view($smarty){
        $values = [
            ':idFilm' => $_POST['vu'],
            ':idUser' => $_SESSION['id']
        ];

        require_once ('models/userHasFilm.model.php');

        $errors = userHasFilm::view($values);

        $values = [
            ':id' => $_SESSION['id']
        ];
        $films = film::allFilmPlusList($values);

        if(empty($errors)){
            $smarty->assign('success', "Le film à été coché comme vu!");
            filmCtrl::all($smarty);
        }
        else{
            $smarty->assign('errors', "Une erreur s'est produite lors de l'ajout au film vu...");
            filmCtrl::all($smarty);
        }
    }

    /* --- Fonction gérant la recherche de films --- */
    public static function search($smarty){
        $values = [
            ':id' => $_POST['id'],
            ':search' => $_POST['search'],
        ];

        $smarty->assign('films', film::find($values));
        $smarty->display('film/index.html.tpl');
    }
}