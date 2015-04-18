<?php

global $db;

if($_SERVER['CONTENT_LENGTH'] > 3000000){
    header("Location: ?module=admin&error_id=" . SS_ERROR_IMAGE_SIZE);
    die();
}

$name = $_POST['souvenir_name'];
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

$statement = $db->prepare("SELECT id FROM category WHERE name = :category_name");
$statement->bindParam(':category_name', $_POST['souvenir_category']);
$statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);
$result = $statement->fetch();
$category_id=$result['id'];


if($_POST['souvenir_id'] == '') {
    if ($visible == false) {
        $publish_date = null;
    } else {
        $publish_date = date('Y-m-d H:i:s a', time());
    }

    $stmt = $db->prepare("INSERT INTO souvenir(name, description, category_id, price, visible, featured, create_date, publish_date) VALUES (:name, :description, :category_id, :price, :visible, :featured, now(), :publish_date)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':visible', $visible);
    $stmt->bindParam(':publish_date', $publish_date);
    $stmt->bindParam(':featured', $featured);
    $stmt->execute();
    $id = $db->lastInsertId();
} else {
    $statement2 = $db->prepare("SELECT publish_date FROM souvenir WHERE id = :id");
    $statement2->bindParam(':id', $_POST['souvenir_id']);
    $statement2->execute();

    $statement2->setFetchMode(PDO::FETCH_ASSOC);
    $result2 = $statement2->fetch();

    if($result2['publish_date'] == null && $visible === true) {
        $publish_date = date('Y-m-d H:i:s a', time());
    }
    else {
        $publish_date = null;
    }
    $id = $_POST['souvenir_id'];

    $stmt = $db->prepare("UPDATE souvenir SET name = :name, description = :description, category_id = :category_id, price = :price, visible = :visible, featured = :featured, publish_date = :publish_date WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':visible', $visible);
    $stmt->bindParam(':publish_date', $publish_date);
    $stmt->bindParam(':featured', $featured);
    $stmt->bindParam(':id', $_POST['souvenir_id']);
    $stmt->execute();
}




if($_FILES['main_img']['name'] != '') {
    if($_FILES['main_img']['error'] == 0){
        $image_extension = array("jpg", "jpeg", "png");
        $img_name = $_FILES['main_img']['name'];
        $img_name = explode(".", $img_name);

        if(end($img_name) == $image_extension[0] || end($img_name) == $image_extension[1] || end($img_name) == $image_extension[2] && $_FILES['main_img']['type'] == 'image/jpeg' || $_FILES['main_img']['type'] == 'image/jpg' || $_FILES['main_img']['type'] == 'image/png'){
            if($_FILES['main_img']['size'] < 2000000){
                if(!file_exists(ROOT."/uploads/souvenirs/".$id."/") && isset($_FILES['main_img']['name'])){
                    mkdir(ROOT."/uploads/souvenirs/".$id, 0777);
                }
                $img_final_path = ROOT."/uploads/souvenirs/".$id."/real.jpg";
                move_uploaded_file($_FILES['main_img']['tmp_name'], $img_final_path);
                $stmt3 = $db->prepare("INSERT INTO photo(src, souvenir_id, title) VALUES (:src, :souvenir_id, :title)");
                $stmt3->bindParam(':src', $img_final_path);
                $stmt3->bindParam(':souvenir_id', $id);
                $stmt3->bindParam(':title', $name);
                $r = $stmt3->execute();
                $id_photo = $db->lastInsertId();
                $statement3 = $db->prepare('UPDATE souvenir SET main_photo_id = :photo_id WHERE id = :souvenir_id');
                $statement3->bindParam(':photo_id', $id_photo);
                $statement3->bindParam(':souvenir_id', $id);
                $statement3->execute();
            }
            else {
                header("Location: ?module=admin&action=souvenir_edit&id=" . $id . "&error_id=" . SS_ERROR_IMAGE_SIZE);
                die();

            }
        }
        else{
            header("Location: ?module=admin&action=souvenir_edit&id=". $id ."&error_id=" . SS_ERROR_IMAGE_EXTENSION);
            die();
        }
    }
    else{
        header("Location: ?module=admin&action=souvenir_edit&id=". $id ."&error_id=" . SS_ERROR_IMAGE_EXTENSION);
    }
}

header("Location: ?module=admin&action=souvenir");




 