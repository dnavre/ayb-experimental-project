<?php

$smarty->assign("menu_item", "about");
$smarty->assign("css_link", "/css/website/list.css");

$smarty->setTitle("About Us");

$smarty->display("website/about.tpl");