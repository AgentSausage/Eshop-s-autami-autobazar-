<?php
include_once "auth_check.php";
include_once "../functions.php";

use main\Produkt;

$produktObj = new Produkt();

$produktItem = $produktObj->getProductItem($_GET['id']);

?>
<form action="update_prod.php" method="post">
    System name:<br>
    <input type="text" name="name" placeholder="Name" value="<?php echo $produktItem['name']; ?>"><br>
    User name:<br>
    <input type="text" name="image" placeholder="Image" value="<?php echo $produktItem['img']; ?>"><br>
    Path:<br>
    <input type="number" name="price" placeholder="Price" value="<?php echo $produktItem['price']; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $produktItem['id']; ?>">
    <input type="submit" name="submit" value="Update">
</form>