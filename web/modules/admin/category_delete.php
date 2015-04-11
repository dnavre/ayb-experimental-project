<?php

global $db;

$sql = "DELETE FROM category WHERE id =  :cat_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':cat_id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();

header('Location: ?module=admin&action=category');


 