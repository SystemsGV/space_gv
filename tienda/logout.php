<?php
include "inc.var.php";
unset($_SESSION["sess_cart"]);
session_destroy();
header("location: index.php");
