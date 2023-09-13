<? 
include("inc.var.php");
$path="http://www.lagranjavilla.com/promociones/";
$host="http://www.lagranjavilla.com/promociones/";
$ruta="/home3/lagranja/public_html/promociones/";

$secretKey="6LceGcAUAAAAALBrZgK7u9HYpCovr6SvgnFcgmPQ";
$responseKey=$_POST['g-recaptcha-response'];
$url="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
$response=file_get_contents($url);
$response=json_decode($response);

if ($response->success) {

    $user = $_POST['user'];
    $sql = "select txt_usuario from tbl_usuarios where txt_usuario='".$_POST['user']."'";
    $post = conn_consulta($sql);  
    if($post){
      $id=0;
    }else{
    $usuarios = new cls_emp_usuarios();
    $usuarios->set_txt_nombre($_POST['nombres']);
    $usuarios->set_txt_apellido($_POST['apellidos']);
    $usuarios->set_txt_fecnac(date("d/m/Y", strtotime($_POST['fechanac'])));
    $usuarios->set_txt_telefono($_POST['fono']);
    $usuarios->set_txt_direccion($_POST['direcc']);
    $usuarios->set_txt_distrito($_POST['distrito']);
    $usuarios->set_txt_email($_POST['email']);
    $usuarios->set_txt_usuario($_POST['user']);
    $usuarios->set_txt_password($_POST['passw']);
    $usuarios->set_id_opc($_POST['rd_promo']);
    $usuarios->set_clientdni($_POST['dni']);
    $id=$usuarios->guarda();
    $promo = array("0"=>"Jovenes","1"=>"familia");
    $from="info@lagranjavilla.com";
    $name="La Granja Villa";
    $to=$_POST['email'];
    $cc="promociones@lagranjavilla.com, atencionalcliente@lagranjavilla.com";     
    $subject=utf8_decode("La Granja Villa Promociones - Nuevo Registro");
    $body="<table width=\"360\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
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
        <td>".date("d/m/Y", strtotime($_POST['fechanac']))."</td>
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
        <td><b>DNI:</b></td>
        <td>".$_POST["dni"]."</td>
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
        <td>".substr($_POST["passw"],0,-3)."***</td>
        <td>&nbsp;</td>
      </tr>
        <tr>
        <td>&nbsp;</td>
        <td><b>Tipo de Cupones:</b></td>
        <td>".$promo[$_POST["rd_promo"]]."</td>
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
        $mail = new phpmailer();
          $mail->PluginDir = $path;
          $mail->Mailer = "mail";
          $mail->Host = $host;
          $mail->From = $from;
          $mail->FromName = $name;
          $mail->Sender = $from;
          $mail->Timeout = 30;
          $mail->AddAddress($to);
          $mail->Subject = $subject;
          $mail->IsHTML(true);
          $mail->Body = $body;
          //$mail->AddAttachment('img/logo.png');
          $mail->AddBCC($cc);
          $exito = $mail->Send();
          $intentos=1;
          while ((!$exito) && ($intentos < 2)) {
              sleep(5);
                  $exito = $mail->Send();
                  $intentos=$intentos+1;  
             }
             if (!$exito){
                  echo "Mailer Error: " . $mail->ErrorInfo;
             } else {
                 echo "Email enviado con exito";
            }
    }
    if ($id){
        header ("location: registro_ok.php");
      }else{
        header ("location: registro_ok.php"); 
      }

}else{
    header("location: registro.php");
}





?>