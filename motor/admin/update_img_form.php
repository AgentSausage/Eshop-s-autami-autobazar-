<?php
include_once "auth_check.php";
include_once "../functions.php";

use main\Produkt;

$imageObj = new Produkt();

$image = $imageObj->getImageItem(intval($_GET['id']));
include_once "html_menu.php";

if(isset($_POST['submit'])) {

    if(isset($_FILES['file'])) {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = ['jpg', 'jpeg', 'png'];
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 500000) {
                    $name = explode('.', $_POST['nazov']);
                    $fileNameNew = array_shift($name) . "." . $fileActualExt;
                    $fileDestination = '../img/' . $fileNameNew;
                    unlink($fileDestination);
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    echo "File too big.";
                }
            } else {
                echo "Error while uploading";
            }

        } else {
            echo "Cannot upload file of this type.";
        }

    }else{
        rename('./img/'.$image['imagename'],  './img/'.$_POST['nazov']);
    }
    $update = $imageObj->updateImage(
        $_POST['id'],
        $_POST['nazov']
    );
    if ($update) {
        header('Location: menu_img.php');
    } else {
        echo "Update could not be performed.";
    }
}

?>
<form method="POST" action="update_img_form.php?id=<?php echo $image['id']; ?>"  enctype="multipart/form-data">
    Name:<br>
    <input type="text" name="nazov" placeholder="Name" value="<?php echo $image['imagename']; ?>"><br>
    File:<br>
    <input type="file" name="file"><br>
    <input type="hidden" name="id" value="<?php echo $image['id']; ?>">
    <input type="submit" name="submit" value="Update">
</form>