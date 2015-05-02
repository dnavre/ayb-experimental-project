<?php

global $db, $smarty;

if(isset($_GET['category_id'])) {
        $stmt = $db->prepare("select c.id, c.name, c.description, c.price, c.visible, c.featured, c.publish_date, c.main_photo_id
        from souvenir c
        where c.category_id = :cat_id
        order by c.name");
        $stmt->bindParam(':cat_id', $_GET['category_id']);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
}
else{
        $stmt = $db->prepare("select c.id, c.name, c.description, c.price, c.visible, c.featured, c.publish_date, c.main_photo_id
        from souvenir c
        order by c.name");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
}




$smarty->assign("souvenirs", $result);
$smarty->assign("menu_item", "souvenir");
$smarty->display("admin/souvenir.tpl");



$_GET['category_id'];
$stmt = $db->prepare("SELECT c.name, COUNT(s.id) souvenir_cnt 
FROM category c
LEFT JOIN souvenir s ON c.id=s.category_id
WHERE category_id = :category_id
GROUP BY c.id");

$stmt->bindParam(':category_id', $name);

$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();