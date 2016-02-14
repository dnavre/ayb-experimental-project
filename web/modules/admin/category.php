<?php

global $db, $smarty, $error;

   
$stmt = $db->prepare("select c.id, c.c_name, c.visible, count(s.id) souvenir_cnt
        from category c
        left join souvenir s on s.category_id=c.id
        group by c.id
        order by c.c_name");
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
//var_dump($result);

$smarty->assign("categories", $result);
$smarty->assign("menu_item", "category");
$smarty->display("admin/category.tpl");

