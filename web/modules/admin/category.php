<?php

global $db, $smarty, $error;
session_start();


   
$stmt = $db->prepare("SELECT id, name, visible FROM category");
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
// var_dump($result);

$smarty->assign("categories", $result);
$smarty->assign("menu_item", "category");
if(isset($_SESSION['error']))
{
    $smarty->assign("error_place", "category");
    $smarty->assign("error_body", $_SESSION['error']);
    session_unset();
    $smarty->display("admin/error.tpl");
}
else{
    $smarty->display("admin/category.tpl");
}
