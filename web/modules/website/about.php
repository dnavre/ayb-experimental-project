<?php

$smarty->assign("menu_item", "contacts");
$smarty->assign("css_link", "/css/website/list.css");

$smarty->setTitle("Contacts");

$smarty->display("website/contacts.tpl");