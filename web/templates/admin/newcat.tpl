{extends file="admin/index.tpl"}
{block name=content}
    <form class="form-horizontal" action="?module=admin&action=addcat" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="category_name" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Visible</label>
            <div class="col-sm-5">
                <input style="margin-top: 11px;" type="checkbox" name="category_visible" checked>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-success" name="submit">Save</button>
            </div>
        </div>
    </form>
{/block}