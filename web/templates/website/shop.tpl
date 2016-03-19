{extends file="website/index.tpl"}
{block name=main_content}

    <ul class="nav nav-pills nav-stacked col-md-3" id="categories">
            <li {if $active_category eq 'all'}class="active"{/if}><a href="/shop">All Souvenirs</a></li>
        {foreach $categories as $category}
            <li {if $active_category eq $category.id}class="active"{/if}><a href="/shop/{$category.name}/{$category.id}">{$category.name}</a></li>
        {/foreach}
    </ul>
    <div id="souvenirs">
        <ul>
            {foreach from=$souvenirs key=id item=souvenir name=foo}
                {if $smarty.foreach.foo.index == 6}
                    {break}
                {/if}
                 <li class="souvenir">
                    <a href="/souvenir?id={$souvenir.id}">
                    <div class="souvenir_pic" style="background-image:url({$souvenir.photo_src})">
                    <div class="souvenir_info">
                        <span class="name">{$souvenir.name}</span>
                        <span class="price">{$souvenir.price}AMD</span>
                    </div>
                    </div>
                    </a>
                </li>
            {/foreach}
        </ul>
        <nav>
            <ul class="pagination" id="pagination">
                {if $page neq 1}
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                {/if}
                {for $page_num=1 to $page}
                    <li><a href="?page={$page_num}">{$page_num}</a></li>
                {/for}
                {if $page neq 1}
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                {/if}
            </ul>
        </nav>
    </div>

    <div id="more_souvenirs">
        <div id="featured_souvenirs">
            <h4>Featured Souvenirs</h4>
            <ul class="souvenir_sm_list">
                {foreach from=$souvenirs key=id item=souvenir name=foo}
                {if $smarty.foreach.foo.index == 3}
                    {break}
                {/if}
                    {if $souvenir.featured eq 1}
                        <li class="souvenir_sm">
                            <a href="/souvenir?id={$souvenir.id}">
                                <div class="souvenir_pic_sm" style="background-image:url({$souvenir.photo_src})">
                            <div class="souvenir_info">
                                <span class="name_sm">{$souvenir.name}</span>
                                <span class="price_sm">{$souvenir.price}AMD</span>
                            </div>
                                </div>
                            </a>
                        </li>
                    {/if}
                {/foreach}
            </ul>
        </div>
        <div id="new_souvenirs">
            <h4>New Souvenirs</h4>
            <ul class="souvenir_sm_list">
                {foreach from=$souvenirs key=id item=souvenir name=foo}
                    {if $smarty.foreach.foo.index == 3}
                        {break}
                    {/if}
                    <li class="souvenir_sm">
                        <a href="/souvenir?id={$souvenir.id}">
                            <div class="souvenir_pic_sm" style="background-image:url({$souvenir.photo_src})">
                                <div class="souvenir_info">
                                    <span class="name_sm">{$souvenir.name}</span>
                                    <span class="price_sm">{$souvenir.price}AMD</span>
                                </div>
                            </div>
                        </a>
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>
{/block}