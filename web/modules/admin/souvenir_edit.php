<?php

global $db, $smarty;


$stmt = $db->prepare("SELECT id, c_name FROM category");
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();


if(isset($_GET['id'])) {

    $query = $db->prepare("SELECT s.id, s.s_name, s.visible, s.description, s.category_id, s.price, s.featured
          FROM souvenir s WHERE s.id=".$_GET['id']);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $souvenir_info = $query->fetch();

    $queryGetImages = $db->prepare("SELECT *
          FROM photo p WHERE p.souvenir_id=:souvenir_id");
    $queryGetImages->bindParam('souvenir_id', $_GET['id']);

    $queryGetImages->execute();

    $queryGetImages->setFetchMode(PDO::FETCH_ASSOC);
    $souvenir_images = $queryGetImages->fetchAll();
}
else {
    $souvenir_info = ['id'=>'', 's_name' => '', 'visible'=>'0', 'description' => '', 'category_id' => '', 'price' => '', 'featured' => '0', 'photo_src' => ''];
    $souvenir_images = [];
}

$smarty->assign("categories", $result);
$smarty->assign("souvenir_info", $souvenir_info);
$smarty->assign("souvenir_images", $souvenir_images);
$smarty->assign("menu_item", "souvenir");
$smarty->display("admin/souvenir_edit.tpl");

