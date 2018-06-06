<?php
/* Smarty version 3.1.32, created on 2018-06-06 14:26:55
  from '/Users/ilans/Documents/htdocs/MovieBaseSmarty/views/layouts/nav.html.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b17ef2fce6778_88992450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5225c7ead9e2f8d55e3cb12ac9399b1d3813b90' => 
    array (
      0 => '/Users/ilans/Documents/htdocs/MovieBaseSmarty/views/layouts/nav.html.tpl',
      1 => 1528295210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b17ef2fce6778_88992450 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
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
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div id="wrapper">
<?php }
}
