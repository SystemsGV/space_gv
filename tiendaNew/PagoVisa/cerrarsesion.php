<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
session_start();
session_destroy();
session_unset();

//Redirecciona a la página de login
    header('location: ../index.php');
?>