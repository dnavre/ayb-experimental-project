<html>
<head>
    <title>{block name=title}Home Page | AYB Souvenir Shop{/block}</title>
    <link rel="stylesheet" text="text/css" href="css/website/main.css">
    <link rel="stylesheet" text="text/css" href="{block name=css_link}{/block}" />
    {block name=script}{/block}
</head>
<body>
    <div id="header">
        <div id="logo">
            <img src="images/logo.png" alt="Ayb Souvenir Shop" title="Souvenir Shop Logo"/>
            <h1 id="main_name">AYB School Souvenir Shop</h1>
        </div>
        <div id="language">
            <ul>
                <li><a href="">ENG</a></li>
                <li><a href="">RUS</a></li>
                <li><a href="">ARM</a></li>
            </ul>
        </div>
        <div id="menu">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Products</a></li>
                <li><a href="">About Us</a></li>
            </ul>
        </div>
        <div id="search">
            <form>
                <input type="search" placeholder="Search In Site" name="search" id="search"/>
            </form>
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
</body>
</html>
