{extends file="admin/index.tpl"}
{block name=content}
    <h1>Pages</h1>
    <table class="table table-hover">
        <thead>
        <th width="5%">#</th>
        <th width="40%">Name</th>
        <th>Visibility</th>
        <th></th>
        <th></th>
        </thead>
        <tbody class="">
        {assign var=i value=0}
        {foreach $pages as $page}
            {assign var=i value=$i+1}
            <tr>

                <td>{$i}</td>
                <td>{$page['title']}</td>
                <td><button onclick="window.location.href='page_edit?id={$page['id']}'" type="button" class="btn btn-warning">Edit</button></td>
            </tr>
        {/foreach}
        </tbody>
    </table>
{/block}