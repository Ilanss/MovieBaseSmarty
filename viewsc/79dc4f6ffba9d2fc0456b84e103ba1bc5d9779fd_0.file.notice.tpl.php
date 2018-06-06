<?php
/* Smarty version 3.1.32, created on 2018-06-06 21:19:41
  from 'D:\MAMP\htdocs\MovieBaseSmarty\views\layouts\notice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b184fed381d08_79670048',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79dc4f6ffba9d2fc0456b84e103ba1bc5d9779fd' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\MovieBaseSmarty\\views\\layouts\\notice.tpl',
      1 => 1528319978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b184fed381d08_79670048 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_smarty_tpl->tpl_vars['errors']->value;?>

    </div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['notice']->value)) {?>
    <div class="alert alert-primary" role="alert">
        <?php echo $_smarty_tpl->tpl_vars['notice']->value;?>

    </div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['warning']->value)) {?>
    <div class="alert alert-warning" role="alert">
        <?php echo $_smarty_tpl->tpl_vars['warning']->value;?>

    </div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="alert alert-success" role="alert">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
<?php }
}
}
