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

$getter = -1;
$cat_id='all';
if(isset($_GET['id'])){
    $getter = $_GET['id'];
    $cat_id = $_GET['id'];
}

if(!isset($_GET['page'])) $_GET['page'] = 1;
$page_num = ($_GET['page']*9)-9;
if($page_num == -1) $page_num = 0;

$stmt = $db->prepare("SELECT s.id, s.name, s.price, s.featured, p.src photo_src
FROM souvenir s left join photo p on s.main_photo_id = p.id WHERE s.visible=1 and (:getter = -1 or s.category_id=:getter)
 ORDER BY s.create_date DESC LIMIT :p, 9");
$stmt->bindParam(':p', $page_num, PDO::PARAM_INT );
$stmt->bindParam(':getter', $getter);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();

$stmt1 = $db->prepare("SELECT s.id, s.name, s.price, s.featured, p.src photo_src
FROM souvenir s left join photo p on s.main_photo_id = p.id WHERE s.visible=1
ORDER BY s.create_date DESC LIMIT 6");
$stmt1->execute();
$stmt1->setFetchMode(PDO::FETCH_ASSOC);
$new_result = $stmt1->fetchAll();

$stmt2 = $db->prepare("SELECT s.id, s.name, s.price, s.featured, p.src photo_src
FROM souvenir s left join photo p on s.main_photo_id = p.id WHERE s.visible=1 and (s.featured = 1)
ORDER BY s.name");
$stmt2->execute();
$stmt2->setFetchMode(PDO::FETCH_ASSOC);
$feat_result = $stmt2->fetchAll();

$page_st = $db -> prepare("SELECT COUNT(*) FROM souvenir WHERE 1=1 and(:getter = -1 OR category_id=:getter)");
$page_st->bindParam(':getter', $getter);
$page_st -> execute();
$page_st->setFetchMode(PDO::FETCH_ASSOC);
$res = $page_st->fetch();
if($res['COUNT(*)']%9 == 0){
    $paging = $res['COUNT(*)']/9;
}
else $paging=floor($res['COUNT(*)']/9)+1;



$smarty->assign('cur_page', $_GET['page']);
$smarty->assign('page', $paging);
$smarty->assign("categories", $categories);
$smarty->assign("active_category", $cat_id);
$smarty->assign("feat_souvenirs", $feat_result);
$smarty->assign("souvenirs", $result);
$smarty->assign("new_souvenirs", $new_result);
$smarty->assign("menu_item", "souvenir");
$smarty->assign("css_link", "/css/website/list.css");
$smarty->setTitle("Shop");
$smarty->display("website/shop.tpl");
