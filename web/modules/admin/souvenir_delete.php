<?php

global $db, $error;


$path = '././uploads/souvenirs/'.$_GET['id'];

$sql2 = "DELETE FROM photo WHERE souvenir_id = :souv_id";
$stmt2 = $db->prepare($sql2);
$stmt2->bindParam(':souv_id', $_GET['id']);
$stmt2->execute();

$sql = "DELETE FROM souvenir WHERE id = :souv_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':souv_id', $_GET['id']);
$stmt->execute();

$files = scandir($path);
array_splice($files, 0, 2);
foreach($files as $file){
    unlink($path.'/'.$file);
}
rmdir($path);

header('Location: souvenir');