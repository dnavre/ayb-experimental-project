{extends file="admin/index.tpl"}
{block name=content}
    <h3>Edit Page</h3>
    <form class="form-horizontal" action="/admin/page_save" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="page_name" value="{$page_info['title']}" readonly/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name in Armenian</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="page_name_arm" value="{$page_info['title_arm']}" readonly/>
            </div>
        </div>
        </div>
        <div class="form-group" style="margin-right: -16px;">
            <label for="inputEmail3" class="col-sm-2 control-label">Page Content</label>
            <div class="col-sm-8">
                <textarea rows="10" name="page_content" >{$page_info['content']}</textarea>
            </div>
        </div>
        </div>
        <div class="form-group" style="margin-right: -16px;">
            <label for="inputEmail3" class="col-sm-2 control-label">Page Content in Armenian</label>
            <div class="col-sm-8">
                <textarea rows="10" name="page_content_arm" >{$page_info['content_arm']}</textarea>
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