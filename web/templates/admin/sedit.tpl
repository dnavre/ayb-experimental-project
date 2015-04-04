{extends file="admin/index.tpl"}
{block name=content}
    <form class="form-horizontal">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="souvenir_name" value="Hoodie">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
            <div class="col-sm-5">
                <select class="form-control" name="souvenir_category">
                    <option>Cups</option>
                    <option>T-Shirts</option>
                    <option>Cases</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" name="souvenir_price" value="100">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Visible</label>
            <div class="col-sm-5">
                <input style="margin-top: 11px;" type="checkbox" name="souvenir_visible" checked>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Featured</label>
            <div class="col-sm-5">
                <input style="margin-top: 11px;" type="checkbox" name="souvenir_featured" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-5">
                <textarea rows="10" name="souvenir_description" ></textarea>
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