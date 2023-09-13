//<?php
//
//include 'inc_header.php';
//include 'constantes.php';
//include 'funciones.php';
//
//define("DB_SERVER",'localhost');
//define("DB_NAME",'lagranja_gv');
//define("DB_USER",'lagranja_gv');
//define("DB_PASS",'150613$server');
//define('DB_ENGINE','mysql');
//define('DB_CHAR','utf8');
//
//msgbox('Existe la conexion');





function ClavePerdida(){
$db= new Conexion();
$sql = $db->query("Select txt_email from tbl_usuarios where txt_email='this->email';");
$existe = $db->recorrer($sql);
if(strtolower($existe['email'])==strtolower($this->email))
{
mail($this->email,"Estimado usuario hemos enviado su contraeña");
#Enviamos al correo del usuario la contraseña
}else{
$existe=msgbox('El Correo no se ha encontrado');
header('location:http://lagranjavilla.com/promociones/recuperar.php');

}
}

?>
	
//<?php
//// Conectando, seleccionando la base de datos
//$link = mysql_connect('localhost', 'lagranja_gv', '150613$server')
//    or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
//mysql_select_db('lagranja_gv') or die('No se pudo seleccionar la base de datos');
//
//// Realizar una consulta MySQL
//$query = 'Select txt_email from tbl_usuarios where txt_email';
//$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
//
//// Imprimir los resultados en HTML
//echo "<table>\n";
//while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
//    echo "\t<tr>\n";
//    foreach ($line as $col_value) {
//        echo "\t\t<td>$col_value</td>\n";
//    }
//    echo "\t</tr>\n";
//}
//echo "</table>\n";
//






/*
// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>
*/