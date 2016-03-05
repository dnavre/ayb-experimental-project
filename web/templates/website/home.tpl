{extends file="website/index.tpl"}
{block name="main_content"}
   <!-- <p>We are in Home page</p> -->

<script src="../../js/slider/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->
    <link href="../../js/slider/jquery.bxslider.css" rel="stylesheet" />

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
                <a href="#" class="button">SHOP</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            auto: true,
            autoControls: true,
            moveSlides: 1,
            slideWidth: 1024,
            responsive: true,
            controls: false
            });

    });
</script>
<div class="latest-prodacts-container">
    <div class="latest-prodacts">
        <p>Latest products</p>
    </div>
     
    <div class="latest-prodacts-list">
        <div class="product">
            <div class="product-image">
                <img src="../../images/mmm.png">
            </div>
            <div class="text-price">
                <div class="product-name">
                    Ayb school copybook
                </div>
                <div class="product-price">
                    36000 amd
                </div>
            </div>
        </div>
  
        <div class="product">
            <div class="product-image">
                 <img src="../../images/ll.png">
            </div>
            <div class="text-price">
                <div class="product-name">
                    Ayb school copybook
                </div>
                <div class="product-price">
                    1600 amd
                </div>
            </div>
        </div>
        <div class="product">
            <div class="product-image">
                 <img src="../../images/oiu.png">
            </div>
            <div class="text-price">
                <div class="product-name">
                    Ayb school copybook
                </div>
                <div class="product-price">
                    36000 amd
                </div>
            </div>
        </div>
        <div class="product">
            <div class="product-image">
                 <img src="../../images/mpp.png">
            </div>
            <div class="text-price">
                <div class="product-name">
                    Ayb school copybook
                </div>
                <div class="product-price">
                    3600 amd
                </div>
            </div>
        </div>
    </div>
</div>


<div class="featured-prodacts-container">
    <div class="latest-prodacts">
        <p>Featured products</p>
    </div>

    <div class="featured-prodacts-list">
    {foreach from=$featured key=id item=souvenir name=foo}

        <div class="product">
            <div class="product-image">
                <a href="/souvenir?id={$souvenir.id}"><img src="{$souvenir.path}"></a>
            </div>
            <div class="text-price">
                <div class="product-name">
                    {$souvenir.s_name}
                </div>
                <div class="product-price">
                    {$souvenir.price} amd
                </div>
            </div>
        </div>
    {/foreach}
    </div>
</div>


{/block}

