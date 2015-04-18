<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/admin/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            toolbar: false
        });
    </script>
</head>
<body>
    <div id="wrapper">
        <div id="header" class="clr">
            <h1>SS Admin Panel</h1>
            <div id="LinkToSite"><a href="/souvenir-shop/web">Back to Site</a></div>
        </div>
        <div id="menu">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li {if $menu_item eq 'souvenir'}class = "active"{/if}><a href="?module=admin&action=souvenir">Souvenirs</a></li>
                            <li {if $menu_item eq 'category'}class = "active"{/if}><a href="?module=admin&action=category">Categories</a></li>
                            <li {if $menu_item eq 'page'}class = "active"{/if}><a href="?module=admin&action=page">Pages</a></li>
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
        <div id="content">
            {include file='admin/error.tpl'}
            {block name=content}{/block}
        </div>
    </div>
</body>
</html>