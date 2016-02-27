{extends file="admin/index.tpl"}
{block name=content}
    {if $page_info['id'] eq ''}<h3>Add Page</h3>
    {else}<h3>Edit Page</h3>{/if}
    <form class="form-horizontal" action="/admin/page_save" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="page_name" value="{$page_info['title']}" required/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Visible</label>
            <div class="col-sm-5">
                <input style="margin-top: 11px;" type="checkbox" name="page_visible" {if $page_info['visible'] eq '1'}checked{/if}/>
            </div>
        </div>
        <input type="hidden" name="page_id" value="{$page_info['id']}">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-success" name="submit">Save</button>
            </div>
        </div>
    </form>
{/block}