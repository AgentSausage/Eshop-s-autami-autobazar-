<?php
include_once "../functions.php";
use main\Produkt;

$produktObj = new Produkt();

$produkt = $produktObj->getProduct();


if(isset($_GET['id'])) {
    $delete = $produktObj->deleteProduct($_GET['id']);
    if($delete) {
        header('Location: menu.php');
    } else {
        echo "Error";
    }
} else {
    header('Location: menu.php');
}
?>
