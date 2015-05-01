<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/admin/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            toolbar: false
        });
    </script>
    <script>
        var abc = 0;
        $(document).ready(function() {
            //  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
            $('#add_more').click(function() {
                $(this).before($("<div/>", {
                    id: 'filediv'
                }).fadeIn('slow').append($("<input/>", {
                    name: 'file[]',
                    type: 'file',
                    id: 'file'
                }), $("<br/><br/>")));
            });
            // Following function will executes on change event of file input to select different file.
            $('body').on('change', '#file', function() {
                if (this.files && this.files[0]) {
                    abc += 1; // Incrementing global variable by 1.
                    var z = abc - 1;
                    var x = $(this).parent().find('#previewimg' + z).remove();
                    $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                    $(this).hide();
                    $("#abcd" + abc).append($("<img/>", {
                        id: 'img',
                        src: 'x.png',
                        alt: 'delete'
                    }).click(function() {
                        $(this).parent().parent().remove();
                    }));
                }
            });
            // To Preview Image
            function imageIsLoaded(e) {
                $('#previewimg' + abc).attr('src', e.target.result);
            };
            $('#upload').click(function(e) {
                var name = $(":file").val();
                if (!name) {
                    alert("First Image Must Be Selected");
                    e.preventDefault();
                }
            });
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