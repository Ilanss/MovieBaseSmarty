{if(isset($errors))}
    <div class="alert alert-danger" role="alert">
        {$errors}
    </div>
{/if}

{if(isset($notice))}
    <div class="alert alert-primary" role="alert">
        {$notice}
    </div>
{/if}

{if(isset($warning))}
    <div class="alert alert-warning" role="alert">
        {$warning}
    </div>
{/if}

{if(isset($success))}
    <div class="alert alert-success" role="alert">
        {$success}
    </div>
{/if}