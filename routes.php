<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:46
 */

/* --- Récupération de l'URL --- */
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$request_uri = str_replace($base, '', $request_uri);

/* --- Switch case sur l'URL --- */
switch ($request_uri[0]) {
    /* --- Homepage --- */
    case '/':
        require_once ('controllers/film.ctrl.php');
        filmCtrl::all($smarty);
        break;

    /* --- Cas concernant les films --- */
    case '/film':
        require_once ('controllers/film.ctrl.php');
        filmCtrl::all($smarty);
        break;

    case '/film/create':
        if(isset($_POST['submit'])){
            require_once ('controllers/film.ctrl.php');
            filmCtrl::create($smarty);
        }
        elseif(isset($_POST['modify'])){
            require_once ('controllers/film.ctrl.php');
            filmCtrl::modify($smarty);
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
        filmCtrl::add($smarty);
        break;

    case '/film/view':
        require_once ('controllers/film.ctrl.php');
        filmCtrl::view($smarty);
        break;

    case '/film/delete':
        require_once ('controllers/film.ctrl.php');
        filmCtrl::delete($smarty);
        break;

    case '/film/search':
        require_once ('controllers/film.ctrl.php');
        filmCtrl::search($smarty);
        break;

    /* --- Cas concernant les utilisateurs --- */
    case '/user/create':
        if(isset($_POST['submit'])){
            require_once ('controllers/utilisateur.ctrl.php');
            utilisateurCtrl::create($smarty);
        }
        else{
            $smarty->display('utilisateur/create.html.tpl');
        }
        break;

    case '/user/login':
        if(isset($_SESSION['login'])){
            require_once ('controllers/film.ctrl.php');
            filmCtrl::allFromUser($smarty);
        }
        else {
            if (isset($_POST['submit'])) {
                require_once('controllers/utilisateur.ctrl.php');
                utilisateurCtrl::login($smarty);
            } else {
                $smarty->display('utilisateur/login.html.tpl');
            }
        }
        break;

    case '/user/logout':
        require_once ('controllers/utilisateur.ctrl.php');
        utilisateurCtrl::logout($smarty);
        break;

    case '/mybase':
        if(isset($_SESSION['id'])){
            require_once ('controllers/film.ctrl.php');
            filmCtrl::allFromUser($smarty);
        }
        else {
            $smarty->assign('errors', "Vous devez être connecté pour voir vos films");
            $smarty->display('utilisateur/login.html.tpl');
        }
        break;

    case '/user':
        require_once ('controllers/utilisateur.ctrl.php');
        utilisateurCtrl::showAll($smarty);
        $smarty->display('utilisateur/index.html.tpl');
        break;

    case '/user/me':
        if(isset($_SESSION['id'])) {
            require_once('controllers/utilisateur.ctrl.php');
            utilisateurCtrl::option($smarty);
        }
        else {
            $smarty->assign('errors', "Vous devez être connecté pour voir vos infos");
            $smarty->display('utilisateur/login.html.tpl');
        }
        break;

    case '/user/action':
        require_once ('controllers/utilisateur.ctrl.php');
        if(isset($_POST['updatepassword'])) {
            utilisateurCtrl::updatePassword($smarty);
        }
        elseif(isset($_POST['delete'])) {
            utilisateurCtrl::delete($smarty);
        }
        elseif(isset($_POST['grantadmin'])) {
            utilisateurCtrl::grantAdmin($smarty);
        }
        elseif(isset($_POST['revokeadmin'])) {
            utilisateurCtrl::revokeAdmin($smarty);
        }
        else {
            utilisateurCtrl::showAll($smarty);
            $smarty->display('utilisateur/index.html.tpl');
        }
        break;

    /* --- Affichage de la page 404 --- */
    default:
        $smarty->display('404.tpl');
        break;
}