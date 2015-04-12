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

          {assign var=i value=0}
           {foreach $souvenirs as $souvenir}
            {assign var=i value=$i+1}
          <tr>

            <td>{$i}</td>
            <td>{$souvenir['name']}</td> 
            <td><input type="checkbox"  disabled {if $souvenir['visible'] eq 1} checked {/if} /></td>
            <td><input type="checkbox"  disabled {if $souvenir['featured'] eq 1} checked {/if}></td>
            <td><button onclick="window.location.href='?module=admin&action=souvenir_edit&id={$souvenir['id']}'" type="button" class="btn btn-warning">Edit</button></td>
            <td><button onclick="window.location.href='?module=admin&action=souvenir_delete&id={$souvenir['id']}'" type="button" class="btn btn-danger">Delete</button></td>
             </tr>
           {/foreach}
        </tbody>
    </table>
{/block}