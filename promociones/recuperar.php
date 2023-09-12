<?php
include 'inc_header.php';
include 'constantes.php';
include 'funciones.php';
include 'config.php';
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="js-no ie9"> <![endif]-->
<!--[if IE 10]> <html lang="en" class="js-no ie10"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<title>La Granja Villa - Promociones</title>
<link rel="shortcut icon" href="assets/img/favicon.ico">
<link rel="stylesheet" href="css/estilos.css">
<link href="https://fonts.googleapis.com/css?family=Slackey&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
<!--<script src="js/function.js" type="text/javascript"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<body>
<?php
if(isset($_POST['button'])){
	if($_POST['mail']){

		$mail = htmlentities($_POST['mail']);

    $link = mysql_connect ($dbhost, $dbusername, $dbuserpass);
        mysql_select_db($dbname,$link);

    $queEmp = "SELECT * FROM tbl_usuarios WHERE txt_email='$mail'";
    $resEmp = mysql_query($queEmp, $link) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    if($totEmp == 0){
    echo '<script language="javascript"> alert("El email ingresado no existe."); </script>';
    echo '<script language="JavaScript"> window.location.href ="http://lagranjavilla.com/promociones1/recuperar.php" </script>';
    exit();
    }

    $message = '<html><body>';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;' ><th>Usuario</th><th>Password</th></tr>";
    while($row=mysql_fetch_array($resEmp)){
    $message .='<tr><td>'.$row['txt_usuario'].'</td><td>'.$row['txt_password'].'</td></tr>';
    }
    $message .= "</table>";
    $message .= "</body></html>";


    $from = "info@lagranjavilla.com";
    $name="La Granja Villa";
    $to = $mail;
    $subject = utf8_decode("La Granja Villa Promociones - Recordar Usuario y Contraseña");
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From:" . $from;

    if (mail($to,$subject,$message, $headers)){
    echo '<script language="javascript"> alert("Se envio a su correo los accesos de su cuenta."); </script>';
    echo '<script language="JavaScript"> window.location.href ="http://lagranjavilla.com/promociones/index.php" </script>';


		// creamos el email



/*"Estimado $nombre la presente es para comunicarle su Login y Password para ingresar al Sistema después de haber extraviado el método de acceso:<br><p>Ud esta registrado en nuestro sistema con los siguientes datos:<br>Usuario: $nombre<br>Password: $contrasena<br></p><p>Recuerde guardar este correo en un lugar seguro dentro de sus archivos personales.</p><p>Para ingresar al Sistema lo puede hacer por los momentos en:</p><p><a href='http://www.lagranjavilla.com'>[url]http://www.lagranjavilla.com[/url]</a></p>Atte:<br></p><p>Andministrador de la Granja Villa<br><a href='mailto:sistemas@lagranjavilla.com'>sistemas@lagranjavilla.com</a><br>Webmaster del Sistema</p>";
$encabezados  = "MIME-Version: 1.0\n";
$encabezados .= "Content-type: text/html; charset=iso-8859-1\n";
$encabezados .= "From: $denombre <$deemail>\n";
$encabezados .= "X-Sender: <$sfrom>\n";
$encabezados .= "BCC: <$sBCC>\n";
$encabezados .= "X-Mailer: PHP\n";
$encabezados .= "X-Priority: 1\n";
$encabezados .= "Return-Path: <$sfrom>\n";*/

		}
	}
}
?>
<style>
      .btn-color{
        background-color: #5a3813;
        color: #fff;
      }

    </style>
<div class="hero-image">
  <div class="container hero-text">
      <div class="container" style="width: 300px; height: 250px;" align="center">
          <p class="text-h2" style="font-size: 28px;">Recuperar Datos de Acceso</p>
          <img src="assets/img/logo.png" class="img-responsive" width="160" height="160">
      </div>
        <div class="container" style="width: 300px; height: 250px; padding-top: 56px;">
        <form id="form1" name="form1" method="post" action="recuperar.php">
          <div class="form-row">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" name="mail" id="mail" class="form-control" placeholder="Ingrese su Email" required>
            </div>
          </div>
          <button type="submit" name="button" id="button" class="btn btn-color btn-block" style="margin-bottom: 7px;">Enviar</button>
        </form>
          <center>
          <a href="index.php" class="btn btn-link" style="color: #5a3813;">Regresar</a>
          </center>
        </div>
  </div>
</div>
<!--<section class="bg-6 bg-center bg-cover  section-fxd">
        <div class="bg-filter">
            <div class="hv-center">
                <div class="sign-up">
                    <div class="sign-up-hr hidden-xs"></div>
                    <div class="row" style="padding-top:15px;">
                        <div class="col-md-4 col-sm-4" align="center">
                                <h2 style="color:#333; margin-top:0px;">Recuperar Datos de Acceso</h2>
                                <img src="assets/img/logo.png" class="img-responsive">
                        </div>
                        <div class="col-md-6 col-sm-6">



            <table width="204" border="0" cellspacing="0" cellpadding="0">
            <form id="form1" name="form1" method="post" action="recuperar.php">
  Ingrese su e-mail<br />
  <input type="text" name="mail" id="mail" style="width:274px;"/>
  <br />
  <br />
<input type="submit" name="button" id="button"/><a href="index.php" style="alignment-adjust:central"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="button2" id="button2" value="Regresar" onclick="window.open('index.php'); window.location.href='http://lagranjavilla.com/promociones/index.php'"></a>

  </form>
  </form>
            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

--><!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
