<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:47
 */

require_once ('models/utilisateur.model.php');

class utilisateurCtrl {

    public static function create(){
        $values = [
            ':login' => empty($_POST['login']) ? null : $_POST['login'],
            ':password' => empty($_POST['password']) ? null : md5($_POST['password']),
            ':email' => empty($_POST['email']) ? null : $_POST['email']
        ];

        (empty($values[':login']) OR empty($values[':password'])) ? $errors = "Veuillez remplir les 2 champs" : '';

        if(empty($errors)) {
            $errors = utilisateur::create($values);

            if (empty($errors)) {
                $smarty->display('utilisateur/login.html.tpl');
            } else {
                $smarty->display('utilisateur/create.html.tpl');
            }
        }
        else {
            $smarty->display('utilisateur/login.html.tpl');
        }
    }

    public static function delete(){

    }

    public static function login(){
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
                $smarty->display('home.html.tpl');
                $smarty->clear_assign('success');
            } else {
                $smarty->display('utilisateur/login.html.tpl');
            }
        }
        else {
            $smarty->display('utilisateur/login.html.tpl');
        }
    }

    public static function all(){

    }

    public static function find(){

    }

    public static function logout(){
        $_SESSION['login'] = '';
        $_SESSION['id'] = '';
        $_SESSION['admin'] = '';

        session_destroy();
        $smarty->display('home.html.tpl');
    }

}