<?php

 $latest_sql = "SELECT s.id, s.name s_name, s.price, p.src
            FROM souvenir s
            LEFT JOIN photo p ON s.main_photo_id=p.id
            WHERE  s.visible=1
            ORDER BY s.create_date desc
            limit 10"
            ;
    $stmt = $db->prepare($latest_sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $latest = $stmt->fetchall();

    
$smarty->assign("latest", $latest);


 $featured_sql = "SELECT s.id, s.name s_name, s.price, p.src 
            FROM souvenir s
            LEFT JOIN photo p ON s.main_photo_id=p.id
            WHERE s.featured=1 and s.visible=1
            ORDER BY rand()
            limit 10"
            ;
    $stmt = $db->prepare($featured_sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $featured = $stmt->fetchall();

    
$smarty->assign("featured", $featured);

$smarty->assign("menu_item", "home");
$smarty->assign("css_link", "/css/website/home.css");
$smarty->setTitle("Home Page");
$smarty->display("website/home.tpl");
