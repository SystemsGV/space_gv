<? 
include("inc.var.php");
$usuarios = new cls_emp_usuarios();
$usuarios->set_txt_nombre($_POST['nombres']);
$usuarios->set_txt_apellido($_POST['apellidos']);
$usuarios->set_txt_fecnac($_POST['fechanac']);
$usuarios->set_txt_telefono($_POST['fono']);
$usuarios->set_txt_direccion($_POST['direcc']);
$usuarios->set_txt_distrito($_POST['distrito']);
$usuarios->set_txt_email($_POST['email']);
$usuarios->set_txt_usuario($_POST['user']);
$usuarios->set_txt_password($_POST['passw']);
$id=$usuarios->guarda();
$name=$_POST["nombres"]." ".$_POST["apellidos"];//"La Granja Villa";
$bcc="sistemas.st@lagranjavilla.com, $mail";
$mail=$_POST["email"];//"info@lagranjavilla.com";
$to="marketingpg@lagranjavilla.com";
$subject="La Granja Villa Promociones - Nuevo Registro ";
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$headers .= "From: $name <$mail>\r\n"; 
$headers .= "Reply-To: $mail\r\n"; 
$headers .= "Return-path: $mail\r\n"; 
//$headers .= "Cc: $mail\r\n"; 
$headers .= "Bcc: $bcc\r\n";
$cuerpo="
<table width=\"360\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td colspan='4'><b>REGISTRO DE USUARIOS</b><br><br>Nuevo registro de usuarios con los siguientes datos:</td>
  </tr>
  <tr>
    <td colspan='4' height=10></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><b>Nombres:</b></td>
    <td>".$_POST["nombres"]."</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><b>Apellidos:</b></td>
    <td>".$_POST["apellidos"]."</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><b>Fecha Nacimiento:</b></td>
    <td>".$_POST["fechanac"]."</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><b>Telefono:</b></td>
    <td>".$_POST["fono"]."</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><b>Direccion:</b></td>
    <td>".$_POST["direcc"]."</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><b>Distrito:</b></td>
    <td>".$_POST["distrito"]."</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><b>Email:</b></td>
    <td>".$_POST["email"]."</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><b>Usuario:</b></td>
    <td>".$_POST["user"]."</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><b>Password:</b></td>
    <td>".$_POST["passw"]."</td>
    <td>&nbsp;</td>
  </tr>
    
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> 
</table>
";
$ok=mail($to,$subject,$cuerpo,$headers);
if($ok)
echo "Email enviado con exito";
else
echo "Error al eviar Email";

if ($id){
		header ("location: registro_ok1.php"); 
	}else{
		header ("location: registro_ok1.php"); 
	}



?>