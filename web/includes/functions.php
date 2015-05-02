<?php
/**
 * Created by PhpStorm.
 * User: yervandaghababyan
 * Date: 12/6/14
 * Time: 10:45 AM
 */
include_once (ROOT . "/includes/imageResizeClass.php");

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

function imageResize($img_src, ImageResizeConfig $irConfig){
    $settings = ["width" => $irConfig->getWidth(), "height" => $irConfig->getHeight(), "transparent" => $irConfig->getTransparent(), "center" => true];
    $img_src_rs = imagecreatefromstring(file_get_contents($img_src));

    $src=array("width"=>imagesx($img_src_rs), "height"=>imagesy($img_src_rs), "ratio"=>0, "newWidth"=>0, "newHeight"=>0, "x"=>0, "y"=>0);
    $src["ratio"]=$src["width"]/$src["height"];

    $dst=array("width"=>0, "height"=>0, "ratio"=>0, "x"=>0, "y"=>0);

    if(isset($settings["width"]) && isset($settings["height"])){
        $dst["width"]=(int)$settings["width"];
        $dst["height"]=(int)$settings["height"];
    }
    elseif(isset($settings["width"])){
        $dst["width"]=(int)$settings["width"];
        $dst["height"]=ceil($dst["width"]/$src["ratio"]);
    }
    elseif(isset($settings["height"])){
        $dst["height"]=(int)$settings["height"];
        $dst["width"]=ceil($dst["height"]*$src["ratio"]);
    }


    if(isset($settings["center"]) && ($settings["center"]==true)){
        $dst["ratio"]=$dst["width"]/$dst["height"];

        if($dst["ratio"]>$src["ratio"]){
            // destination is wider
            //echo "destination is wider\n\n";
            $src["newHeight"]=$dst["height"];
            $src["newWidth"]=$src["newHeight"]*$src["ratio"];
            $dst["x"]=floor(($dst["width"]-$src["newWidth"])/2);
        }
        else if($dst["ratio"]<$src["ratio"]){
            $src["newWidth"]=$dst["width"];
            $src["newHeight"]=$src["newWidth"]/$src["ratio"];
            $dst["y"]=floor(($dst["height"]-$src["newHeight"])/2);
        }
    }



    $img_dst_rs = imagecreatetruecolor($dst["width"], $dst["height"]);

    if($src["newWidth"]>0){$dst["width"]=ceil($src["newWidth"]);}
    if($src["newHeight"]>0){$dst["height"]=ceil($src["newHeight"]);}

    if(isset($settings["transparent"]) && ($settings["transparent"]==true)){
        imagesavealpha($img_dst_rs,true);
        $bg = imagecolorallocatealpha($img_dst_rs, 0, 0, 0, 127);
    }else{
        $bg = imagecolorallocate($img_dst_rs, 255, 255, 255);
    }
    imagefill($img_dst_rs , 0,0 , $bg);


    //imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )
    imagecopyresampled($img_dst_rs, $img_src_rs, $dst["x"], $dst["y"], $src["x"], $src["y"], $dst["width"], $dst["height"], $src["width"], $src["height"]);

    return $img_dst_rs;

}