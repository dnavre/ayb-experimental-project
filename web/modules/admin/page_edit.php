<?php

global $db, $smarty;
if(isset($_GET['id'])) {
    $stmt = $db->prepare("SELECT id, title, title_arm, content_arm, content FROM page WHERE id=".$_GET['id']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();

}
else {
    $result = ['id'=>'', 'title' => '', 'visible'=>'0', 'title_arm'=>'', 'content_arm'=>''];
}
$smarty->assign("page_info", $result);
$smarty->assign("menu_item", "page");
$smarty->display("admin/page_edit.tpl");

?>