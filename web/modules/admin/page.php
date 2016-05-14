<?php
global $smarty, $db;

$stmt = $db->prepare("select pa.id, pa.title
        from page pa
        order by pa.title");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
var_dump($stmt -> errorInfo());
if (count($result) != 3){
        if($result[0]['title'] != 'About Us'){
                $stmt1 = $db -> prepare("INSERT INTO page (title, create_date, content) VALUES ('About Us', now(), '')");
        }
        if($result[1]['title'] != 'Contacts'){
                $stmt1 = $db -> prepare("INSERT INTO page (title, create_date, content) VALUES ('Contacts', now(), '')");
        }
}

$smarty->assign("pages", $result);
$smarty->assign("menu_item", "page");
$smarty->display("admin/page.tpl");