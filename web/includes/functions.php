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
function checkModuleStr($str) {

    $InvalidCharacterPattern = '|.*[.\/].*|';

    if(preg_match($InvalidCharacterPattern, $str)) {
        return false;
    }

    if(empty($str)) {
        return false;
    }

    return true;
}