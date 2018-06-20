<?php
/* Smarty version 3.1.32, created on 2018-06-20 21:23:24
  from 'D:\MAMP\htdocs\MovieBaseSmarty\views\layouts\nav.html.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2ac5cc6d51f7_24308496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0713f1a1eddff3509358fe0f96439435f792f7a' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\MovieBaseSmarty\\views\\layouts\\nav.html.tpl',
      1 => 1529529801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2ac5cc6d51f7_24308496 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"><?php echo '</script'; ?>
>    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/assets/css/style.css">
    <title>My Movie Base</title>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="#">My Movie Base</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/film">Films <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/mybase">My Base</a>
                </li>
                <?php if (!empty($_SESSION['login'])) {?>
                    <?php if ($_SESSION['admin']) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/user">Users</a>
                        </li>
                    <?php }?>
                <?php }?>
                <li class="nav-item">
                    <?php if (!empty($_SESSION['login'])) {?>
                        <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/user/logout">Logout</a>

                    <?php } else { ?>
                        <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/user/login">Login</a>
                    <?php }?>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/film/search">
                <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>
">
                <input class="form-control mr-sm-2" type="search" placeholder="Film" name="search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>

    <div id="wrapper">
<?php }
}
