<?php
include_once "auth_check.php";
include_once "../functions.php";
use main\Produkt;

$imageObj = new Produkt();

$image = $imageObj->getImage();
include_once "html_menu.php";
?>

<ul>
    <?php
    foreach ($image as $imageItem) {
        echo "<li><strong>ID:</strong> ". $imageItem['id'] . ", <strong>Name:</strong> " . $imageItem['imagename'] .
            ", <strong>Image:</strong>,<img src='../img/".$imageItem['imagename']."' alt='Image' width='200' height='140'>".
            '<a href="delete_img.php?id='.$imageItem['id'].'&name='.$imageItem['imagename'].'">Delete</a> /
             <a href="update_img_form.php?id='.$imageItem['id'].'">Update</a>
            </li>';
    }
    ?>
</ul>
