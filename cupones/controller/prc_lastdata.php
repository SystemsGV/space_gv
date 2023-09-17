<?php
include '../admin/includes/inc_header.php';
include '../admin/includes/constantes.php';
include '../admin/includes/funciones.php';
include '../admin/includes/inc_login_cliente.php';
include '../admin/clases/cls_emp_cliente.php';
include '../admin/clases/cls_emp_foto2.php';

$idCustomer = $_SESSION['session_cliente']; /*Id de cliente logeado*/

$cliente  = new cls_emp_cliente();
$cliente->cls_emp_cliente($idCustomer);

/* instance object cupon */
$cupon = new cls_emp_foto();

$activity = $cliente->get_txt_nombre2() - $cupon->getCountCuponUser($idCustomer);
$cupom    = $cupon->getCountCuponUser($idCustomer);

echo ($activity.",".$cupom);
