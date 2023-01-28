<?php
    session_start();
    if(!isset($_SESSION["full_name"])) {
        header("Location: login.php");
        exit();
    }
?>