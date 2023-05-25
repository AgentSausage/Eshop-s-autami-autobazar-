<?php
include_once "../functions.php";

use main\Produkt;

if(isset($_POST['submit'])) {
    $imageObj = new Produkt();
    $update = $imageObj->updateImage(
        $_POST['id'],
        $_POST['nazov']
    );
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = ['jpg', 'jpeg', 'png'];
        if(in_array($fileActualExt, $allowed)){
            if($fileError===0){
                if($fileSize < 500000){
                    $fileNameNew = $_POST['nazov'].".".$fileActualExt;
                    $fileDestination = '../img/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                }else{
                    echo "File too big.";
                }
            }else{
                echo "Error while uploading";
            }

        }else{
            echo "Cannot upload file of this type.";
        }

    }
    if($update) {
        header('Location: menu_img.php?status=2');
    } else {
        echo "Update could not be performed.";
}