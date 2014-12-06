<?php
/**
 * Created by PhpStorm.
 * User: yervandaghababyan
 * Date: 12/6/14
 * Time: 10:45 AM
 */


/**
 * Checks whether $module and $action string can be used as
 * valid module and action for the souvenir shop application
 * @param $module
 * @param $action
 * @return true if valid, false otherwise
 */
function checkModuleStr($module, $action) {

    $InvalidCharacterPattern = '|.*[.\/].*|';

    if(preg_match($InvalidCharacterPattern, $module)
    || preg_match($InvalidCharacterPattern, $action)) {
        return false;
    }

    if(empty($module) || empty($action)) {
        return false;
    }

    return true;
}