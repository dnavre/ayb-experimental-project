<?php

global $smarty, $db;

$stmt = $db->prepare("select pa.id, pa.title, pa.visible
        from page pa
        order by pa.title");
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
$smarty->assign("pages", $result);
$smarty->assign("menu_item", "page");
$smarty->display("admin/page.tpl");