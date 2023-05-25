<?php
include_once "../functions.php";
use main\Produkt;

$imageObj = new Produkt();

$image = $imageObj->getImage();


if(isset($_GET['id'])) {
    $delete = $imageObj->deleteImage($_GET['id']);
    if($delete) {
        unlink('../img/'.$_GET['name']);
        header('Location: menu_img.php');
    } else {
        echo "Error";
    }
} else {
    header('Location: menu_img.php');
}
?>
