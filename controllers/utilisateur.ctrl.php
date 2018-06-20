<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:47
 */

require_once ('models/utilisateur.model.php');

class utilisateurCtrl {

    public static function create($smarty){
        $values = [
            ':login' => empty($_POST['login']) ? null : $_POST['login'],
            ':password' => empty($_POST['password']) ? null : md5($_POST['password']),
            ':email' => empty($_POST['email']) ? null : $_POST['email']
        ];

        (empty($values[':login']) OR empty($values[':password'])) ? $errors = "Veuillez remplir les 2 champs" : '';

        if(empty($errors)) {
            $errors = utilisateur::create($values);

            if (empty($errors)) {
                $smarty->assign('success', 'Bienvenue '.$values[':login'].'! Commence à ajouter des films à ta liste!');
                require_once ('film.ctrl.php');
                filmCtrl::all($smarty);
            } else {
                $smarty->assign('errors', 'Une erreur s\'est produite lors de la création de l\'utilisateur');
                $smarty->display('utilisateur/create.html.tpl');
            }
        }
        else {
            $smarty->assign('errors', 'Veuillez remplir les 2 champs');
            $smarty->display('utilisateur/create.html.tpl');
        }
    }

    public static function delete($smarty){
        $values = [
            ':id' => empty($_POST['id']) ? null : $_POST['id'],
        ];

        require_once ('models/userHasFilm.model.php');

        (empty($values[':id'])) ? $errors = "Pas d'id transmit" : '';

        if(empty($errors)){
            $db = database::connect();
            $db->beginTransaction();

            try {
                userHasFilm::deleteUser($values);
                utilisateur::delete($values);
                // Si on arrive jusqu'à cette ligne, c'est que toutes les créations se font correctement
                // Du coup, on "valide" toutes les opérations effectuées sur la base de données
                $db->commit();
                $smarty->assign('success', "L'utilisateur à été supprimé!");
            } catch (Exception $e) {
                // Si on capte la moindre erreur, c'est qu'une des opérations n'a pas été
                // Dans ce cas, on annule tout ce qu'on a tenté de faire depuis le début de la transaction
                $db->rollback();
                $smarty->assign('errors', "Une erreur s'est produite lors de la suppression de l'utilisateur...");
            }
            utilisateurCtrl::showAll($smarty);
        }
        else {
            $smarty->assign('errors', "Pas d'id transmit");
            $smarty->display('utilisateur/index.html.tpl');
        }
    }

    public static function login($smarty){
        $values = [
            ':login' => empty($_POST['login']) ? null : $_POST['login'],
            ':password' => empty($_POST['password']) ? null : md5($_POST['password'])
            ];


        (empty($values[':login']) OR empty($values[':password'])) ? $errors = "Veuillez remplir les 2 champs" : '';

        if(empty($errors)) {
            $errors = utilisateur::login($values);
            $admin = utilisateur::isAdmin($values);

            if (empty($errors)) {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['id'] = utilisateur::getId($values);
                $_SESSION['admin'] = $admin['admin'];
                $smarty->assign('success', "Welcome back ".$_SESSION['login']."!");
                require_once('film.ctrl.php');
                filmCtrl::allFromUser($smarty);
            } else {
                $smarty->assign('errors', "Login et/ou mot de passe incorrect");
                $smarty->display('utilisateur/login.html.tpl');
            }
        }
        else {
            $smarty->assign('errors', "Veuillez remplir les 2 champs");
            $smarty->display('utilisateur/login.html.tpl');
        }
    }

    public static function showAll($smarty){
        $smarty->assign('users', utilisateur::showAll());
    }

    public static function find(){

    }

    public static function logout($smarty){
        $_SESSION['login'] = '';
        $_SESSION['id'] = '';
        $_SESSION['admin'] = '';

        session_destroy();
        require_once('film.ctrl.php');
        $smarty->assign('success', "A la prochaine");
        filmCtrl::all($smarty);
    }

    public static function grantAdmin($smarty){
        $values = [
            ':id' => empty($_POST['id']) ? null : $_POST['id'],
        ];

        (empty($values[':id'])) ? $errors = "Pas d'id transmit" : '';

        if(empty($errors)){
            $errors = utilisateur::grantAdmin($values);

            utilisateurCtrl::showAll($smarty);
            if(empty($errors)) {
                $smarty->assign('success', "L'utilisateur à reçut des droits administrateur");
                $smarty->display('utilisateur/index.html.tpl');
            }
            else{
                $smarty->assign('errors', $errors);
                $smarty->display('utilisateur/index.html.tpl');
            }

        }
        else {
            utilisateurCtrl::showAll($smarty);
            $smarty->assign('errors', "Pas d'id transmit");
            $smarty->display('utilisateur/index.html.tpl');
        }

    }

    public static function revokeAdmin($smarty){
        $values = [
            ':id' => empty($_POST['id']) ? null : $_POST['id'],
        ];

        (empty($values[':id'])) ? $errors = "Pas d'id transmit" : '';

        if(empty($errors)){
            $errors = utilisateur::revokeAdmin($values);

            utilisateurCtrl::showAll($smarty);
            if(empty($errors)) {
                $smarty->assign('success', "Les droits administrateur ont été retiré");
                $smarty->display('utilisateur/index.html.tpl');
            }
            else{
                $smarty->assign('errors', $errors);
                $smarty->display('utilisateur/index.html.tpl');
            }

        }
        else {
            utilisateurCtrl::showAll($smarty);
            $smarty->assign('errors', "Pas d'id transmit");
            $smarty->display('utilisateur/index.html.tpl');
        }

    }

    public static function updatePassword($smarty){
        $values = [
            ':id' => empty($_POST['id']) ? null : $_POST['id'],
            ':password' => empty($_POST['password']) ? null : md5($_POST['password'])
        ];

        (empty($values[':password'])) ? $errors = "Veuillez fournir un nouveau mot de passe" : '';

        utilisateurCtrl::showAll($smarty);
        if(empty($errors)){
            $errors = utilisateur::updatePassword($values);

            if(empty($errors)) {
                $smarty->assign('success', "Le mot de passe à été mis à jour");
                $smarty->display('utilisateur/index.html.tpl');
            }
            else{
                $smarty->assign('errors', $errors);
                $smarty->display('utilisateur/index.html.tpl');
            }

        }
        else {
            $smarty->assign('errors', "Veuillez fournir un nouveau mot de passe");
            $smarty->display('utilisateur/index.html.tpl');
        }

    }

}