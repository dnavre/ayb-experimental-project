<?php

global $db;

$sql = "UPDATE souvenir SET main_photo_id = :photo_id WHERE id = :id";

$stmt = $db->prepare($sql);

$stmt->bindParam(':photo_id', $_GET['id']);
$stmt->bindParam(':id', $_GET['souvenir_id']);
$stmt->execute();

header("Location: souvenir_edit?id=".$_GET['souvenir_id']);