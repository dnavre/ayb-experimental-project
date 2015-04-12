<?php

global $db;

$sql = "DELETE FROM category WHERE id = :cat_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':cat_id', $_GET['id']);
if(!$stmt->execute())
{
    $error = $stmt->errorInfo();
    if($error[1] == '1451')
    {
        echo "There is a souvenir which category is this one. First delete that souvenir or change the category!!! <br />";
        echo "<a href='?module=admin&action=souvenir'>Return to Admin Panel</a>";
        die();
    }
    else{
        die("Unknown Error!!!");
    }

}

header('Location: ?module=admin&action=category');


 