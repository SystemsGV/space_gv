<?php
    
	include 'inc_header.php';
include 'constantes.php';
include 'funciones.php';

define("DB_SERVER",'localhost');
define("DB_NAME",'lagranja_gv');
define("DB_USER",'lagranja_gv');
define("DB_PASS",'150613$server');
	
function ClavePerdida(){
$db= new Conexion();
$sql = $db->query("Select txt_email from lagranja_gv where txt_email='this->email';");
$existe = $db->recorrer($sql);
if(strtolower($existe['email'])==strtolower($this->email))
{
mail($this->email,"Estimado usuario hemos enviado su contraeña");
#Enviamos al correo del usuario la contraseña
}else{
header('location:http://dinopark.com.pe/promocionesdino/recuperar.php');
}
}

?>
	
