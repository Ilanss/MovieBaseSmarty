<?php
/* Smarty version 3.1.32, created on 2018-06-20 22:39:48
  from 'D:\MAMP\htdocs\MovieBaseSmarty\views\utilisateur\create.html.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2ad7b443d0d4_70442969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '480d1494b082ac158d98cfa5512228eaf557083d' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\MovieBaseSmarty\\views\\utilisateur\\create.html.tpl',
      1 => 1529534386,
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
function content_5b2ad7b443d0d4_70442969 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layouts/nav.html.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/user/create">
                <fieldset>
                    <?php $_smarty_tpl->_subTemplateRender('file:layouts/notice.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Entrer votre login" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="exemple@mail.com">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Créer un compte</button>
                        </div>
                        <div class="col-auto">
                            <div><a href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/user/login"><small>Vous avez déjà un compte? Connectez-vous!</small></a></div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:layouts/footer.html.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
