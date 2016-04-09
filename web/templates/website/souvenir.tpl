{extends file="website/index.tpl"}
{block name=main_content}
    <script>
        $(document).ready(function(){
            $(".thumbnail").click(function(e){
                var bg = $(e.target).css('background-image');
                bg = bg.replace('url("','').replace('")','');
                $("#main_image").attr('src', bg);
            });
        });
    </script>
{if isset($souvenir[0])}
    <title>{$souvenir[0]['name']}</title>
    <div class="row" style="width:100%">
        <div class="col-md-7">
            <div class = "main_pic">
                <img id="main_image" width="100%" onload="this.width/=1.5;this.onload=null;" src="{if (!empty($photo[0]))}{$photo[0]['src']}{/if}">
            </div>
            {foreach from=$photo item=pics}
                <div id="{$pics['id']}" style="display:flex; background-image:url({if (!empty($pics))}{$pics['src']}{/if})" class="col-md-3 thumbnail"></div>
            {/foreach}
        </div>
        <div class="col-md-4 souvenir_info">
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