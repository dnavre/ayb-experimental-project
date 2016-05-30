
<?php


global $db;
include_once (ROOT . "/includes/imageResizeClass.php");
$irConfig = new ImageResizeConfig();
if(!empty($_POST['souvenir_id'])) {
   $id = $_POST['souvenir_id'];
    $statement = $db->prepare("SELECT id FROM photo WHERE souvenir_id = :id");
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $result = $statement->fetchAll();
    $stmt = $db->prepare("SELECT name FROM souvenir WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $souv_info = $stmt->fetch();
    $name = $souv_info['name'];
    $photo_name_base = end($result)['id'] + 1;
    $slashed_id= $id.'/';
    $redirect = 'souvenir_view_images?id=' . $id. "&";
    }
else{
    $_SESSION['cleanup'] = 1;
    $photo_name_base = time().'_'.rand(100, 999);
    $slashed_id= '';
    $redirect = 'souvenir_edit?';
    $json = "[";
}

if (isset($_FILES['file'])) {
    $image_extension = array("jpg", "jpeg", "png", "JPG");
    for ($a = 0; $a < count($_FILES['file']['name']); $a++) {
        if ($_FILES['file']['error'][0] == 0) {
            $img_name = explode(".", $_FILES['file']['name'][$a]);
            if ($_FILES['file']['size'][$a] < 3000000) {
                if (!file_exists(ROOT . "/uploads/souvenirs/" . $id . "/")) {
                    mkdir(ROOT . "/uploads/souvenirs/" . $id, 0777);
                }
                $irConfig->setHeight(getimagesize(($_FILES['file']['tmp_name'][$a]))[1]);
                $irConfig->setWidth(getimagesize(($_FILES['file']['tmp_name'][$a]))[0]);
                $irConfig->setTransparent(true);
                $thumb = imageResize($_FILES['file']['tmp_name'][$a], $irConfig);
                $photo_name = $photo_name_base.$a;
                imagepng($thumb, ROOT . "/uploads/souvenirs/" . $slashed_id . $photo_name . ".png", 9);
                imagedestroy($thumb);
                $img_final_path = "/uploads/souvenirs/" . $slashed_id . $photo_name . ".png";
                if (!empty($id)) {
                    $stmt3 = $db->prepare("INSERT INTO photo(src, souvenir_id, title) VALUES (:src, :souvenir_id, :title)");
                    $stmt3->bindParam(':souvenir_id', $id);
                    $stmt3->bindParam(':title', $name);
                } else {
                    $json .= "{ \"img_name\": \"$photo_name\", \"img_src\":\"$img_final_path\"},";
                    $stmt3 = $db->prepare("INSERT INTO photo(title, src) VALUES (:photo_name, :src)");
                    $stmt3->bindParam(':photo_name', $photo_name);
                }
                $stmt3->bindParam(':src', $img_final_path);
                $r = $stmt3->execute();
            } else {
                header("Location:" . $redirect . "error_id=" . SS_ERROR_IMAGE_SIZE);
                die();

            }
            if (in_array(end($img_name), $image_extension) && $_FILES['file']['type'][$a] == 'image/jpeg' ||
                $_FILES['file']['type'][$a] == 'image/jpg' || $_FILES['file']['type'][$a] == 'image/png'
            ) {
            } else {
                header("Location:" . $redirect . "error_id=" . SS_ERROR_IMAGE_EXTENSION);
                die();
            }
        } else {
            header("Location:" . $redirect . "error_id=" . SS_ERROR_NO_IMAGE);
            die();
        }
    }
}

    if (!empty($_POST['souvenir_id'])) {
        header("Location:" . $redirect);
    } else {
        $json1 = rtrim($json, ",");
        $json1 .= "]";
        header("Content-type:application/json");
        echo $json1;
    }