<?php
include_once "auth_check.php";
include_once "../functions.php";
use main\Produkt;

$produktObj = new Produkt();

$produkt = $produktObj->getProduct();

if(isset($_GET['status']) && $_GET['status'] == 1){
    echo "<strong>Value inserted</strong><br>";
}elseif(isset($_GET['status']) && $_GET['status'] == 2) {
    echo "<strong>Value updated correctly</strong><br>";
} elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo "<strong>Value cannot be updated</strong><br>";
}
include_once "html_menu.php";
?>

<ul>
    <?php
    foreach ($produkt as $produktItem) {
        echo "<li><strong>ID:</strong> ". $produktItem['id'] . ", <strong>Name:</strong> " . $produktItem['name'] .
            ", <strong>Image:</strong> " . $produktItem['img'].", <strong>Price:</strong> " . $produktItem['price'].
            '<a href="delete_prod.php?id='.$produktItem['id'].'">Delete</a> /
             <a href="update_prod_form.php?id='.$produktItem['id'].'">Update</a>
            </li>';
    }
    ?>
</ul>