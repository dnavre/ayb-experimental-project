<?php

global $db, $smarty;

if(isset($_GET['id'])) {
    $sql = "SELECT s.id, s.name s_name, s.price, s.description, s.category_id, s.create_date, s.main_photo_id, c.id, c.name c_name
            FROM souvenir s
            LEFT JOIN category c ON s.category_id=c.id
            WHERE s.id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $_GET['id']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchall();

    $sql1 = "SELECT p.id, p.souvenir_id, p.src, s.main_photo_id
    FROM photo p
    LEFT JOIN souvenir s
    ON p.id = s.main_photo_id
    WHERE p.souvenir_id = :id
    ORDER BY main_photo_id DESC";
    $stmt1 = $db->prepare($sql1);
    $stmt1->bindParam(":id", $_GET['id']);
    $stmt1->execute();
    $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    $result1 = $stmt1->fetchall();
    if(empty($result1)){
        require_once ('modules/website/404.php');
    }

    $smarty->assign("menu_item", "souvenir");
    $smarty->setTitle($result[0]['s_name']);
    $smarty->assign("css_link", "/css/website/souvenir.css");
    $smarty -> assign("souvenir", $result);
    $smarty -> assign("photo", $result1);
    $smarty->display("website/souvenir.tpl");
}


