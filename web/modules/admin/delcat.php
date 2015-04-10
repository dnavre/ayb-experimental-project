<?php

global $db;

$sql = "DELETE FROM category WHERE id =  :catid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':catid', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();

header('Location: ?module=admin&action=category');


 