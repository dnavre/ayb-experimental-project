<?php

global $db, $smarty;
if(isset($_GET['id'])) {
    $stmt = $db->prepare("SELECT id, name, name_arm, visible FROM category WHERE id=".$_GET['id']);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();

    //var_dump($result);
}
else {
    $result = ['id'=>'', 'name' => '', 'visible'=>'0', 'name_arm' => ''];
}
$smarty->assign("cat_info", $result);
$smarty->assign("menu_item", "category");
$smarty->display("admin/category_edit.tpl");

 