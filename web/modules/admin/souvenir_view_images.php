<?php

global $db, $smarty;



if(isset($_GET['id'])) {
    $id =1;
    $query = $db->prepare("SELECT s.id, s.s_name, s.visible, s.description, s.category_id, s.price, s.featured, s.main_photo_id
          FROM souvenir s WHERE s.id=:souvenir_id");
    $query->bindParam(':souvenir_id', $_GET['id']);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $souvenir_info = $query->fetch();

    $queryGetImages = $db->prepare("SELECT p.* FROM photo p
        inner join souvenir s on s.id=p.souvenir_id
        WHERE p.souvenir_id=:souvenir_id
        order by s.main_photo_id=p.id desc, p.create_date desc");
    $queryGetImages->bindParam(':souvenir_id', $_GET['id']);

    $queryGetImages->execute();

    $queryGetImages->setFetchMode(PDO::FETCH_ASSOC);
    $souvenir_images = $queryGetImages->fetchAll();
}
else {
    $souvenir_info = ['id'=>'', 's_name' => '', 'visible'=>'0', 'description' => '', 'category_id' => '', 'price' => '', 'featured' => '0', 'photo_src' => ''];
    $souvenir_images = [];
    $id = 0;
}

$smarty->assign("souvenir_info", $souvenir_info);
$smarty->assign("souvenir_images", $souvenir_images);
$smarty->assign("id", $id);
$smarty->display("admin/souvenir_view_images.tpl");

