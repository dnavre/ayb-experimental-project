<?php


require_once 'includes/globals.php';

global $module, $action;

$defaultModule = 'website';
$defaultAction = 'home';

if(empty($_GET['module'])
    || !checkModuleStr($_GET['module'], $_GET['action'])) {
    $module = $defaultModule;
    $action = $defaultAction;
} else {
    $module = $_GET['module'];
    $action = $_GET['action'];
}

require_once "modules/$module/$action.php";





?>