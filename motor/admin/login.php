<?php
include_once "../classes/auth.php";

use verif\Auth;

if(isset($_POST['submit'])) {
    $auth = new Auth();
    $login = $auth->login($_POST['username'], $_POST['password']);
    if($login) {
        session_start();
        $_SESSION['login'] = true;
        header('Location: menu.php');
    } else {
        echo "Bad username or password";
    }
} else {
    ?>
    <form action="login.php" method="post">
        Username:<br>
        <input type="text" name="username" value="" placeholder="Username"><br>
        Password:<br>
        <input type="password" name="password" value="" placeholder="Password"><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <?php
}
?>
<a href="register.php">Register</a><br>
