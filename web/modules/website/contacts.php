<?php

$smarty->assign("menu_item", "about");
$smarty->assign("css_link", "/css/website/list.css");

$smarty->setTitle("Contacts");

$smarty->display("website/contacts.tpl");