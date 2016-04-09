<?php

global $db;
$name=$_POST['page_name'];
$name_arm=$_POST['page_name_arm'];
$content=$_POST['page_content'];
$content_arm=$_POST['page_content_arm'];
if(isset($_POST['page_visible'])) $visible = true;
else $visible = false;

    $sql = "UPDATE page SET title = :name, title_arm = :name_arm, content_arm = :content_arm, content = :content WHERE id = :page_id";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':name_arm', $name_arm);
    $stmt->bindParam(':page_id', $_POST['page_id']);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':content_arm', $content_arm);
    $stmt->execute();

header("Location: page");