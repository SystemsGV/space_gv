<?php
include("../includes/inc_header.php");
include("../includes/inc_login.php");
include("../includes/constantes.php");
include("../includes/funciones.php");
include("../includes/fc_global.php");
include_once "../clases/cls_emp_foto2.php";
if($_POST){
    $id = $_POST["id"];
    $cupon = new cls_emp_foto();
    $cupon->statusUpdate($id);
    $cupon->cls_emp_foto($id);
    echo trim($cupon->get_int_stado());
}

