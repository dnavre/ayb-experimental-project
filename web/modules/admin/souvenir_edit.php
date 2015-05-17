<?php

global $db, $smarty;


$stmt = $db->prepare("SELECT id, name FROM category");
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();


if(isset($_GET['id'])) {

    $query = $db->prepare("SELECT s.id, s.name, s.visible, s.description, s.category_id, s.price, s.featured FROM souvenir s WHERE s.id=".$_GET['id']);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $souvenir_info = $query->fetch();
}
else {
    $souvenir_info = ['id'=>'', 'name' => '', 'visible'=>'0', 'description' => '', 'category_id' => '', 'price' => '', 'featured' => '0', 'photo_src' => ''];
}

$smarty->assign("categories", $result);
$smarty->assign("souvenir_info", $souvenir_info);
$smarty->assign("menu_item", "souvenir");
$smarty->display("admin/souvenir_edit.tpl");

