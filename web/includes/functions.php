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

function image_resize($img_src, $settings=array()){
    $img_src_rs = imagecreatefromstring(file_get_contents($img_src));

    $src=array("w"=>imagesx($img_src_rs), "h"=>imagesy($img_src_rs), "ratio"=>0, "w2"=>0, "h2"=>0, "x"=>0, "y"=>0);
    $src["ratio"]=$src["w"]/$src["h"];

    $dst=array("w"=>0, "h"=>0, "ratio"=>0, "x"=>0, "y"=>0);

    if(isset($settings["width"]) && isset($settings["height"])){
        $dst["w"]=(int)$settings["width"];
        $dst["h"]=(int)$settings["height"];
    }
    elseif(isset($settings["width"])){
        $dst["w"]=(int)$settings["width"];
        $dst["h"]=ceil($dst["w"]/$src["ratio"]);
    }
    elseif(isset($settings["height"])){
        $dst["h"]=(int)$settings["height"];
        $dst["w"]=ceil($dst["h"]*$src["ratio"]);
    }


    if(isset($settings["center"]) && ($settings["center"]==true)){
        $dst["ratio"]=$dst["w"]/$dst["h"];

        if($dst["ratio"]>$src["ratio"]){
            // destination is wider
            //echo "destination is wider\n\n";
            $src["h2"]=$dst["h"];
            $src["w2"]=$src["h2"]*$src["ratio"];
            $dst["x"]=floor(($dst["w"]-$src["w2"])/2);
        }
        else if($dst["ratio"]<$src["ratio"]){
            $src["w2"]=$dst["w"];
            $src["h2"]=$src["w2"]/$src["ratio"];
            $dst["y"]=floor(($dst["h"]-$src["h2"])/2);
        }
    }



    $img_dst_rs = imagecreatetruecolor($dst["w"], $dst["h"]);

    if($src["w2"]>0){$dst["w"]=ceil($src["w2"]);}
    if($src["h2"]>0){$dst["h"]=ceil($src["h2"]);}

    if(isset($settings["transparent"]) && ($settings["transparent"]==true)){
        imagesavealpha($img_dst_rs,true);
        $bg = imagecolorallocatealpha($img_dst_rs, 0, 0, 0, 127);
    }else{
        $bg = imagecolorallocate($img_dst_rs, 255, 255, 255);
    }
    imagefill($img_dst_rs , 0,0 , $bg);


    //imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )
    imagecopyresampled($img_dst_rs, $img_src_rs, $dst["x"], $dst["y"], $src["x"], $src["y"], $dst["w"], $dst["h"], $src["w"], $src["h"]);

    return $img_dst_rs;
}