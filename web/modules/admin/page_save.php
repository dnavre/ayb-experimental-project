<?php

global $db;
$name=$_POST['page_name'];
$content=$_POST['page_content'];
if(isset($_POST['page_visible'])) $visible = true;
else $visible = false;

    $sql = "UPDATE page SET title = :name, visible = :visible, content = :content WHERE id = :page_id";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':page_id', $_POST['page_id']);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':visible', $visible);
    $stmt->execute();

header("Location: page");