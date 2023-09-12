<?
include("inc.var.php");
$cp = new cls_emp_cuponsel();
$cp->set_id_usuarios($_SESSION["session_socio"]);
$cp->set_id_fotocupon($_GET["idcp"]);
$id=$cp->guarda();
header("location:cupones.php");

?>
