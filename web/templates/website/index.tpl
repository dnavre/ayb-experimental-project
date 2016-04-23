<html>
<head>
    <title>{$_title}</title>
      <meta charset="UTF-8">
    <!--<link rel="stylesheet" type="text/css"  href="../CSS/home.css"> -->
    <!-- jQuery library (served from Google) -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- bxSlider Javascript file -->

    
    <link rel="stylesheet" type="text/css" href="/css/website/main.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href='{$css_link}'/>
    <link rel="icon" href="favicon.ico" type="favicon.ico"/>
    <link rel="shortcut icon" href="favicon.ico" type="favicon.ico"/>
    <script src="/js/bootstrap.js"></script>
   <!-- <script>
        (function(i,s,o,g,r,a,m){
        i['GoogleAnalyticsObject']=r;
        i[r]=i[r]||function(){
        i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();
        a=s.createElement(o), m=s.getElementsByTagName(o)[0];
        a.async=1;
        a.src=g;
        m.parentNode.insertBefore(a,m)
        })
        (window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-59986673-1', 'auto');
        ga('send', 'pageview');

    </script> -->

</head>
<body>
  <div class="header-container">
    <div class="header">
        <div class="logo">
            <a href="/home"><img class="logo-image" src="/images/Logo.png"></a>
        </div>
        <ul class="menu">
            <li><a href="/home" {if $menu_item eq 'home'}class = "menu_active"{/if}>Home</a></li>
            <li><a href="/shop" {if $menu_item eq 'souvenir'}class = "menu_active"{/if}>Shop</a></li>
            <li><a href="/about" {if $menu_item eq 'about'}class = "menu_active"{/if}>About us</a></li>
            <li><a href="/contacts" {if $menu_item eq 'contact'}class = "menu_active"{/if}>Contact us</a></li>
        </ul>
        <div class = "searchpanel-content">
            <form method="get" action="/search">
                <input class="search" type="text" placeholder="Search" name="q">
                <a class="search_button" href="#">
                    <img class="search_icon" src="/images/search.png">
                </a>
            </form>
        </div>
        <div class="languages">
            <a href="#" class="language">Arm</a>
            <span class="border">|</span>
            <a href="#" class="language">Eng</a>
            <span class="border">|</span>
            <a href="#" class="language">Rus</a>
        </div>
    </div>
</div>
    <div class="clr"></div>
    <div id="content">
        {block name="main_content"}{/block}
    </div>
    <div class="clr"></div>
    <div id="footer">
</div>
<div class="footer-container">
    <div class="footer">
        <div class="footer-shape">
            <img class="shape" src="/images/Shape 4.png">
        </div>
        <div class="footer-socal">
            <a class="socal" href="#">
                <img class="socal-icon" src="/images/youtube.png">
            </a>
            <a class="socal" href="#">
                <img class="socal-icon" src="/images/twitter.png">
            </a>
            <a class="socal" href="https://www.facebook.com/aybsouvenirshop/">
                <img class="socal-icon" src="/images/facebook.png">
            </a>
        </div>
        <div class="footer-copyright">
            <span class="copyright"> Copyright &copy; AYBschool 2014</span>
        </div>
    </div>
</div>
</body>
</html>
