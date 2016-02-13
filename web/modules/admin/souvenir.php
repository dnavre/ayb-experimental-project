<?php

global $db, $smarty;
//var_dump($_GET);
if(isset($_GET['category_id'])) {

        // Fetching souvenirs
        $stmt = $db->prepare("select c.id, c.name, c.description, c.price, c.visible, c.featured, c.publish_date, c.main_photo_id
        from souvenir c
        where c.category_id = :cat_id
        order by c.name");
        $stmt->bindParam(':cat_id', $_GET['category_id']);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        // Fetching category name

        $cat_stmt = $db->prepare("select c.name
        from category c
        where c.id = :cat_id
        order by c.name");
        $cat_stmt->bindParam(':cat_id', $_GET['category_id']);
        $cat_stmt->execute();

        $cat_stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cat_name = $cat_stmt->fetchAll();
        $smarty -> assign("catid", $cat_name[0]['name']);
        //var_dump($cat_name);

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