<?php

global $db;
$name=$_POST['page_name'];
if(isset($_POST['page_visible'])) $visible = true;
else $visible = false;

if($_POST['page_id'] == '')
{
    $sql = "INSERT INTO page(title, visible, create_date) VALUES (:name, :visible, now())";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':visible', $visible);
    $stmt->execute();

}
else{
    $id = $_POST['page_id'];
    $sql = "UPDATE page SET title = :name, visible = :visible WHERE id = :page_id";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':visible', $visible);
    $stmt->bindParam(':page_id', $id);
    $stmt->execute();
}
header("Location: page");
