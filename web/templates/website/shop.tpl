{extends file="website/index.tpl"}
{block name=main_content}

<link rel="stylesheet" type="text/css" href="/js/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="/js/slick/slick-theme.css"/>


    <div id="shop_main_block" class="row">
        <div id="shop_menu" class="col-md-2">
            <ul class="nav nav-pills nav-stacked shop_menu_style" id="categories">
                    <li {if $active_category eq 'all'}class="item_active" {else} class= "shop_menu_item" {/if}> <a class="shop_menu_item_style" href="/shop">All Souvenirs</a></li>
                {foreach $categories as $category name=categoryForeach}
                    <li  class="{if $active_category eq $category.id}item_active {else} shop_menu_item {/if}"> <a class="shop_menu_item_style" href="/shop/{$category.name}/{$category.id}">{$category.name}</a></li>
                {/foreach}
            </ul>
        </div>
        <div id="souvenirs" class="col-md-10">
            <ul>
                {foreach from=$souvenirs key=id item=souvenir name=foo}
                    <li class="souvenir" >
                        <a href="/souvenir?id={$souvenir.id}">
                        <div class="souvenir_pic" style="background-image:url({$souvenir.photo_src})">
                        <div class="souvenir_info">
                            <span class="name">{$souvenir.name}</span>
                            <span class="price">{$souvenir.price}AMD</span>
                        </div>
                        </div>
                        </a>
                    </li>
                {/foreach}
            </ul>
            {if $page neq 1}
            <nav>
                <ul class="pagination" id="pagination">

                        {if $cur_page neq 1}
                    <li>
                        <a href="?page={$cur_page-1}" aria-label="Next">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    {/if}
                    {for $page_num=1 to $page}
                        <li><a {if $page_num eq $cur_page} class="pagination_active"{/if} href="?page={$page_num}">{$page_num}</a></li>
                    {/for}
                   {if $cur_page neq $page}
                    <li>
                        <a href="?page={$cur_page+1}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    {/if}
                </ul>
            </nav>
            {/if}
        </div>
    </div>

    <div id="more_souvenirs" class="row">
        <div  class="col-md-6">
            <div id="featured_souvenirs">
            <div class="section-header"> <h4>Featured Souvenirs</h4> </div>
                
                    <ul  class="souvenir_sm_list featured-products-karusel" data-slick='{ldelim}"slidesToShow": 3, "slidesToScroll": 3 {rdelim}'>
                        {foreach from=$feat_souvenirs key=id item=souvenir name=foo}
                                <li class="souvenir_sm">
                                    <a href="/souvenir?id={$souvenir.id}">
                                        <div class="souvenir_pic_sm" style="background-image:url({$souvenir.photo_src})">
                                            <div class="souvenir_info">
                                                <span class="name_sm">{$souvenir.name}</span>
                                                <span class="price_sm">{$souvenir.price}AMD</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                        {/foreach}
                    </ul>
                
            </div>
        </div>
        <div  class="col-md-6">
            <div id="new_souvenirs">
                <div class="section-header"> <h4>New Souvenirs</h4> </div>
                <ul class="souvenir_sm_list new-products-karusel" data-slick='{ldelim}"slidesToShow": 3, "slidesToScroll": 3 {rdelim}'>
                    {foreach from=$new_souvenirs key=id item=souvenir name=foo}
                        <li class="souvenir_sm">
                            <a href="/souvenir?id={$souvenir.id}">
                                <div class="souvenir_pic_sm" style="background-image:url({$souvenir.photo_src})">
                                    <div class="souvenir_info">
                                        <span class="name_sm">{$souvenir.name}</span>
                                        <span class="price_sm">{$souvenir.price}AMD</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    {/foreach}
                </ul>
            </div>
        </div>
    </div>


<script type="text/javascript" src="/js/slick/slick.min.js"></script>




<script type="text/javascript">
    $(document).ready(function(){

    $('.new-products-karusel').slick({
        autoPlay: true,
        slidesToShow:3,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
    });

    $('.featured-products-karusel').slick({
        autoPlay: true,
        slidesToShow:3,
        slidesToScroll: 1,
        autoplaySpeed: 2000,

    }); 

       
    
    });
  </script>

{/block}