<?php

global $db, $smarty;

    $stmt = $db->prepare("SELECT id, name, visible, featured FROM souvenir"); 
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();


    $smarty->assign("souvenirs", $result);
$smarty->assign("menu_item", "souvenir");
$smarty->display("admin/souvenir.tpl");