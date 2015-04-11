{extends file="admin/index.tpl"}
{block name=content}
    <h1>Souvenirs</h1>
    <button onclick="window.location.href='?module=admin&action=souvenir_edit'" type="button" class="new btn btn-success">Add New Souvenir</button>
    <table class="table table-hover">
        <thead>
            <th width="5%">#</th>
            <th width="40%">Name</th>
            <th>Visibility</th>
            <th>Featured</th>
            <th></th>
            <th></th>
        </thead>
        <tbody class="">
            <tr>
                <td>1</td>
                <td>Hoodie</td>
                <td><input type="checkbox" value="" disabled checked/></td>
                <td><input type="checkbox" value="" disabled/></td>
                <td><button type="button" class="btn btn-warning">Edit</button></td>
                <td><button type="button" class="btn btn-danger">Delete</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Hoodie</td>
                <td><input type="checkbox" value="" disabled /></td>
                <td><input type="checkbox" value="" disabled checked /></td>
                <td><button type="button" class="btn btn-warning">Edit</button></td>
                <td><button type="button" class="btn btn-danger">Delete</button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Hoodie</td>
                <td><input type="checkbox" value="" disabled checked/></td>
                <td><input type="checkbox" value="" disabled checked/></td>
                <td><button type="button" class="btn btn-warning">Edit</button></td>
                <td><button type="button" class="btn btn-danger">Delete</button></td>
            </tr>
        </tbody>
    </table>
{/block}