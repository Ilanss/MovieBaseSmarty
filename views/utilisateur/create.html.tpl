{include file='layouts/nav.html.tpl'}
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form method="post" action="{$base}/user/create">
                <fieldset>
                    {include file='layouts/notice.tpl'}
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
                            <div><a href="{$base}/user/login"><small>Vous avez déjà un compte? Connectez-vous!</small></a></div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
{include file='layouts/footer.html.tpl'}