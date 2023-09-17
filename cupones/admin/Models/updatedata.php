<?php 
 
$db = new mysqli('localhost', 'lagranja_cupon', '*g?N{enxyM*(', 'lagranja_cupon');

/*
 * Esta es la forma OO "oficial" de hacerlo,
 * AUNQUE $connect_error estaba averiado hasta PHP 5.2.9 y 5.3.0.
 */

$db->set_charset('utf8');

if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

?>