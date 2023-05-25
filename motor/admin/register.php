<?php
include_once "../classes/auth.php";

use verif\Auth;

if(isset($_POST['submit'])) {
    $auth = new Auth();
    $register = $auth->register($_POST['username'], $_POST['password']);
    if($register) {
        header('Location: login.php');
    } else {
        echo "Username already in use";
    }
} else {
    ?>
    <form action="register.php" method="post">
        Username:<br>
        <input type="text" name="username" value="" placeholder="Username"><br>
        Password:<br>
        <input type="password" name="password" value="" placeholder="Password"><br>
        <input type="submit" name="submit" value="Register">
    </form>
    <?php
}
?>