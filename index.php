<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:46
 */


/* --- Charge la configuration utilisateur --- */
require_once ('database.php');
require('Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('views/');
$smarty->setCompileDir('viewsc/');

session_start();
$base = require_once('config.php');
$smarty->assign('base', $base['SITE_ROOT']);
$_SESSION['root'] = $base['SITE_ROOT'];
// Sauvegarde de la connexion à la BD pour la réutiliser à d'autres endroits de l'application

/* --- Chargement des routes --- */
require_once('routes.php');
