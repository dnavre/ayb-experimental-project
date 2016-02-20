<?php

var_dump($_SERVER);

$smarty->assign("menu_item", "search");
$smarty->assign("css_link", "/css/website/list.css");
$smarty->setTitle("Search: {$_GET['q']}");

$smarty->assign("searchString", $_GET['q']);

$smarty->display("website/search.tpl");