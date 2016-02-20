{extends file="website/index.tpl"}
{block name="main_content"}
   <!-- <p>We are in Home page</p> -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Souvenir Shop</title>
    <!--<link rel="stylesheet" type="text/css"  href="../CSS/home.css"> -->
    <!-- jQuery library (served from Google) -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="../../js/slider/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->
    <link href="../../js/slider/jquery.bxslider.css" rel="stylesheet" />
</head>
<body>

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
            slideWidth: 1500,
        
            });

    });
</script>
<div class="latest-prodacts-container">
    <div class="latest-prodacts">
        <p>Latest products</p>
    </div>
    <div class="latest-prodacts-list">
    </div>
</div>
</body>
</html>

{/block}

