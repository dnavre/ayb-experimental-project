{extends file="admin/index.tpl"}
{block name=content}
    {block name=error}{/block}
    <h1>Categories</h1>
    <button onclick="window.location.href='category_edit'" type="button" class="new btn btn-success">Add New Category</button>
    <table class="table table-hover">
        <thead>
        <th width="5%">#</th>
        <th width="40%">Name</th>
        <th>Souvenirs</th>
        <th>Visibility</th>
        <th></th>
        <th></th>
        </thead>
        <tbody class="">
             
             {assign var=i value=0}
       {foreach $categories as $category}
            {assign var=i value=$i+1}
           <tr>
               <td>{$i}</td>
               <td>{$category['name']}</td>
               <td>
                   <a href="admin/souvenir/{$category['id']}">
                       {$category['souvenir_cnt']}
                   </a>
               </td> <!--Souvenir Quantity-->
               <td><input type="checkbox"  disabled {if $category['visible'] eq 1} checked {/if} /></td> <!--Visibility Checkbox-->
               <td><button onclick="window.location.href='category_edit?id={$category['id']}'" type="button" class="btn btn-warning">Edit</button></td> <!--Edit Botton-->
               <td><button onclick="window.location.href='category_delete&id={$category['id']}'" type="button" class="btn btn-danger">Delete</button></td> <!--Delete Botton-->
           </tr>
{/foreach}
        </tbody>
    </table>
{/block}