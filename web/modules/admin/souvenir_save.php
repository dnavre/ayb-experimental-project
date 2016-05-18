<?php

global $db;
include_once (ROOT . "/includes/imageResizeClass.php");
$irConfig = new ImageResizeConfig();

$statement = $db->prepare("SELECT id FROM photo WHERE souvenir_id = :id");
$statement->bindParam(':id', $id);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$result = $statement->fetchAll();
$photo_name = end($result)['id'] + 1;
$name = $_POST['souvenir_name'];
$main_pic = $_POST['souvenir_pic'];
$name_arm = $_POST['souvenir_name_arm'];
$price = $_POST['souvenir_price'];
if(isset($_POST['souvenir_visible'])){
    $visible = true;
}
else {
    $visible = false;
}
if(isset($_POST['souvenir_featured'])) {
    $featured = true;
}
else {
    $featured = false;
}
$description = $_POST['souvenir_description'];
$description_arm = $_POST['souvenir_description_arm'];


$statement = $db->prepare("SELECT id FROM category WHERE name = :category_name");
$statement->bindParam(':category_name', $_POST['souvenir_category']);
$statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);
$result = $statement->fetch();
$category_id=$result['id'];


if($_POST['souvenir_id'] == '') {
    if ($visible == false) {
        $publish_date = null;
    }
    else {
        $publish_date = date('Y-m-d H:i:s a', time());
    }

    $stmt = $db->prepare("INSERT INTO souvenir(name, description, category_id, price, visible, featured, create_date, publish_date)
                VALUES (:name, :description, :category_id, :price, :visible, :featured, now(), :publish_date)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':visible', $visible);
    $stmt->bindParam(':publish_date', $publish_date);
    $stmt->bindParam(':featured', $featured);
    $stmt->execute();
    $id = $db->lastInsertId();


    $stmt1 = $db -> prepare("UPDATE photo SET souvenir_id = :id, title=:name, src = :src WHERE title = :main_pic");
    $stmt1->bindParam(':id', $id);
    $stmt1->bindParam(':name', $name);
    $stmt1->bindParam(':main_pic', $main_pic);
    $src = '/uploads/souvenirs/'.$id.'/'.$photo_name.".png";
    $stmt1->bindParam(':src', $src);
    $stmt1->execute();
    $pic = $db -> prepare("SELECT id FROM photo WHERE souvenir_id=:id");
    $pic -> bindParam(':id',$id);
    $pic -> execute();
    $pic->setFetchMode(PDO::FETCH_ASSOC);
    $pic_id = $pic->fetch();
    $pic_id=$pic_id['id'];
    mkdir('././uploads/souvenirs/'.$id);
    rename('././uploads/souvenirs/'.$main_pic.'.png', '././uploads/souvenirs/'.$id.'/'.$photo_name.'.png');


    $stmt2 = $db -> prepare("UPDATE souvenir SET main_photo_id = :pic_id WHERE id = :souv_id");
    $stmt2-> bindParam(':pic_id', $pic_id);
    $stmt2-> bindParam(':souv_id', $id);
    $stmt2->execute();
}
else {
    $statement2 = $db->prepare("SELECT publish_date FROM souvenir WHERE id = :id");
    $statement2->bindParam(':id', $_POST['souvenir_id']);
    $statement2->execute();

    $statement2->setFetchMode(PDO::FETCH_ASSOC);
    $result2 = $statement2->fetch();

    if($result2['publish_date'] == null && $visible === true) {
        $publish_date = date('Y-m-d H:i:s', time());
    }
    else {
        $publish_date = null;
    }
    $id = $_POST['souvenir_id'];

    $stmt = $db->prepare("UPDATE souvenir SET name = :name, description = :description, name_arm = :name_arm,
description_arm = :description_arm, category_id = :category_id, price = :price, visible = :visible, featured = :featured,
 publish_date = :publish_date WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':name_arm', $name_arm);
    $stmt->bindParam(':description_arm', $description_arm);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':visible', $visible);
    $stmt->bindParam(':publish_date', $publish_date);
    $stmt->bindParam(':featured', $featured);
    $stmt->bindParam(':id', $_POST['souvenir_id']);
    $stmt->execute();
}


header("Location: souvenir");




 