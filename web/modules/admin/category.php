<?php

global $db;
   
    $stmt = $db->prepare("SELECT id, name, visible FROM category"); 
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();
   // var_dump($result);
    
    $smarty->assign("categories", $result);
	$smarty->assign("menu_item", "category");
	$smarty->display("admin/category.tpl");
