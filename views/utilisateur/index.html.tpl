{include file='layouts/nav.html.tpl'}
{if $smarty.session.admin}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {include file='layouts/notice.tpl'}
                <div class="row">
                    <div class="col-auto justify-content-end head-btn">
                        <form action="{$base}/user/create" method="post">
                            <button type="submit" class="btn btn-primary" name="add" id="add">Ajouter un utilisateur</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Login</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                {foreach $users as $user}
                                    <tr>
                                        <td>{$user->login}</td>
                                        <td>{$user->email}</td>
                                        <td>{if $user->admin}Admin{/if}</td>
                                        <td>
                                            <form action="{$base}/user/action" method="post">
                                                <input type="hidden" value="{$user->id}" name="id">
                                                <div class="btn-group" role="group" aria-label="admin">
                                                    <button type="button" class="btn btn-outline-warning pull-right btn-sm clear"
                                                            name="updatepassword"
                                                            id="updatepassword" data-toggle="modal" data-target="#password-update">Changer le mot de passe
                                                    </button>
                                                    {if $user->admin}
                                                        <button type="submit" class="btn btn-outline-warning pull-right btn-sm clear"
                                                                id="revokeadmin" name="revokeadmin">Révoquer les droits
                                                        </button>
                                                    {else}
                                                        <button type="submit" class="btn btn-outline-warning pull-right btn-sm clear"
                                                                id="giveadmin" name="grantadmin">Promouvoir admin
                                                        </button>
                                                    {/if}
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Nouveau mot de passe pour {$user->login}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="{$base}/user/action">
                                                    <input type="hidden" value="{$user->id}" name="id">
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
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
{else}
    {assign "errors" "Vous devez être admin pour accéder à cette page!"}
    {include file='layouts/notice.tpl'}
{/if}
{include file='layouts/footer.html.tpl'}