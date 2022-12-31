<?php
    require "connection/connection.php";

    session_start();
    //clear all session variables
    setcookie("pageName", "", time() - 3600);
    setcookie("loginSession", "", time() - 3600);
    session_unset();
    session_destroy();
    session_write_close();
    header("Location: login.php");
