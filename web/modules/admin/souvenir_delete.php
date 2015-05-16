<?php

global $db, $error;



$sql2 = "DELETE FROM photo WHERE souvenir_id = :souv_id";
$stmt2 = $db->prepare($sql2);
$stmt2->bindParam(':souv_id', $_GET['id']);
$stmt2->execute();

$sql = "DELETE FROM souvenir WHERE id = :souv_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':souv_id', $_GET['id']);
$stmt->execute();
$sql_error = $stmt->errorInfo();
if($sql_error[1] == '1451')
{
    header('Location: ?module=admin&action=souvenir&error_id=' . SS_ERROR_IMAGE_IN_SOUVENIR);
    die();
}

header('Location: ?module=admin&action=souvenir');