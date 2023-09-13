<?php 


function Conectarse()  
{  
$link = mysql_connect('localhost', 'lagranja_gv', '150613$server')
or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('lagranja_gv') or die('No se pudo seleccionar la base de datos');
   return $link;  
}  

?> 
<p> 
<table width="80%"  border="0" align="center"> 
    <tr> 
      <td colspan="2"> 
<? 
$email = @$HTTP_GET_VARS["email"]; 
$link=Conectarse();  

$result=mysql_query("select txt_nombre, txt_apellido, txt_email, txt_usuario, txt_password from tbl_usuarios WHERE txt_email = '$email'",$link); 

if (!$result) { 
      echo("<p>Error al seleccionar tabla: " . mysql_error() . "</p>"); 
      exit(); 
    } 

//Chekeamos si existe el email 
$sql_check_num = mysql_num_rows($result); 
if($sql_check_num == 0){ 
     
echo "<table width='467'><tr><td><font color=ff0000 face=verdana>El e-mail <b >$email</b> no fue encontrado en nuestra base de datos</font></br><center></table><p>"; 
?> 

<form action="lostpassword.php" method="get" name="datos" id="datos"> 
  <table width="50%"  border="0" align="center"> 
    <tr> 
      <td colspan="2" class="Texto">A continuaci&oacute;n escriba su direcci&oacute;n de correo electr&oacute;nico a la cual llegar&aacute; su login y password de nuevo. </td> 
    </tr> 
    <tr> 
      <td width="10%">&nbsp;</td> 
      <td width="90%">&nbsp;</td> 
    </tr> 
    <tr> 
      <td class="Texto">Email:</td> 
      <td><input name="email" type="text" id="email"></td> 
    </tr> 
    <tr> 
      <td>&nbsp;</td> 
      <td>&nbsp;</td> 
    </tr> 
    <tr> 
      <td>&nbsp;</td> 
      <td><input type="submit" name="Submit" value="Enviar"></td> 
    </tr> 
  </table> 
</form> 
<? 
exit(); 
} 

