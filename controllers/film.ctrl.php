<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:48
 */

require_once ('models/film.model.php');

class filmCtrl{

    public static function create(){
        $values = [
            ':title' => empty($_POST['title']) ? null : $_POST['title'],
            ':image' => ($_FILES['image']['size'] == 0) ? $_SESSION['root'] . "/assets/img/poster-placeholder.png" : $_SESSION['root'] . "/assets/img/poster/" . basename($_FILES['image']['name']),
            ':description' => empty($_POST['description']) ? null : $_POST['description']
        ];

        (empty($values[':title']) OR empty($values[':description'])) ? $errors = "Veuillez donner un titre et une description" : '';

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
                $errors = film::create($values);

                if (empty($errors)) {
                    $smarty->assign('success', "Le film " . $values[':title'] . " a été créé!");
                    $smarty->display('film/index.html.tpl');
                    $smarty->clear_assign('success');
                } else {
                    $smarty->assign('errors', "Une erreur s'est produite lors de l'insertion du film dans la base de donnée...");
                    $smarty->display('film/create.html.tpl');
                    $smarty->clear_assign('errors');
                }
            }
        }
        else {
            $smarty->display('film/create.html.tpl');
        }
    }

    public static function modify(){
        $values = [
            ':title' => empty($_POST['title']) ? null : $_POST['title'],
            ':image' => ($_FILES['image']['size'] == 0) ? $_SESSION['root'] . "/assets/img/poster-placeholder.png" : $_SESSION['root'] . "/assets/img/poster/" . basename($_FILES['image']['name']),
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
                    $smarty->display('film/index.html.tpl');
                    unset($success);
                } else {
                    $smarty->assign('errors', "Une erreur s'est produite lors de l'insertion du film dans la base de donnée...");
                    $smarty->display('film/create.html.tpl');
                    $smarty->assign('errors');
                }
            }
        }
        else {
            $smarty->display('film/create.html.tpl');
        }
    }

    public static function delete(){

    }

    public static function all(){
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

    public static function allFromUser(){
        $values = [
            ':id' => $_SESSION['id']
            ];

        $smarty->assign('films', film::filmFromUser($values));
        $smarty->display('film/index.html.tpl');
    }

    public static function find(){

    }

    public static function add(){
        $values = [
            ':idFilm' => $_POST['id'],
            ':idUser' => $_SESSION['id']
        ];

        require_once ('models/userHasFilm.model.php');

        $errors = userHasFilm::add($values);

        if(empty($errors)){
            $smart->assign('success', "Le film a été ajouté à votre liste");
            $values = [
                ':id' => $_SESSION['id']
            ];
            $smarty->assign('films', film::allFilmPlusList($values));
            $smarty->display('film/index.html.tpl');
            $smarty->clear_assign('success');
        }
        else{
            $smarty->assign('errors', "Une erreur s'est produite lors de l'insertion du film dans votre liste...");
            $smarty->display('film/index.html.tpl');
            $smarty->clear_assign('errors');
        }
    }

    public static function view(){
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
            $smarty->display('film/index.html.tpl');
            $smarty->clear_assign('success');
        }
        else{
            $smarty->assign('errors', "Une erreur s'est produite lors de l'ajout au film vu...");
            $smarty->display('film/index.html.tpl');
            $smarty->clear_assign('errors');
        }
    }
}