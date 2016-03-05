<?php



 $sql = "SELECT s.id, s.name s_name, s.price, p.path 
            FROM souvenir s
            LEFT JOIN photo p ON s.main_photo_id=p.id
            WHERE s.featured=1
            ORDER BY rand()
            limit 4"
            ;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $souvenirs = $stmt->fetchall();
    
$smarty->assign("featured", $souvenirs);

$smarty->assign("menu_item", "home");
$smarty->assign("css_link", "/css/website/home.css");
$smarty->setTitle("Home Page");
$smarty->display("website/home.tpl");
