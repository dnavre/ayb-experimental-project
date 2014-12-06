<div>Menu</div>
{foreach from=$products item=product}
<div>
    <a href="{$product['url']}"></a>
    <img src="{$product['imgSrc']}" />
    <div>{$product['name']}</div>
    </a>
</div>
{/foreach}