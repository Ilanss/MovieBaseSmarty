<?php
/* Smarty version 3.1.32, created on 2018-06-06 21:33:25
  from 'D:\MAMP\htdocs\MovieBaseSmarty\views\film\index.html.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b18532563b958_64177964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fb1be5d34c103700804f0d44b387bb731dd5908' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\MovieBaseSmarty\\views\\film\\index.html.tpl',
      1 => 1528320801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/notice.tpl' => 1,
  ),
),false)) {
function content_5b18532563b958_64177964 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php $_smarty_tpl->_subTemplateRender('file:layouts/notice.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <!-- Modal -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo '<?php
            ';
if (!empty($_smarty_tpl->tpl_vars['films']->value)) {?>
                <div class="row">
                <div class="col-auto justify-content-end">
                    <form action="<?php echo $_SESSION['root'];?>
/film/create" method="post">
                        <button type="submit" class="btn btn-primary" name="add" id="add">Ajouter un film</button>
                    </form>
                </div>
            </div>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['films']->value, 'film');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['film']->value) {
?>
                    <div class="row">
                        <div class="col-md-12 film">
                            <div class="row">
                                <div class="col-md-3 image"><img class="img-fluid" src="
                                    <?php if (empty($_smarty_tpl->tpl_vars['film']->value->image)) {?>
                                        assets/img/poster-placeholder.png
                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['film']->value->image;?>

                                    <?php }?>
                                    "></div>
                                <div class="col-md-7">
                                    <h1 class="title"><?php echo $_smarty_tpl->tpl_vars['film']->value->title;?>
</h1>
                                    <p class="desc"><?php echo $_smarty_tpl->tpl_vars['film']->value->description;?>
</p>
                                </div>
                                <div class="col-md-2">
                                    <?php if (!empty($_SESSION['login'])) {?>
                                        <?php if ($_smarty_tpl->tpl_vars['film']->value->list) {?>
                                            <button type="submit" class="btn btn-outline-secondary pull-right disabled"
                                                    name="list"
                                                    id="submit">Déjà dans ma liste
                                            </button>
                                            <?php if ($_smarty_tpl->tpl_vars['film']->value->vu) {?>
                                                <button type="submit"
                                                        class="btn btn-outline-secondary pull-right disabled" name="vu"
                                                        id="submit">Déjà vu!
                                                </button>
                                            <?php } else { ?>
                                                <form action="<?php echo $_SESSION['root'];?>
/film/view" method="post">
                                                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['film']->value->id;?>
" name="vu">
                                                    <button type="submit" class="btn btn-outline-primary pull-right"
                                                            id="submit">Film visionné
                                                    </button>
                                                </form>
                                                <?php echo '<?php
                                            ';
}?>
                                        <?php } else { ?>
                                            <form action="<?php echo $_SESSION['root'];?>
/film/add" method="post">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['film']->value->id;?>
" name="id">
                                                <button type="submit" class="btn btn-outline-primary pull-right"
                                                        name="list"
                                                        id="submit">Ajouter à ma liste
                                                </button>
                                            </form>
                                        <?php }?>

                                        <?php if ($_SESSION['admin']) {?>
                                            <form action="<?php echo $_SESSION['root'];?>
/film/modify" method="post">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['film']->value->title;?>
" name="title">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['film']->value->image;?>
" name="image">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['film']->value->description;?>
"
                                                       name="description">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['film']->value->id;?>
" name="id">
                                                <button type="submit" class="btn btn-outline-warning" name="modify"
                                                        id="submit">
                                                    Modifier le film
                                                </button>
                                            </form>
                                            <button type="button" class="btn btn-outline-danger" name="delete"
                                                    id="submit" data-toggle="modal" data-target="#delete">
                                                Supprimer le film
                                            </button>
                                        <?php }?>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>

                <div class="row">
                    <div class="col text-center"><h1>Oups...</h1>Il n'y a pas de films à afficher...</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <form action="<?php echo $_SESSION['root'];?>
/film/create" method="post">
                            <button type="submit" class="btn btn-primary" name="add" id="add">Ajouter un film</button>
                        </form>
                    </div>
                </div>
            <?php }?>

        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    function validateFormOnSubmit(theForm) {
        alert("It works!");
    }
<?php echo '</script'; ?>
><?php }
}
