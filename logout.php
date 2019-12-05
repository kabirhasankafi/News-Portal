<?php
    session_start();
    unset($_SESSION["ID"]);
    unset($_SESSION["Username"]);
    unset($_SESSION["Email"]);
    unset($_SESSION["UserType"]);

    header('Location: index.php');
?>