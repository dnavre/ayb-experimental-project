{extends file="admin/index.tpl"}
{block name=content}
    <h1>Categories</h1>
    <button onclick="window.location.href='?module=admin&action=category_edit'" type="button" class="new btn btn-success">Add New Category</button>
    <table class="table table-hover">
        <thead>
        <th width="5%">#</th>
        <th width="40%">Name</th>
        <th>Visibility</th>
        <th></th>
        <th></th>
        </thead>
        <tbody class="">
        <div style="display: none; position: absolute">{counter start=0 skip=1}</div>
        {foreach $categories as $category}

                  <tr>
                        <td>{counter}</td>
                        <td>{$category['name']}</td>
                        <td><input type="checkbox"  disabled {if $category['visible'] eq 1} checked {/if} /></td>
                        <td><button onclick="window.location.href='?module=admin&action=category_edit&id={$category['id']}'" type="button" class="btn btn-warning">Edit</button></td>
                        <td><button onclick="window.location.href='?module=admin&action=category_delete&id={$category['id']}'" type="button" class="btn btn-danger">Delete</button></td>
                  </tr>
        {/foreach}
       

        </tbody>
    </table>
{/block}