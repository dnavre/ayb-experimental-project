{extends file="admin/index.tpl"}
{block name=content}
    {if $cat_info['id'] eq ''}<h3>Add Category</h3>
    {else}<h3>Edit Category</h3>{/if}
    <form class="form-horizontal" action="/admin/category_save" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="category_name" value="{$cat_info['c_name']}" required/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Visible</label>
            <div class="col-sm-5">
                <input style="margin-top: 11px;" type="checkbox" name="category_visible" {if $cat_info['visible'] eq '1'}checked{/if}/>
            </div>
        </div>
        <input type="hidden" name="cat_id" value="{$cat_info['id']}">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-success" name="submit">Save</button>
            </div>
        </div>
    </form>
{/block}