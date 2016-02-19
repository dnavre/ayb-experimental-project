<?php

global $db, $smarty;
if(isset($_GET['id'])) {
    $sql = "SELECT s.id, s.s_name, s.price, s.description, s.category_id, s.create_date, s.main_photo_id, c.id, c.c_name
            FROM souvenir s
            LEFT JOIN category c ON s.category_id=c.id
            WHERE s.id = :id";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(":id", $_GET['id']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchall();

    $sql1 = "SELECT p.souvenir_id, p.src
    FROM photo p
    WHERE P.souvenir_id = :id";
    $stmt1 = $db->prepare($sql1);

    $stmt1->bindParam(":id", $_GET['id']);
    $stmt1->execute();
    $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    $result1 = $stmt1->fetchall();

}
else{
    $result = ['id'=>'', 's_name' => '', 'visible'=>'0'];
    $result1 = [];
}

$smarty->assign("menu_item", "souvenir");
$smarty->assign("title", "Souvenir | AYB Souvenir Shop");
$smarty->assign("css_link", "/css/website/souvenir.css");
$smarty -> assign("souvenir", $result);
$smarty -> assign("photo", $result1);
$smarty->display("website/souvenir.tpl");

?>