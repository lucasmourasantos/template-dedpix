<?php

//login_success.php  
session_start();
if (isset($_SESSION["usuario"])) {
    echo '<h3>Login Success, Welcome - ' . $_SESSION["usuario"] . '</h3>';
    echo '<br /><br /><a href="logout.php">Logout</a>';
} else {
    header("location: login.php");
}
?>  