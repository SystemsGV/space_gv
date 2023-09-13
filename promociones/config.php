<?php
$dbhost='localhost'; // Servidor
$dbusername='lagranja_gv'; // Nombre de usuario
$dbuserpass='150613$server'; // Contraseña
$dbname='lagranja_gv'; // Nombre de la base de datos
session_start();

// Comprobamos si hay cookie, si está bien y le asignamos una sesión
// Esto quiere decir que si recordamos la contraseña nos auto loguee.
if(isset($_COOKIE['id_extreme'])) 
{
	$cookie = htmlentities($_COOKIE['id_extreme']);
	$cookie = explode("%",$cookie);
	$user = $cookie[0];
	$id = $cookie[1];
	$ip = $cookie[2];
	if ($HTTP_X_FORWARDED_FOR == "")
	{
		$ip2 = getenv(REMOTE_ADDR);
	}
	else
	{
		$ip2 = getenv(HTTP_X_FORWARDED_FOR);
	}
	if($ip == $ip2)
	{
		$link = mysql_connect($dbhost, $dbusername, $dbuserpass);
		mysql_select_db($dbname,$link) or die('No se puede seleccionar la base de datos');
		$query = mysql_query("SELECT * FROM tbl_usuarios WHERE id_extreme='".$id."' and txt_usuario='".$user."'") or die(mysql_error());
   		$row = mysql_fetch_array($query);
   		if(isset($row['txt_usuario'])) 
		{
		$_SESSION["s_txt_usuario"] = $row['txt_usuario'];
		$_SESSION["logeado"] = "SI";
   		}
		mysql_close($link);
	}
}
?>