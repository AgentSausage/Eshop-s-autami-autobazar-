<?php
include_once "../functions.php";
include_once "html_menu.php";
use main\Produkt;
if(isset($_POST['submit'])){
    $produktObj = new Produkt;
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
                $insert = $produktObj->insertImage($fileNameNew);
                if($insert){
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo "Upload success";
                }else{
                    echo "Upload not successful";
                }
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
?>
<form method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="file"><br>
    Name:<br>
    <input type="text" name="nazov" placeholder="Name"><br>
    <input type="submit" name="submit" value="Upload"><br>
</form>
