<?php 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
$sql="UPDATE  `administrador` SET  `tipo` =  '1' " ;
$fila = conn_consulta($sql);
//mysql_query($sql)or die("Error Alter Table : ".mysql_error());


?>