<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form method="post" action="{$base}/user/login">
                <fieldset>
                    {include file='/layouts/notice.php'}
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Entrer votre login">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div><a href="{$base}/user/create"><small>Vous n'avez pas de compte? Créez un compte!</small></a></div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Login</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>