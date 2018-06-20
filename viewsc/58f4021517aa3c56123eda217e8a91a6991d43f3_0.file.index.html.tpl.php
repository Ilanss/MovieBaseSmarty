<?php
/* Smarty version 3.1.32, created on 2018-06-20 21:42:18
  from 'D:\MAMP\htdocs\MovieBaseSmarty\views\utilisateur\index.html.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2aca3a5ca463_58483616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58f4021517aa3c56123eda217e8a91a6991d43f3' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\MovieBaseSmarty\\views\\utilisateur\\index.html.tpl',
      1 => 1529530936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/nav.html.tpl' => 1,
    'file:layouts/notice.tpl' => 2,
    'file:layouts/footer.html.tpl' => 1,
  ),
),false)) {
function content_5b2aca3a5ca463_58483616 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layouts/nav.html.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ($_SESSION['admin']) {?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php $_smarty_tpl->_subTemplateRender('file:layouts/notice.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <div class="row">
                    <div class="col-auto justify-content-end head-btn">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/user/create" method="post">
                            <button type="submit" class="btn btn-primary" name="add" id="add">Ajouter un utilisateur</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Login</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
</td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['user']->value->admin) {?>Admin<?php }?></td>
                                        <td>
                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/user/action" method="post">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
" name="id">
                                                <div class="btn-group" role="group" aria-label="admin">
                                                    <button type="button" class="btn btn-outline-warning pull-right btn-sm clear"
                                                            name="updatepassword"
                                                            id="updatepassword" data-toggle="modal" data-target="#password-update">Changer le mot de passe
                                                    </button>
                                                    <?php if ($_smarty_tpl->tpl_vars['user']->value->admin) {?>
                                                        <button type="submit" class="btn btn-outline-warning pull-right btn-sm clear"
                                                                id="revokeadmin" name="revokeadmin">Révoquer les droits
                                                        </button>
                                                    <?php } else { ?>
                                                        <button type="submit" class="btn btn-outline-warning pull-right btn-sm clear"
                                                                id="giveadmin" name="grantadmin">Promouvoir admin
                                                        </button>
                                                    <?php }?>
                                                    <button type="submit" class="btn btn-outline-danger pull-right btn-sm clear"
                                                            id="delete" name="delete">Effacer l'utilisateur
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="password-update" tabindex="-1" role="dialog" aria-labelledby="password-update" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Nouveau mot de passe pour <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/user/action">
                                                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
" name="id">
                                                    <div class="modal-body">
                                                        <label for="password">Nouveau mot de passe:</label>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" name="updatepassword" id="updatepassword" class="btn btn-warning">Changer le mot de passe</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <?php $_smarty_tpl->_assignInScope('errors', "Vous devez être admin pour accéder à cette page!");?>
    <?php $_smarty_tpl->_subTemplateRender('file:layouts/notice.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
$_smarty_tpl->_subTemplateRender('file:layouts/footer.html.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
