<?php   
// Que no se nos olvide incluir nuestro fichero con la conexion a la base de datos.  
include("constantes.php");  
$nick=$_REQUEST['email'];  
$sql="SELECT txt_email FROM tbl_usuarios WHERE txt_email='$email'";  
$res=mysql_query($sql);  
$total=mysql_num_rows($res);  
if($total>0)  
{   
  // El usuario existe en la Base de Datos  
  echo "Este email está ocupado";  
}  
else  
{  
  // Ese nick esta libre  
  echo "Email esta libre";  
}  
?>  