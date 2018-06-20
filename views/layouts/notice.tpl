{if isset($errors)}
    <div class="alert alert-danger notice" role="alert">
        {$errors}
    </div>
{/if}

{if isset($notice)}
    <div class="alert alert-primary notice" role="alert">
        {$notice}
    </div>
{/if}

{if isset($warning)}
    <div class="alert alert-warning notice" role="alert">
        {$warning}
    </div>
{/if}

{if isset($success)}
    <div class="alert alert-success notice" role="alert">
        {$success}
    </div>
{/if}