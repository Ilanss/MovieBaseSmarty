{if($_SESSION['admin'])}
{else}
    {assign "errors" "Vous devez être admin pour accéder à cette page!"}
    {include file='views/layouts/notice.php'}
{/if}