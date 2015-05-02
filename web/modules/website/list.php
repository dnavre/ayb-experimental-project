<?php
/**
 * Created by PhpStorm.
 * User: yervandaghababyan
 * Date: 12/6/14
 * Time: 10:43 AM
 */
global $db, $smarty;

$stmt = $db->prepare("SELECT name, price  FROM souvenir WHERE visible = true");
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();


$smarty->assign("souvenirs", $result);
$smarty->assign("menu_item", "souvenir");
$smarty->assign("css_link", "css/website/list.css");
$smarty->assign("title", "Souvenirs | AYB Souvenir Shop");
$smarty->display("website/list.tpl");
