<?php
include_once "../functions.php";

use main\Produkt;

if(isset($_POST['submit'])) {
    $produktObj = new Produkt();
    $update = $produktObj->updateProduct(
        $_POST['id'],
        $_POST['name'],
        $_POST['image'],
        $_POST['price']
    );
    if($update) {
        header('Location: menu.php?status=2');
    } else {
        echo "Update could not be performed.";
    }
}