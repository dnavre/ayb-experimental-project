<?php

global $db, $error;

$sql = "DELETE FROM category WHERE id = :cat_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':cat_id', $_GET['id']);
$stmt->execute();
    $sql_error = $stmt->errorInfo();
    if($sql_error[1] == '1451')
    {
        header('Location: ?module=admin&action=category&error_id=' . SS_ERROR_SOUVENIRS_IN_CATEGORY);
        die();
    }

header('Location: ?module=admin&action=category');


 