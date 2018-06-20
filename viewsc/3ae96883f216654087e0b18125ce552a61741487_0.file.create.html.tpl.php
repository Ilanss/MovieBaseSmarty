<?php
/* Smarty version 3.1.32, created on 2018-06-20 18:29:40
  from 'D:\MAMP\htdocs\MovieBaseSmarty\views\film\create.html.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2a9d14a01c26_43618645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ae96883f216654087e0b18125ce552a61741487' => 
    array (
      0 => 'D:\\MAMP\\htdocs\\MovieBaseSmarty\\views\\film\\create.html.tpl',
      1 => 1529502582,
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
function content_5b2a9d14a01c26_43618645 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layouts/nav.html.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/film/create" enctype="multipart/form-data">
                <?php $_smarty_tpl->_subTemplateRender('file:layouts/notice.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <div class="form-group">
                    <label for="title">Nom du film</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Entrer le nom du film" value="<?php if (isset($_POST['title'])) {
echo $_POST['title'];
}?>">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" accept=".png, .jpg, .jpeg" >
                    <label class="custom-file-label" for="image">Choisir une image...</label>
                    <div class="invalid-feedback">Fichier invalide</div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?php if (isset($_POST['description'])) {
echo $_POST['description'];
}?></textarea>
                </div>
                <?php if (isset($_POST['id'])) {?>
                    <input type="hidden" value="<?php echo $_POST['id'];?>
" name="id">
                    <button type="submit" id="submit" name="modify" class="btn btn-warning">Modifier le film </button>
                <?php } else { ?>
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Ajouter le film </button>
                <?php }?>
            </form>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:layouts/footer.html.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
