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
if(!$stmt->execute())
{
    $sql_error = $stmt->errorInfo();
    if($sql_error[1] == '1451')
    {
        session_start();
        $_SESSION['sql_error'] = "There is a souvenir which category is ".$result['name'].". First delete that souvenir or change the category!!!";
        header('Location: ?module=admin&action=category');
    }
    else{
        die("Unknown Error!!!");
    }

}

header('Location: ?module=admin&action=category');


 