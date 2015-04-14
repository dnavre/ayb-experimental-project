<?php

global $db;
session_start();

$name = $_POST['souvenir_name'];
$price = $_POST['souvenir_price'];
if(isset($_POST['souvenir_visible'])) $visible = true;
else $visible = false;
if(isset($_POST['souvenir_featured'])) $featured = true;
else $featured = false;
$description = $_POST['souvenir_description'];

$statement = $db->prepare("SELECT id FROM category WHERE name = :category_name");
$statement->bindParam(':category_name', $_POST['souvenir_category']);
$statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);
$result = $statement->fetch();
$category_id=$result['id'];

if($_FILES['main_img']['name'] != '') {
    if($_FILES['main_img']['error'] == 0){
        $image_extension = array("jpg", "jpeg", "png");
        $img_name = $_FILES['main_img']['name'];
        $img_name = explode(".", $img_name);
        $img_path = ROOT."/images/souvenir/";
        if(!file_exists(ROOT."images/souvenir/".$name."/")){
            mkdir($img_path.$name, 0777);
        }
        if(end($img_name) == $image_extension[0] || end($img_name) == $image_extension[1] || end($img_name) == $image_extension[2] && $_FILES['main_img']['type'] == 'image/jpeg' || $_FILES['main_img']['type'] == 'image/jpg' || $_FILES['main_img']['type'] == 'image/png'){
            if($_FILES['main_img']['size'] < 100000){
                $final_img_path = $img_path.$name."/".$_FILES['main_img']['name'];
                move_uploaded_file($_FILES['main_img']['tmp_name'], $final_img_path);
            }
            else {
                $_SESSION['error'] = "Your Image is Too Big!!!";
                if ($_POST['souvenir_id'] == '') {
                    header("Location: ?module=admin&action=souvenir_edit");
                }
                else {
                    header("Location: ?module=admin&action=souvenir_edit&id=".$_POST['souvenir_id']);
                }
            }
        }
        else{
            echo $_SESSION['error'] = "You Need to Chose only image files!!!";
            if ($_POST['souvenir_id'] == '') {
                header("Location: ?module=admin&action=souvenir_edit");
            }
            else {
                header("Location: ?module=admin&action=souvenir_edit&id=".$_POST['souvenir_id']);
            }
        }
    }
    else{
        echo $_SESSION['error'] = "Failed To Upload Image!!!";
        if ($_POST['souvenir_id'] == '') {
            header("Location: ?module=admin&action=souvenir_edit");
        }
        else {
            header("Location: ?module=admin&action=souvenir_edit&id=".$_POST['souvenir_id']);
        }
    }
}
/*if($_POST['souvenir_id'] == '')
{
    if($visible==false) $publish_date='';
    else $publish_date = date('Y-m-d H:i:s a', time());
    $stmt = $db->prepare( "INSERT INTO souvenir(name, description, category_id, price, visible, featured, create_date, publish_date) VALUES (:name, :description, :category_id, :price, :visible, :featured, now(), :publish_date)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':visible', $visible);
    $stmt->bindParam(':publish_date', $publish_date);
    $stmt->bindParam(':featured', $featured);
    $stmt->execute();

}
else {
    $statement2 = $db->prepare("SELECT publish_date FROM souvenir WHERE id = :id");
    $statement2->bindParam(':id', $_POST['souvenir_id']);
    $statement2->execute();

    $statement2->setFetchMode(PDO::FETCH_ASSOC);
    $result2 = $statement2->fetch();

    if($result2['publish_date'] == '0000-00-00 00:00:00' && $visible == true) $publish_date = date('Y-m-d H:i:s a', time());
    else $publish_date = '';

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
}*/

//header("Location: ?module=admin&action=souvenir");




 