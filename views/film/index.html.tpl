{include file='layouts/nav.html.tpl'}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {include file='layouts/notice.tpl'}
            {if !empty($films)}
                <div class="row">
                    <div class="col-auto justify-content-end head-btn">
                        <form action="{$base}/film/create" method="post">
                            <button type="submit" class="btn btn-primary" name="add" id="add">Ajouter un film</button>
                        </form>
                    </div>
                    {if !empty($smarty.session.login)}
                    <div class="col-auto justify-content-end head-btn">
                        <form action="{$base}/user/me" method="post">
                            <button type="submit" class="btn btn-primary" name="add" id="add">Mes infos</button>
                        </form>
                    </div>
                    {/if}
                </div>
                {foreach $films as $film}
                    <div class="row">
                        <div class="col-md-12 film">
                            <div class="row">
                                <div class="col-md-3 image"><img class="img-fluid" src="{if empty($film->image)}{$base}/assets/img/poster-placeholder.png{else}{$base}{$film->image}{/if}"></div>
                                <div class="col-md-7">
                                    <h1 class="title">{$film->title}</h1>
                                    <p class="desc">{$film->description}</p>
                                </div>
                                <div class="col-md-2">
                                    {if !empty($smarty.session.login)}
                                        {if $film->list}
                                            <button type="submit" class="btn btn-outline-secondary pull-right disabled"
                                                    name="list"
                                                    id="submit">Déjà dans ma liste
                                            </button>
                                            {if $film->vu}
                                                <button type="submit"
                                                        class="btn btn-outline-secondary pull-right disabled" name="vu"
                                                        id="submit">Déjà vu!
                                                </button>
                                            {else}
                                                <form action="{$base}/film/view" method="post">
                                                    <input type="hidden" value="{$film->id}" name="vu">
                                                    <button type="submit" class="btn btn-outline-primary pull-right"
                                                            id="submit">Film visionné
                                                    </button>
                                                </form>
                                            {/if}
                                        {else}
                                            <form action="{$base}/film/add" method="post">
                                                <input type="hidden" value="{$film->id}" name="id">
                                                <button type="submit" class="btn btn-outline-primary pull-right"
                                                        name="list"
                                                        id="submit">Ajouter à ma liste
                                                </button>
                                            </form>
                                        {/if}

                                        {if $smarty.session.admin}
                                            <form action="{$base}/film/modify" method="post">
                                                <input type="hidden" value="{$film->title}" name="title">
                                                <input type="hidden" value="{$film->image}" name="image">
                                                <input type="hidden" value="{$film->description}"
                                                       name="description">
                                                <input type="hidden" value="{$film->id}" name="id">
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Supprimer {$film->title}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Êtes-vous sûre de vouloir supprimer ce film?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                                            <form action="{$base}/film/delete" method="post">
                                                                <input type="hidden" value="{$film->id}" name="id">
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
                                        {/if}
                                    {/if}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                {/foreach}
            {else}

                <div class="row">
                    <div class="col text-center"><h1>Oups...</h1>Il n'y a pas de films à afficher...</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <form action="{$base}/film/create" method="post">
                            <button type="submit" class="btn btn-primary" name="add" id="add">Ajouter un film</button>
                        </form>
                    </div>
                </div>
            {/if}

        </div>
    </div>
</div>
{include file='layouts/footer.html.tpl'}