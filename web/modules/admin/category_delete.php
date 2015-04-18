<?php

global $db, $error;

$stmt2 = $db->prepare("SELECT name FROM category WHERE id= :cat_id");
$stmt2->bindParam(':cat_id', $_GET['id']);
$stmt2->execute();
$stmt2->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt2->fetch();

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


 