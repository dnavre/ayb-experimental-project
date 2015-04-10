<?php

global $db;

$catName = $_POST['category_name'];
if(!isset($_POST['category_visible'])) $catVisible = false;
else $catVisible = true;

$addcat = ("INSERT INTO category (name, visible, create_date) VALUES (:name, :visible, now())");
$q = $db->prepare($addcat);
$q->execute(array(':name'=>$catName,':visible'=>$catVisible));

header('Location: ?module=admin&action=category');
