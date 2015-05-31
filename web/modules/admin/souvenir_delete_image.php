<?php

global $db;

$sql2 = "DELETE FROM photo WHERE id = :id";
$stmt2 = $db->prepare($sql2);
$stmt2->bindParam(':id', $_GET['id']);
$stmt2->execute();

header("Location: souvenir_view_images?id=".$_GET['souvenir_id']);