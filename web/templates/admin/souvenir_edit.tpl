<head>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/admin/main.css"/>
    <script src="/js/bootstrap.js"></script>
</head>
{include file='admin/error.tpl'}
{extends file="admin/index.tpl"}
{block name=content}
    {block name=error}{/block}
    {if $souvenir_info['id'] eq ''}
        <h3>New Souvenir</h3>
    {else}
        <h3>Edit Souvenir</h3>
    {/if}

    <div id="souvenir_edit_left" class="col-md-6">
        <form class="form-horizontal" method="post" action="?module=admin&action=souvenir_save" enctype="multipart/form-data">
            <div class="form-group">
                <label for="souvenir_name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="souvenir_name" value="{$souvenir_info['name']}" id="souvenir_name" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="souvenir_name" class="col-sm-2 control-label">Name in Armenian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="souvenir_name_arm" value="{$souvenir_info['name_arm']}" id="souvenir_name" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">
                    <select class="form-control" name="souvenir_category">
                        {foreach $categories as $category}
                            <option {if $category['id'] eq {$souvenir_info['category_id']}}selected{/if}>{$category['name']}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="souvenir_price" value="{$souvenir_info['price']}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Visible</label>
                <div class="col-sm-10">
                    <input id='visibility' style="margin-top: 11px;" type="checkbox" name="souvenir_visible" {if $souvenir_info['visible'] eq '1'}checked{/if} {if $souvenir_info['id'] eq ''}disabled {/if}/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Featured</label>
                <div class="col-sm-10">
                    <input style="margin-top: 11px;" type="checkbox" name="souvenir_featured" {if $souvenir_info['featured'] eq '1'}checked{/if}>
                </div>
            </div>
            <div class="form-group" style="margin-right: -16px;">
                <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea rows="10" name="souvenir_description" >{$souvenir_info['description']}</textarea>
                </div>
            </div>
            <div class="form-group" style="margin-right: -16px;">
                <label for="inputEmail3" class="col-sm-2 control-label">Description in Armenian</label>
                <div class="col-sm-10">
                    <textarea rows="10" name="souvenir_description_arm" >{$souvenir_info['description_arm']}</textarea>
                </div>
            </div>
            <input type="hidden" name="souvenir_id" value="{$souvenir_info['id']}" />
            <input type="hidden" id= "main_pic"  name="souvenir_pic"/>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                </div>
            </div>

        </form>
    </div>
    <div class="col-md-6 current_pic" id="temporary">

    </div>
    <div class="col-md-6 form_item">
    <form class="form-horizontal" id="souvenir_images" {if $souvenir_info['id'] neq ''}
        enctype = "multipart/form-data" action="souvenir_save_images" {/if} method="post">
        <input type="hidden" name="souvenir_id" value="{$souvenir_info['id']}">
        {foreach $souvenir_images as $image }
            <div{if $souvenir_info['main_photo_id'] neq $image['id']} class="secondary_image"{/if}>
                <img id = "{$image['id']}" src="{$image['src']}" {if $souvenir_info['main_photo_id'] neq $image['id']} class="view_image pics" {else} class="main_image" {/if}/>
                <ul class="photo_actions">
                    {if $souvenir_info['main_photo_id'] neq $image['id'] }
                        <li>
                            <a href="souvenir_make_main_image?id={$image['id']}&souvenir_id={$souvenir_info['id']}">
                                <img src="/images/admin/up-icon.png">Make Main Image
                            </a>
                        </li>
                        <li>
                            <a class="delete_image" href="souvenir_delete_image?id={$image['id']}&souvenir_id={$souvenir_info['id']}">
                                <img src="/images/admin/delete-icon.png">Delete Image
                            </a>
                        </li>
                    {/if}
                </ul>
            </div>
        {/foreach}
        <div class="form-group">
            <div id="filediv"><input class="file" name="file" type="file" id="file" multiple/></div>
        </div>
        <div class="form-group" id="submit_image">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success" name="submit_image" value="Save Image" />
            </div>
        </div>
    </form>
     </div>
    {if $souvenir_info['id'] eq ''}
    <script>
        $("form#souvenir_images").submit(function (event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                    url: 'souvenir_save_images.php',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (returndata) {
                        var elem = document.createElement("img");
                        elem.src=returndata["img_src"];
                        document.getElementById("temporary").appendChild(elem);
                        $("div#temporary").children("img").addClass('temp_image');
                        changeVis();
                        document.getElementById('main_pic').value = returndata["img_name"];

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
                return false;
            });
        function changeVis(){
           document.getElementById("visibility").disabled = false;
       }
    </script> {/if}
{/block}