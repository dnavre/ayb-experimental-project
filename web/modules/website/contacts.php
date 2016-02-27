<?php
global $smarty, $db;

$stmt = $db->prepare("SELECT id, content FROM page WHERE title = 'Contacts'");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetch();

$smarty->assign("content", $result['content']);
$smarty->assign("menu_item", "about");
$smarty->assign("css_link", "/css/website/list.css");
$smarty->setTitle("Contacts");
$smarty->display("website/contacts.tpl");