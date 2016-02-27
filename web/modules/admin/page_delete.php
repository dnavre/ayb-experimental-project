<?php
global $db, $error;



$sql2 = "DELETE FROM page WHERE id = :page_id";
$stmt2 = $db->prepare($sql2);
$stmt2->bindParam(':page_id', $_GET['id']);
$stmt2->execute();

header('Location: page');
?>