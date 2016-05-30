<?php
global $db;

if(isset($_SESSION['cleanup'])) {
    $files = scandir('uploads/souvenirs');
    foreach($files as $file){
        if(preg_match('/(.*?)\.png/',$file) == 1) unlink('uploads/souvenirs/'.$file);
        $filename= rtrim($file,'.png');
    }
    $stmt = $db -> prepare("DELETE FROM photo WHERE souvenir_id is NULL");
    $stmt -> execute();
    session_unset();
}