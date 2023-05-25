<?php
include_once "auth_check.php";
include_once "../functions.php";

use main\Produkt;

$produktObj = new Produkt();

$produktItem = $produktObj->getProductItem($_GET['id']);
include_once "html_menu.php";
?>
<form action="update_prod.php" method="post">
    Name:<br>
    <input type="text" name="name" placeholder="Name" value="<?php echo $produktItem['name']; ?>"><br>
    Image:<br>
    <select name="image">
    <?php
    $images = $produktObj->getImage();
    foreach ($images as $key => $imgItem) {
        echo '<option value="'.$imgItem['imagename'].'">'.$imgItem['imagename'].'</option><br>';
    }?>
    </select><br>
    Path:<br>
    <input type="number" name="price" placeholder="Price" value="<?php echo $produktItem['price']; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $produktItem['id']; ?>">
    <input type="submit" name="submit" value="Update">
</form>