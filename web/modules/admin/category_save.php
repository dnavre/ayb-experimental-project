<?php

global $db;
$name=$_POST['category_name'];
var_dump($_POST);
if(isset($_POST['category_visible'])) $visible = true;
else $visible = false;
if($_POST['cat_id'] == '')
{
    echo "if case";
    $sql = "INSERT INTO category(name, visible, create_date) VALUES (:name, :visible, now())";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':visible', $visible);
    $stmt->execute();
}
else{
    echo "else case";
    $id = $_POST['cat_id'];
    $sql = "UPDATE category SET name = :name, visible = :visible WHERE id = :cat_id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':visible', $visible);
    $stmt->bindParam(':cat_id', $id);
    $stmt->execute();
}

//header("Location: category");




 