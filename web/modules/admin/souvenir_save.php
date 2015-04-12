<?php

global $db;

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

if($_POST['souvenir_id'] == '')
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
}

header("Location: ?module=admin&action=souvenir");




 