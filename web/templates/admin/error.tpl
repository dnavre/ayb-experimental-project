{extends file="admin/{$error_place}.tpl"}
{block name=error}
    <div class="alert alert-danger" role="alert">{$error_body}</div>
{/block}