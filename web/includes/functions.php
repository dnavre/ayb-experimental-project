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


function deleteDirectory($dirPath)
{
    if (is_dir($dirPath)) {
        $objects = scandir($dirPath);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dirPath . DIRECTORY_SEPARATOR . $object) == "dir") {
                    deleteDirectory($dirPath . DIRECTORY_SEPARATOR . $object);
                } else {
                    unlink($dirPath . DIRECTORY_SEPARATOR . $object);
                }
            }
        }
        reset($objects);
        rmdir($dirPath);
    }
}