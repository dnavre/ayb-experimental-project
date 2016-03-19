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

if(!isset($_GET['page'])) $_GET['page'] = 1;
$page_num = ($_GET['page']*10)-10;
if($page_num == -1) $page_num = 0;

if(isset($_GET['id'])) {
    $stmt = $db->prepare("SELECT s.id, s.name, s.price, s.featured, p.src photo_src FROM souvenir s left join photo p on s.main_photo_id = p.id WHERE s.visible=1 and s.category_id=" . $_GET['id'] . " ORDER BY s.create_date DESC LIMIT :p, 10");
    $stmt->bindParam(':p', $page_num, PDO::PARAM_INT );
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    $cat_id = $_GET['id'];
}
else{
    $stmt = $db->prepare("SELECT s.id, s.name, s.price, s.featured, p.src photo_src FROM souvenir s left join photo p on s.main_photo_id = p.id WHERE s.visible=1  ORDER BY s.create_date DESC LIMIT :p, 10");
    $stmt->bindParam(':p', $page_num, PDO::PARAM_INT );
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    $cat_id = "all";
}

$page_st = $db -> prepare("SELECT COUNT(*) FROM souvenir");
$page_st -> execute();
$page_st->setFetchMode(PDO::FETCH_ASSOC);
$res = $page_st->fetch();
if($res['COUNT(*)']%10 == 0){
    $paging = $res['COUNT(*)']/10;
}
else $paging=floor($res['COUNT(*)']/10)+1;


/*
    $q = $db -> prepare("SELECT * FROM souvenir LIMIT :p, 10");
    $q->bindParam(':p', $page_num, PDO::PARAM_INT );
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $r = $q->fetchAll();

*/

$smarty->assign('cur_page', $_GET['page']);
$smarty->assign('page', $paging);
$smarty->assign("categories", $categories);
$smarty->assign("active_category", $cat_id);
$smarty->assign("souvenirs", $result);
$smarty->assign("menu_item", "souvenir");
$smarty->assign("css_link", "/css/website/list.css");
$smarty->setTitle("Shop");
$smarty->display("website/shop.tpl");
