<?php

global $db;

if(isset($_GET['id'])) {
    $sql1 = $db -> prepare("SELECT src FROM photo WHERE id = :id");
    $sql1 -> bindParam(':id', $_GET['id']);
    $sql1 -> execute();
    $sql1->setFetchMode(PDO::FETCH_ASSOC);
    $src= $sql1->fetch();
    $sq2 = "DELETE FROM photo WHERE id = :id";
    $stmt2 = $db->prepare($sq2);
    $stmt2->bindParam(':id', $_GET['id']);
    $stmt2->execute();
    $a = unlink('./.'.$src['src']);
    if($a == True) header("Location: souvenir_edit?id=".$_GET['souvenir_id']);
}
else if(isset($_POST['img_src'])){
    $sql2 = "DELETE FROM photo WHERE title = :title";
    $stmt2 = $db->prepare($sql2);
    $stmt2->bindParam(':title', $_POST['img_src']);
    $stmt2->execute();
    unlink('uploads/souvenirs/'.$_POST['img_src'].'.png');
}
else echo 'null';