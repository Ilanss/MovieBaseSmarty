<?php
/* Smarty version 3.1.32, created on 2018-06-20 13:53:43
  from 'D:\MAMP\htdocs\MovieBaseSmarty\views\home.html.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2a5c67c779f7_77167341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26de444100e6de7ef753503d26d60d763073a7ad' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\MovieBaseSmarty\\views\\home.html.tpl',
      1 => 1529502574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/nav.html.tpl' => 1,
    'file:layouts/notice.tpl' => 1,
    'file:layouts/footer.html.tpl' => 1,
  ),
),false)) {
function content_5b2a5c67c779f7_77167341 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layouts/nav.html.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php $_smarty_tpl->_subTemplateRender('file:layouts/notice.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:layouts/footer.html.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
