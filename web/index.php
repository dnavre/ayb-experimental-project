<?php
require_once 'includes/globals.php';
$db = new PDO('mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_35e1d9aab0e6b9c', $db_username, $db_password);
$defaultModule = 'website';
$defaultAction = 'home';
$defaultId = '';

if(isset($_GET['module'])) {
    $module = $_GET['module'];
}
else $module = $defaultModule;

if(isset($_GET['action'])) {
    $url = explode("/", $_GET['action']);
    $action = $url[0];
    if(isset($url[2])) {
        $id = $url[2];
    }
    else{
        $id = "";
    }
}
if (!isset($action)) {
    $action = $defaultAction;
    $id = $defaultId;
}

if(file_exists("modules/$module/$action.php")) {
    require_once "modules/$module/$action.php";
}
else{
    require_once "404.html";
}

?>