{extends file="admin/index.tpl"}
{block name=content}
    {if $souvenir_info['id'] eq ''}<h3>New Souvenir</h3>
    {else}<h3>Edit Souvenir</h3>
    {/if}
    <form class="form-horizontal" method="post" action="?module=admin&action=souvenir_save">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="souvenir_name" value="{$souvenir_info['name']}">
            </div>
        </div>
         <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
             <div class="col-sm-5">
                 <select class="form-control" name="souvenir_category">
                     {foreach $categories as $category}
                         <option {if $category['id'] eq {$souvenir_info['category_id']}}selected{/if}>{$category['name']}</option>
                     {/foreach}
                 </select>
             </div>
         </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="souvenir_price" value="{$souvenir_info['price']}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Visible</label>
            <div class="col-sm-5">
                <input style="margin-top: 11px;" type="checkbox" name="souvenir_visible" {if $souvenir_info['visible'] eq '1'}checked{/if} >
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Featured</label>
            <div class="col-sm-5">
                <input style="margin-top: 11px;" type="checkbox" name="souvenir_featured" {if $souvenir_info['featured'] eq '1'}checked{/if}>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-5">
                <textarea rows="10" name="souvenir_description" >{$souvenir_info['description']}</textarea>
            </div>
        </div>
        <input type="hidden" name="souvenir_id" value="{$souvenir_info['id']}">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-success" name="submit">Save</button>
            </div>
        </div>
    </form>
{/block}