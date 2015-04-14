<?php

global $db, $smarty;
session_start();


$stmt = $db->prepare("SELECT id, name FROM category");
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();

if(isset($_GET['id'])) {

    $query = $db->prepare("SELECT id, name, visible, category_id, price, featured, description FROM souvenir WHERE id=".$_GET['id']);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $souvenir_info = $query->fetch();

}
else {
    $souvenir_info = ['id'=>'', 'name' => '', 'visible'=>'0', 'description' => '', 'category_id' => '', 'price' => '', 'featured' => '0'];
}

$smarty->assign("categories", $result);
$smarty->assign("souvenir_info", $souvenir_info);
$smarty->assign("menu_item", "souvenir");
if(isset($_SESSION['error'])){
    $smarty->assign("error_place", "souvenir_edit");
    $smarty->assign("error_body", $_SESSION['error']);
    session_unset();
    $smarty->display("admin/error.tpl");
}

else $smarty->display("admin/souvenir_edit.tpl");

