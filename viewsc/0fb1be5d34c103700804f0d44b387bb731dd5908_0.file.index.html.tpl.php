<?php
/* Smarty version 3.1.32, created on 2018-06-21 15:14:02
  from 'D:\MAMP\htdocs\MovieBaseSmarty\views\film\index.html.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2bc0ba6ed218_49962964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fb1be5d34c103700804f0d44b387bb731dd5908' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\MovieBaseSmarty\\views\\film\\index.html.tpl',
      1 => 1529594037,
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
function content_5b2bc0ba6ed218_49962964 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layouts/nav.html.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php $_smarty_tpl->_subTemplateRender('file:layouts/notice.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php if (!empty($_smarty_tpl->tpl_vars['films']->value)) {?>
                <div class="row">
                    <div class="col-auto justify-content-end head-btn">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/film/create" method="post">
                            <button type="submit" class="btn btn-primary" name="add" id="add">Ajouter un film</button>
                        </form>
                    </div>
                    <?php if (!empty($_SESSION['login'])) {?>
                    <div class="col-auto justify-content-end head-btn">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/user/me" method="post">
                            <button type="submit" class="btn btn-primary" name="add" id="add">Mes infos</button>
                        </form>
                    </div>
                    <?php }?>
                    <div class="col-auto justify-content-end ml-auto head-btn">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary"><i class="fas fa-th"></i></button>
                            <button type="button" class="btn btn-outline-disable"><i class="fas fa-th-list"></i></button>
                        </div>
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
                                <div class="col-md-3 image"><img class="img-fluid" src="<?php if (empty($_smarty_tpl->tpl_vars['film']->value->image)) {
echo $_smarty_tpl->tpl_vars['base']->value;?>
/assets/img/poster-placeholder.png<?php } else {
echo $_smarty_tpl->tpl_vars['base']->value;
echo $_smarty_tpl->tpl_vars['film']->value->image;
}?>"></div>
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
                                                <form action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/film/view" method="post">
                                                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['film']->value->id;?>
" name="vu">
                                                    <button type="submit" class="btn btn-outline-primary pull-right"
                                                            id="submit">Film visionné
                                                    </button>
                                                </form>
                                            <?php }?>
                                        <?php } else { ?>
                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
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
                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
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
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Supprimer <?php echo $_smarty_tpl->tpl_vars['film']->value->title;?>
</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Êtes-vous sûre de vouloir supprimer ce film?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/film/delete" method="post">
                                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['film']->value->id;?>
" name="id">
                                                                <button type="submit" class="btn btn-danger">Oui supprimer!</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>                    </div>
                </div>
            <?php } else { ?>

                <div class="row">
                    <div class="col text-center"><h1>Oups...</h1>Il n'y a pas de films à afficher...</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/film/create" method="post">
                            <button type="submit" class="btn btn-primary head" name="add" id="add">Ajouter un film</button>
                        </form>
                    </div>
                </div>
            <?php }?>

        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:layouts/footer.html.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
