<html>
<head>
    <title>$title</title>
    <link rel="stylesheet" type="text/css" href="css/website/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href='{$css_link}'/>
    <script src="js/bootstrap.js"></script>
    <script>$script</script>
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
            <a href=""><img src="images/logo.png" alt="Ayb Souvenir Shop" title="Souvenir Shop Logo"/></a>
            <a href=""><h1 id="main_name">AYB School Souvenir Shop</h1></a>
        </div>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li {if $menu_item eq 'home'}class = "active"{/if}><a href="home">Home</a></li>
                        <li {if $menu_item eq 'souvenir'}class = "active"{/if}><a href="list">Products</a></li>
                        <li {if $menu_item eq 'about'}class = "active"{/if}><a href="about">About Us</a></li>
                    </ul>
                    <form class="navbar-form  navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <div class="clr"></div>
    <hr/>
    <div id="content">
        {block name="main_content"}{/block}
    </div>
    <div class="clr"></div>
    <hr/>
    <div id="footer">
        <div id="information">
            <div id="map"></div>
            <div id="facebook"></div>
            <div id="social_network">
                <ul>
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Twitter</a></li>
                </ul>
            </div>
            <div id="form">
                <a id="form_pop_up" href="#"></a>
            </div>
        </div>
        <div id="copyright">
            <span>All Rights Reserved &copy; AYB Web-Development Class</span>
        </div>
    </div>
</div>
</body>
</html>
