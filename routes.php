<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:46
 */

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$request_uri = str_replace($base, '', $request_uri);

// Route it up!
switch ($request_uri[0]) {
    // Home page
    case '/':
        require_once ('controllers/film.ctrl.php');
        filmCtrl::all();
        break;
    // Everything else

    case '/film':
        require_once ('controllers/film.ctrl.php');
        filmCtrl::all();
        break;

    case '/film/create':
        if(isset($_POST['submit'])){
            require_once ('controllers/film.ctrl.php');
            filmCtrl::create();
        }
        elseif(isset($_POST['modify'])){
            require_once ('controllers/film.ctrl.php');
            filmCtrl::modify();
        }
        else {
            $smarty->display('film/create.html.tpl');
        }
        break;

    case '/film/modify':
        $smarty->display('film/create.html.tpl');
        break;

    case '/film/add':
        require_once ('controllers/film.ctrl.php');
        filmCtrl::add();
        break;

    case '/film/view':
        require_once ('controllers/film.ctrl.php');
        filmCtrl::view();
        break;

    case '/user/create':
        if(isset($_POST['submit'])){
            require_once ('controllers/utilisateur.ctrl.php');
            utilisateurCtrl::create();
        }
        else{
            $smarty->display('utilisateur/create.html.tpl');
        }
        break;

    case '/user/login':
        if(isset($_POST['submit'])){
            require_once ('controllers/utilisateur.ctrl.php');
            utilisateurCtrl::login();
        }
        else {
            $smarty->display('utilisateur/login.html.tpl');
        }
        break;

    case '/user/logout':
        require_once ('controllers/utilisateur.ctrl.php');
        utilisateurCtrl::logout();
        break;

    case '/mybase':
        if(isset($_SESSION['id'])){
            require_once ('controllers/film.ctrl.php');
            filmCtrl::allFromUser();
        }
        else {
            $notice = "Vous devez être connecté pour voir vos films";
            $smarty->display('utilisateur/login.html.tpl');
        }
        break;

    case '/user':
        $smarty->display('utilisateur/index.html.tpl');
        break;

    default:
        $smarty->display('404.tpl');
        break;
}