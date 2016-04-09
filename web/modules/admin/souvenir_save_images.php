<?php


global $db;

include_once (ROOT . "/includes/imageResizeClass.php");
$irConfig = new ImageResizeConfig();

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
$photo_name = end($result)['id']+1;
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $image_extension = array("jpg", "jpeg", "png", "JPG");
    $img_name = explode(".", $_FILES['file']['name']);
    if (in_array(end($img_name), $image_extension) && $_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/jpg' || $_FILES['file']['type'] == 'image/png') {
        if ($_FILES['file']['size'] < 3000000) {
            if (!file_exists(ROOT . "/uploads/souvenirs/" . $id . "/")) {
                mkdir(ROOT . "/uploads/souvenirs/" . $id, 0777);
            }
            $irConfig->setHeight(getimagesize(($_FILES['file']['tmp_name']))[1]);
            $irConfig->setWidth(getimagesize(($_FILES['file']['tmp_name']))[0]);
            $irConfig->setTransparent(true);
            $thumb = imageResize($_FILES['file']['tmp_name'], $irConfig);
            imagepng($thumb, ROOT . "/uploads/souvenirs/" . $id . "/". $photo_name .".png", 9);
            imagedestroy($thumb);
            $img_final_path = "/uploads/souvenirs/" . $id . "/". $photo_name .".png";
            $stmt3 = $db->prepare("INSERT INTO photo(src, souvenir_id, title) VALUES (:src, :souvenir_id, :title)");
            $stmt3->bindParam(':src', $img_final_path);
            $stmt3->bindParam(':souvenir_id', $id);
            $stmt3->bindParam(':title', $name);
            $r = $stmt3->execute();
        } else {
            header("Location: souvenir_view_images?id=" . $id . "&error_id=" . SS_ERROR_IMAGE_SIZE);
            die();

        }
    } else {
        header("Location: souvenir_view_images?id=" . $id . "&error_id=" . SS_ERROR_IMAGE_EXTENSION);
        die();
    }
} else {
    header("Location: souvenir_view_images?id=" . $id . "&error_id=" . SS_ERROR_IMAGE_EXTENSION);
    die();
}

header("Location: souvenir_view_images?id=" . $id);