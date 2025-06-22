<?php
require './connection.php';

$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];

if (!empty($title) && !empty($description) && !empty($date)) {

    //image uploading part
    $uploadedImages = array();
    if (!empty($_FILES['images']['name'][0])) {
        $totalImages = count($_FILES['images']['name']);

        for ($i = 0; $i < $totalImages; $i++) {
            $tempFilePath = $_FILES['images']['tmp_name'][$i];
            $newFileName = uniqid('userimage_');
            $targetFilePath = './uploads/' . $newFileName;

            if (move_uploaded_file($tempFilePath, $targetFilePath)) {
                $uploadedImages[] = $targetFilePath;
            }

            Database::iud("INSERT INTO `admin_experience` (`title`, `description`, `date`, `Photo`)
                    VALUES 
                    ('" . $title . "', '" . $description . "' , '" . $date . "', '" . $newFileName . "');");
        }
    }
}

?>