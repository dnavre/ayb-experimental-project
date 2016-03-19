{extends file="website/index.tpl"}
{block name="main_content"}
   <!-- <p>We are in Home page</p> -->

<script src="../../js/slider/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->
<link href="../../js/slider/jquery.bxslider.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="/js/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="/js/slick/slick-theme.css"/>


<div class="slider-container">
   <!-- <div class="left-opacity-block"></div>
    <div class="right-opacity-block"></div>
    <div class="opacity-block"></div> -->
    <div class="slider">
        <ul class="bxslider">
            <li><img src="../../images/slide.jpg" /></li>
            <li><img src="../../images/slide1.jpg" /></li>
            <li><img src="../../images/slide2.jpg" /></li>
            <li><img src="../../images/slide3.jpg" /></li>
            <li><img src="../../images/slide4.jpg" /></li>
            <li><img src="../../images/slide5.jpg" /></li>
            <li><img src="../../images/slide6.jpg" /></li>
        </ul>
        <div class="slider-info">
            <div class="title">
                AYB SOUVENIR SHOP
            </div>
            <div class="slider-text">
                "AYB" souvenir shop founded by "AYB" Alumni Club, which aims to promote "high" community enhancement and development.
            </div>
            <div class="slider-shop_button">
                <a href="/shop" {if $menu_item eq 'souvenir'}class = "menu_active"{/if} class="button">SHOP</a>
            </div>
        </div>
    </div>
</div>

<div class="latest-prodacts-container">
    <div class="latest-prodacts">
        <p>Latest products</p>
    </div>
     
    <div class="latest-prodacts-list" data-slick='{ldelim}"slidesToShow": 4, "slidesToScroll": 4 {rdelim}'>
        {foreach from=$latest key=id item=souvenir name=foo}
        <div class="product">
            <div class="product-image">
                <a href="/souvenir/{$souvenir.s_name}/{$souvenir.id}"><img src="{$souvenir.src}"></a>
            </div>
            <div class="text-price">
                <div class="product-name">
                     <a href="/souvenir/{$souvenir.s_name}/{$souvenir.id}">{$souvenir.s_name}</a>
                </div>
                <div class="product-price">
                     {$souvenir.price} amd
                </div>
            </div>
        </div>
        {/foreach}
    </div>
</div>


<div class="featured-prodacts-container">
    <div class="latest-prodacts">
        <p>Featured products</p>
    </div>

    <div class="featured-products-list" data-slick='{ldelim}"slidesToShow": 4, "slidesToScroll": 4 {rdelim}'>
    {foreach from=$featured key=id item=souvenir name=foo}
        <div class="product" >
            <div class="product-image">
                <a href="/souvenir/{$souvenir.s_name}/{$souvenir.id}"><img src="{$souvenir.src}"></a>
            </div>
            <div class="text-price">
                <div class="product-name">
                    <a href="/souvenir/{$souvenir.s_name}/{$souvenir.id}">{$souvenir.s_name}</a>
                </div>
                <div class="product-price">
                    {$souvenir.price} amd
                </div>
            </div>
        </div>
    {/foreach}
    </div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/js/slick/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $('.latest-prodacts-list').slick({
        autoPlay: true,
        slidesToShow:4,
        slidesToScroll: 1,
        arrows: true
      });
    });
  </script>

<script type="text/javascript">
    $(document).ready(function(){
      $('.featured-products-list').slick({
        autoPlay: true,
        slidesToShow:4,
        slidesToScroll: 1,
        arrows: true
      });
    });
  </script>

{/block}
