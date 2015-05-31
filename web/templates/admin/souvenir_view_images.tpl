<head>
    <link rel="stylesheet" type="text/css" href="{$ROOT}/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{$ROOT}/css/admin/view_images.css"/>
    <script src="{$ROOT}/js/bootstrap.js"></script>
</head>
{include file='admin/error.tpl'}
{if $id neq 0}
<form class="form-horizontal" id="souvenir_images" method="post" action="souvenir_save_images" enctype="multipart/form-data">
    <input type="hidden" name="souvenir_id" value="{$souvenir_info['id']}">
    {foreach $souvenir_images as $image }
        <div{if $souvenir_info['main_photo_id'] neq $image['id']} class="secondary_image"{/if}>
            <img src="{$ROOT}{$image['src']}" {if $souvenir_info['main_photo_id'] neq $image['id']} class="view_image" {else} class="main_image" {/if}/>
            {if $souvenir_info['main_photo_id'] neq $image['id'] }
                <ul class="photo_actions">
                    <li>
                        <a href="souvenir_make_main_image?id={$image['id']}&souvenir_id={$souvenir_info['id']}">
                            <img src="{$ROOT}/images/admin/up-icon.png">Make Main Image
                        </a>
                    </li>
                    <li>
                        <a class="delete_image" href="souvenir_delete_image?id={$image['id']}&souvenir_id={$souvenir_info['id']}">
                            <img src="{$ROOT}/images/admin/delete-icon.png">Delete Image
                        </a>
                    </li>
                </ul>
            {/if}
        </div>
    {/foreach}
    <div style="clear: both; margin-top: 100px;"></div>
    <div class="form-group">
        <div id="filediv"><input class="file" name="file" type="file" id="file"/></div>
    </div>
    <div class="form-group" id="submit_image">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success" name="submit">Save Image</button>
        </div>
    </div>
{else}
    <div class="alert alert-warning" role="alert">
        Please save souvenir first!!!
    </div>
{/if}
</form>