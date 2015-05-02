{extends file="website/index.tpl"}
{block name=main_content}

<div id="featured">

    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title></title>
        <style type="text/css">
            fieldSet
            {
                width: 97%;
                margin-left: 10px;
                border:0;
                margin:0;

            }
            legend
            {

                border-style:solid;
                background-color: darkred;
                font-family: Tahoma, Arial, Helvetica;
                font-weight: bold;
                font-size: 9.5pt;
                Color: #f5f5f5;
                width:40%;
                padding-left:10px;

            }

            #featured{
                float: left;
            }
            #new{
                float: right;
            }

            fieldset div { border:1px solid #003366; position:right; top:-6px }

        </style>
    </head>

<form>
    <fieldset id="featured">

        <legend>Featured Products:</legend>
        <img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10402605_514358955373842_3894247199491346399_n.jpg?oh=e5b7d4f87e2d0b63ad6fc142f800d78c&oe=55621498&__gda__=1429529632_26b35e4fe0c73d9b853a435a7824de25" alt="hoodie" width="77" height="79">
        <img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10402605_514358955373842_3894247199491346399_n.jpg?oh=e5b7d4f87e2d0b63ad6fc142f800d78c&oe=55621498&__gda__=1429529632_26b35e4fe0c73d9b853a435a7824de25" alt="hoodie" width="77" height="79">
        <img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10402605_514358955373842_3894247199491346399_n.jpg?oh=e5b7d4f87e2d0b63ad6fc142f800d78c&oe=55621498&__gda__=1429529632_26b35e4fe0c73d9b853a435a7824de25" alt="hoodie" width="77" height="79">
        <img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10402605_514358955373842_3894247199491346399_n.jpg?oh=e5b7d4f87e2d0b63ad6fc142f800d78c&oe=55621498&__gda__=1429529632_26b35e4fe0c73d9b853a435a7824de25" alt="hoodie" width="77" height="79">
    </fieldset>
</form>
</div>
<div id="new">
<form>
    <fieldset id="new">

        <legend>New Products:</legend>
        <img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10402605_514358955373842_3894247199491346399_n.jpg?oh=e5b7d4f87e2d0b63ad6fc142f800d78c&oe=55621498&__gda__=1429529632_26b35e4fe0c73d9b853a435a7824de25" alt="hoodie" width="77" height="79">
        <img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10402605_514358955373842_3894247199491346399_n.jpg?oh=e5b7d4f87e2d0b63ad6fc142f800d78c&oe=55621498&__gda__=1429529632_26b35e4fe0c73d9b853a435a7824de25" alt="hoodie" width="77" height="79">
        <img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10402605_514358955373842_3894247199491346399_n.jpg?oh=e5b7d4f87e2d0b63ad6fc142f800d78c&oe=55621498&__gda__=1429529632_26b35e4fe0c73d9b853a435a7824de25" alt="hoodie" width="77" height="79">
        <img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10402605_514358955373842_3894247199491346399_n.jpg?oh=e5b7d4f87e2d0b63ad6fc142f800d78c&oe=55621498&__gda__=1429529632_26b35e4fe0c73d9b853a435a7824de25" alt="hoodie" width="77" height="79">
    </fieldset>
</form>

</div>




<form>
    <div class="btn-group-vertical" role="group" aria-label="...">
        <button type="button" class="btn btn-default">All products</button>

        <button type="button" class="btn btn-default">Clothing</button>
        <button type="button" class="btn btn-default">Office supplies</button>
        <button type="button" class="btn btn-default">Cups</button>
        <button type="button" class="btn btn-default">Mobile phone cases</button>


    </div>

</form>

    </form>

</form>
    <table class="table">
        <thead>
        <tr>
            <th>Souvenir Name</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
            {foreach $souvenirs as $souvenir}
                <tr>
                <td>{$souvenir['name']}</td>
                    <td>{$souvenir['price']}</td>
                </tr>
            {/foreach}
        </tbody>
        </table>

{/block}