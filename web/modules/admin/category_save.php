<?php

global $db;
$name=$_POST['category_name'];
if(isset($_POST['category_visible'])) $visible = true;
else $visible = false;

if($_POST['cat_id'] == '')
{
    $sql = "INSERT INTO category(c_name, visible, create_date) VALUES (:name, :visible, now())";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':visible', $visible);
    $stmt->execute();
 //   var_dump($stmt ->errorInfo());
}
else{
    $id = $_POST['cat_id'];
    $sql = "UPDATE category SET c_name = :name, visible = :visible WHERE id = :cat_id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':visible', $visible);
    $stmt->bindParam(':cat_id', $id);
    $stmt->execute();
}
header("Location: category");




 