<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="post" action="<?php echo $base ?>/film/create" enctype="multipart/form-data">
                {include file="/layouts/notice.tpl"}
                <div class="form-group">
                    <label for="title">Nom du film</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Entrer le nom du film" value="{if isset($smarty.post.title}{$smarty.post.title}{/if}">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" accept=".png, .jpg, .jpeg" >
                    <label class="custom-file-label" for="image">Choisir une image...</label>
                    <div class="invalid-feedback">Fichier invalide</div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{if isset($smarty.post.description}{$smarty.post.description}{/if}</textarea>
                </div>
                {if isset($smarty.post.id)}
                    <input type="hidden" value="<?php echo $_POST['id'];?>" name="id">
                    <button type="submit" id="submit" name="modify" class="btn btn-warning">Modifier le film </button>
                {/if}
                {else}
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Ajouter le film </button>
                {/else}
            </form>
        </div>
    </div>
</div>