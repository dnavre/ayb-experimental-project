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
            
           {foreach $souvenirs as $souvenir}
          <tr>
            <td>{$souvenir['id']}</td>
            <td>{$souvenir['name']}</td> 
            <td><input type="checkbox"  disabled {if $souvenir['visible'] eq 1} checked {/if} /></td>
            <td><input type="checkbox"  disabled {if $souvenir['featured'] eq 1} checked {/if}></td>
            <td><button type="button" class="btn btn-warning">Edit</button></td>
            <td><button onclick="window.location.href='?module=admin&action=delcat&id={$souvenir['id']}'" type="button" class="btn btn-danger">Delete</button></td>
             </tr>
{/foreach}

{debug}
        </tbody>
    </table>
{/block}