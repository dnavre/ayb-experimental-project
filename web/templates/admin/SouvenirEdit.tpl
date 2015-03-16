{extends file="admin/index.tpl"}
{block name=content}
    <form class="form-horizontal">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="souvenir_name" value="Hoodie">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
            <div class="col-sm-7">
                <select class="form-control">
                    <option>Cups</option>
                    <option>T-Shirts</option>
                    <option>Cases</option>
                </select>
            </div>
        </div>
    </form>
{/block}