<?php

global $db;
$name=$_POST['category_name'];
$name_arm=$_POST['category_name_arm'];
if(isset($_POST['category_visible'])) $visible = true;
else $visible = false;
if($_POST['cat_id'] == '')
{
    $sql = "INSERT INTO category(name, name_arm, visible, create_date) VALUES (:name, :name_arm, :visible, now())";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':name_arm', $name_arm);
    $stmt->bindParam(':visible', $visible);
    $stmt->execute();

}
else{
    $id = $_POST['cat_id'];
    $sql = "UPDATE category SET name = :name, name_arm = :name_arm, visible = :visible WHERE id = :cat_id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':name_arm', $name_arm);
    $stmt->bindParam(':visible', $visible);
    $stmt->bindParam(':cat_id', $id);
    $stmt->execute();
}

header("Location: category");




 