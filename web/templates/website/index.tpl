<html>
<head>

    <link rel="stylesheet" type="text/css" href="/css/website/main.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href='{$css_link}'/>
    <link rel="icon" href="favicon.ico" type="favicon.ico"/>
    <link rel="shortcut icon" href="favicon.ico" type="favicon.ico"/>
    <script src="/js/bootstrap.js"></script>
    <script>
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

    </script>

</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="language">
            <ul>
                <li class="active"><a href="">ENG</a></li>
                <li ><a href="">RUS</a></li>
                <li ><a href="">ARM</a></li>
            </ul>
        </div>
        <div id="logo">
            <a href="/home"><img src="/images/logo.png" alt="Ayb Souvenir Shop" title="Souvenir Shop Logo"/></a>
            <a href=""><h1 id="main_name">AYB School Souvenir Shop</h1></a>
        </div>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li {if $menu_item eq 'home'}class = "active"{/if}><a href="/home">Home</a></li>
                        <li {if $menu_item eq 'souvenir'}class = "active"{/if}><a href="/list">Products</a></li>
                        <li {if $menu_item eq 'about'}class = "active"{/if}><a href="/about">About Us</a></li>
                    </ul>
                    <form class="navbar-form  navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="clr"></div>
    <hr/>
    <div id="content">
        {block name="main_content"}{/block}
    </div>
    <div class="clr"></div>
    <hr/>
    <div id="footer">
        <div id="copyright">
            <span>All Rights Reserved &copy; AYB Web-Development Class</span>
        </div>
        <iframe id="maps" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d190.39592482609945!2d44.52867511918894!3d40.22385771492381!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406aa2bce1cbf64f%3A0x85260d9b22d017a!2sAyb+High+School!5e0!3m2!1sru!2s!4v1424531345385" width="300" height="200" frameborder="0" style="border:0"></iframe>
        <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=182799588557942&version=v2.0";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like-box" data-href="https://www.facebook.com/aybsouvenirshop" data-height="205" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
        <div id="form">
                <a id="form_pop_up" href="#"></a>
        </div>
    </div>

</div>
</body>
</html>
