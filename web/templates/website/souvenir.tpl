{extends file="website/index.tpl"}
{block name=main_content}

{if isset($souvenir[0])}
    <title>{$souvenir[0]['name']}</title>
    <div class="row" style="width:100%">
        <div class="col-md-7">
            <img width="100%" src="{if (!empty($photo[0]))}{$photo[0]['src']}{/if}">
            {foreach from=$photo item=pics}
                <div style="display:flex; background-image:url({if (!empty($pics))}{$pics['src']}{/if})" class="col-md-3 pic_list"></div>
            {/foreach}
            {*{$photo|var_dump}*}
        </div>
        <div class="col-md-4">
            <h2>{$souvenir[0]['s_name']}</h2>
            <h4>{$souvenir[0]['c_name']}</h4>
            <h1>{$souvenir[0]['price']} AMD</h1>
            <div class="fb-like" data-href="#" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
            <h5>{$souvenir[0]['description']}</h5>
            <h5>Published on {$souvenir[0]['create_date']}</h5>
        </div>
    </div>
{/if}
{/block}