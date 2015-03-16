{extends file="admin/index.tpl"}
{block name=content}
    <h1>Pages</h1>
    <button type="button" class="new btn btn-success">Add New Page</button>
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
            <td>About Us</td>
            <td><input type="checkbox" value="" disabled checked/></td>
            <td><button type="button" class="btn btn-warning">Edit</button></td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Contacts</td>
            <td><input type="checkbox" value="" disabled /></td>
            <td><button type="button" class="btn btn-warning">Edit</button></td>
            <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        </tbody>
    </table>
{/block}