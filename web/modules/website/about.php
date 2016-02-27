<?php
global $smarty, $db;
$stmt = $db->prepare("SELECT id, content FROM page WHERE title = 'About Us'");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetch();

$smarty->assign("content", $result['content']);
$smarty->assign("menu_item", "contacts");
$smarty->assign("css_link", "/css/website/list.css");
$smarty->setTitle("About Us");
$smarty->display("website/about.tpl");