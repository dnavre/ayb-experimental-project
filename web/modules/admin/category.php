<?php

global $db, $smarty, $error;
session_start();


   
$stmt = $db->prepare("select c.id, c.name, c.visible, count(s.id) souvenir_cnt
        from category c
        left join souvenir s on s.category_id=c.id
        group by c.id
        order by c.name");
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
//var_dump($result);

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
