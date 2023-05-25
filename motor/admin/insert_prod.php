<?php
include_once "auth_check.php";
include_once "../functions.php";

use main\Produkt;

$produktObj = new Produkt();
if(isset($_POST["submit"])){
$insert = $produktObj->insertProduct($_POST['name'], $_POST['image'], $_POST['price']);
if($insert){
    header('Location: menu.php?status=1');
}else{
    echo "<strong>Unable to insert values</strong><br>";
}
}
include_once "html_menu.php";
?>

<body>
<form class = "" action ="" method = "post">
    Name:<br>
    <input type="text" name="name" placeholder="Name" value=""><br>
    Image:<br>
    <select id="list" name="image">
    <?php
    $images = $produktObj->getImage();
    foreach ($images as $key => $imgItem) {
    echo '<option value="'.$imgItem['imagename'].'">'.$imgItem['imagename'].'</option><br>';
    }?>
    </select><br>
    Price:<br>
    <input type="number" name="price" placeholder="Price" value=""><br>
    <input type="submit" name="submit" value="Insert">
</form>
</body>
