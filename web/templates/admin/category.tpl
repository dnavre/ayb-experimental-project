{extends file="admin/index.tpl"}
{block name=content}
    <h1>Categories</h1>
    <button type="button" class="new btn btn-success">Add New Category</button>
    <table class="table table-hover">
        <thead>
        <th width="5%">#</th>
        <th width="40%">Name</th>
        <th>Visibility</th>
        <th></th>
        <th></th>
        </thead>
        <tbody class="">
        <tr>
            <td>1</td>
            <td>Cups</td>
            <td><input type="checkbox" value="" disabled checked/></td>
            <td><button type="button" class="btn btn-warning">Edit</button></td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>T-Shirts</td>
            <td><input type="checkbox" value="" disabled /></td>
            <td><button type="button" class="btn btn-warning">Edit</button></td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Cases</td>
            <td><input type="checkbox" value="" disabled checked/></td>
            <td><button type="button" class="btn btn-warning">Edit</button></td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        </tbody>
    </table>
{/block}