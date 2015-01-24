<html>
<head>
    <title>$title</title>
    <link rel="stylesheet" type="text/css" href="css/website/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="$css_link" />
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

        <div id="menu">
            <ul>
                <li class="active"><a href="">Home</a></li>
                <li><a href="">Products</a></li>
                <li><a href="">About Us</a></li>
            </ul>
            <div id="search">
                <form>
                    <input type="text" placeholder="Search In Site" name="search" id="search_bar" class="form-control"/>
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
