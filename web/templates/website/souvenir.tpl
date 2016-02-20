{extends file="website/index.tpl"}
{block name=main_content}

<title>{$souvenir[0]['s_name']}</title>
<div class="row" style="width:100%">
    <div class="col-md-7">
        <img width="100%" src="{if (!empty($photo[0]))}{$photo[0]['src']}{/if}">
    {foreach from=$photo item=pics}
                <div style="display:flex" class="col-md-3"><img src="{if (!empty($pics))}{$pics['src']}{/if}"></div>
    {/foreach}
    </div>
    <div class="col-md-4">
        <h2>{$souvenir[0]['s_name']}</h2>
        <h4>{$souvenir[0]['c_name']}</h4>
        <h1>{$souvenir[0]['price']}AMD</h1>
        <div class="fb-like" data-href="#" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
        <h5>{$souvenir[0]['description']}</h5>
        <h5>Published on {$souvenir[0]['create_date']}</h5>
    </div>
</div>
{/block}