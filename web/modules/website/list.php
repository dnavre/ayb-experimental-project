<?php
/**
 * Created by PhpStorm.
 * User: yervandaghababyan
 * Date: 12/6/14
 * Time: 10:43 AM
 */
global $db, $smarty;

$statement = $db->prepare("SELECT * FROM category WHERE visible = 1");
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$categories = $statement->fetchAll();

if(isset($_GET['id'])) {
    $stmt = $db->prepare("SELECT s.id, s.name, s.price, s.featured, p.src photo_src FROM souvenir s left join photo p on s.main_photo_id = p.id WHERE s.visible=1 and s.category_id=" . $_GET['id'] . " ORDER BY s.create_date DESC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    $cat_id = $_GET['id'];
}
else{
    $stmt = $db->prepare("SELECT s.id, s.name, s.price, s.featured, p.src photo_src FROM souvenir s left join photo p on s.main_photo_id = p.id WHERE s.visible=1  ORDER BY s.create_date DESC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    $cat_id = "all";
}


$smarty->assign("categories", $categories);
$smarty->assign("active_category", $cat_id);
$smarty->assign("souvenirs", $result);
$smarty->assign("menu_item", "souvenir");
$smarty->assign("css_link", "css/website/list.css");
$smarty->assign("title", "Souvenirs | AYB Souvenir Shop");
$smarty->display("website/list.tpl");
