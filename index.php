<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:46
 */

/* --- Charge le fichier de connexion à la base de données --- */
require_once ('database.php');

/* --- Démarre une session --- */
session_start();

/* --- Charge la configuration utilisateur --- */
$base = require_once('config.php');

/* --- Stock la racine du site dans la session pour un accès facile avec Smarty --- */
$_SESSION['root'] = $base['SITE_ROOT'];

/* --- Charge la librairie Smarty --- */
require($base['SMARTY']."/Smarty.class.php");

/* --- Instancie un objet Smarty --- */
$smarty = new Smarty();

/* --- Configuration de Smarty --- */
$smarty->setTemplateDir('views/');
$smarty->setCompileDir('viewsc/');
$smarty->assign('base', $base['SITE_ROOT']);

/* --- Chargement des routes --- */
require_once('routes.php');
