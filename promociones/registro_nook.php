<?php
include 'inc_header.php';
include 'constantes.php';
include 'funciones.php';
?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">-->
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<title>La Granja Villa - Promociones</title>
<link rel="shortcut icon" href="assets/img/favicon.ico">
<link rel="stylesheet" href="css/estilos.css">
<link href="https://fonts.googleapis.com/css?family=Slackey&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
<!--<script src="js/function.js" type="text/javascript"></script>-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style type="text/css">

<!--
.Estilo1 {
	color: #6d4f79;
	font-weight: bold;
}

.btn-color{
        background-color: #5a3813;
        color: #fff;
      }
-->
</style>
</head>
<body>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Registro Fallido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¡Error!</p>
        <p>El Dni o Usuario ya se encuentran registrados.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-color" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script>
$( document ).ready(function() {
    $('#myModal').modal('show');
});
</script>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" >     
	<div class="container">
		<a class="navbar-brand" href="#">
		<img src="assets/img/logo.png" width="75" height="75" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.php">SALIR</a>
				</li>
			</ul>
		</ul>
	</div>
	</div>
</nav>
<div class="container centrar td-border">
  <p align="center" class="text-h1" style="background-color: #5a3813; margin-bottom: 20px;">Registro de Usuarios</p>
  <form name="frm1" action="" method="post" class="needs-validation" novalidate>
    <div class="form-row">
      <div class="form-group col-md-6 txt_verde14">
        <label for="inputEmail4">Nombres:</label>
        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
      </div>
      <div class="form-group col-md-6 txt_verde14">
        <label for="inputPassword4">Apellidos:</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 txt_verde14">
        <label for="inputEmail4">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" id="fechanac" name="fechanac" placeholder="Fecha de Nacimiento" required>
      </div>
      <div class="form-group col-md-6 mb-3 txt_verde14">
        <label for="fono">Teléfono:</label>
        <input type="number" class="form-control" id="fono" name="fono" placeholder="Teléfono" min="900000000" max="999999999" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 txt_verde14">
        <label for="inputEmail4">Dirección:</label>
        <input type="text" class="form-control" id="direcc" name="direcc" placeholder="Dirección" required>
      </div>
      <div class="form-group col-md-6 txt_verde14">
        <label for="inputPassword4">Distrito:</label>
        <input type="text" class="form-control" id="distrito" name="distrito" placeholder="Distrito" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 txt_verde14">
        <label for="inputEmail4">E-mail:</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" pattern="\S+" required>
      </div>
      <div class="form-group col-md-6 txt_verde14">
        <label for="inputPassword4">DNI / Carné de Extranjería:</label>
        <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI / Carné de Extranjería" pattern="[0-9]+" minlength="8" maxlength="9" required>
      </div>
    </div>
    <p class="text-monospace txt_verde14" style="font-size: 18px">Crea tu usuario y contraseña <img src="iconos/tooltip.png" height="35" data-toggle="tooltip" data-placement="right" title="Registre un usuario y una contraseña para ingresar a nuestras ¡Promociones!"></span></p>
    <div class="form-row">
      <div class="form-group col-md-6 txt_verde14">
        <label for="inputEmail4">Usuario:</label>
        <input type="text" class="form-control" name="user" id="user" placeholder="Usuario" required>
      </div>
      <div class="form-group col-md-6 txt_verde14">
        <label for="inputPassword4">Contraseña:</label>
        <input type="password" class="form-control" id="passw" name="passw" placeholder="Contraseña" required>
      </div>
    </div>
    <input type="hidden" name="check1" id="check1" >
    <input type="hidden" name="check2" id="check2" >
    <input type="hidden" name="check3" id="check3" >
    <div class="form-check form-check-inline">
    <p class="text-monospace txt_verde14" style="font-size: 18px">Deseo promociones para: </p>
    </div>
    <div class="form-check form-check-inline txt_verde14" style="margin-bottom: 20px">
    <input class="form-check-input" type="radio" name="rd_promo" value="0" required>
    <label class="form-check-label" for="inlineRadio1">
        <img src="iconos/jovenes.png" alt="" width="40" height="45" />
        <label class="form-check-label" for="inlineRadio1" style="margin-right: 10px; margin-left: 10px;">Jovenes</label>
    </label>    
    <input class="form-check-input" type="radio" name="rd_promo" value="1">
    <label class="form-check-label" for="inlineRadio1">
        <img src="iconos/familia.png" alt="" width="50" height="60" />
        <label class="form-check-label" for="inlineRadio1" style="margin-right: 10px; margin-left: 10px;">Familia</label>
    </label>
    </div>
    <center>
    <div class="g-recaptcha" data-sitekey="6LceGcAUAAAAALcSVRZlYbpXQrtLRB9pTgfHtTRq"></div>
    <br />
    <button type="submit" name="submit" class="btn btn-primary" style="background-color: #5a3813; border-color: #5a3813;">Enviar</button></a>
    <a href="index.php"><button type="button" class="btn btn-primary" style="background-color: #5a3813; border-color: #5a3813;">Cancelar</button></a>
    </center>
    <?php 
    

                  if(isset($_POST['submit'])){

                    $secretKey="6LceGcAUAAAAALBrZgK7u9HYpCovr6SvgnFcgmPQ";
                    $responseKey=$_POST['g-recaptcha-response'];
                    $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
                    $response=file_get_contents($url);
                    $response=json_decode($response);

                        if($response->success) {

                        include_once ('controlador/dbregistro.php');

                        $insertar = "INSERT INTO tbl_usuarios(txt_nombre, txt_apellido, txt_fecnac, txt_telefono, txt_direccion, txt_distrito, txt_email, txt_usuario, txt_password, id_opc, id_extreme, clientdni) VALUES ('$nombres','$apellidos','$fecha_nac','$fono','$direccion','$distrito','$email','$usuario','$contra','$rd_promo',NULL,'$dni')";

                        $resultado = mysqli_query($db, $insertar);

                            if (!$resultado) {
                              header("location: registro_nook.php");
                            }else{
                              include_once ('controlador/dbregistro.php');
                              include("../admin/includes/fc_global.php");
                                $path="http://www.lagranjavilla.com/promociones/";
                                $host="http://www.lagranjavilla.com/promociones/";
                                $ruta="/home3/lagranja/public_html/promociones/";
                                $promo = array("0"=>"Jovenes","1"=>"Familia");
                                $from="info@lagranjavilla.com";
                                $name="La Granja Villa";
                                $to=$email;
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
                                    <td>".$nombres."</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td><b>Apellidos:</b></td>
                                    <td>".$apellidos."</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td><b>Fecha Nacimiento:</b></td>
                                    <td>".date("d/m/Y", strtotime($fecha_nac))."</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td><b>Telefono:</b></td>
                                    <td>".$fono."</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td><b>DNI:</b></td>
                                    <td>".$dni."</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td><b>Direccion:</b></td>
                                    <td>".$direccion."</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                    <tr>
                                    <td>&nbsp;</td>
                                    <td><b>Distrito:</b></td>
                                    <td>".$distrito."</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                    <tr>
                                    <td>&nbsp;</td>
                                    <td><b>Email:</b></td>
                                    <td>".$email."</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                    <tr>
                                    <td>&nbsp;</td>
                                    <td><b>Usuario:</b></td>
                                    <td>".$usuario."</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                    <tr>
                                    <td>&nbsp;</td>
                                    <td><b>Password:</b></td>
                                    <td>".substr($contra,0,-3)."***</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                    <tr>
                                    <td>&nbsp;</td>
                                    <td><b>Tipo de Cupones:</b></td>
                                    <td>".$promo[$rd_promo]."</td>
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
                              header("location: registro_ok.php");
                            }

                            mysqli_close($db);

                        }else{
                            header("location: registro.php");
                        }                    

                    
                  }
                 
    ?>
  </form>
</div>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


<!--<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="center">

    <table border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td width="300" valign="top">
    	<div class="col-md-6 col-sm-6" align="center">
    	 --><!-- <div class="col-md-4 col-sm-4" align="center">-->
                                <!--<h2 style="color:#333; margin-top:0px;">Iniciar Sesión</h2>-->

                                <!--<img class="polaroid" src="assets/img/logocosminc.png" style="margin-top: 250px; width: 250px;">
                        </div>
        
        
          
        
    </td>
    <td width="200"></td>
    <td width="553" valign="top">
    	<table cellspacing="0" cellpadding="0" class="td-border">        
        <tr>
       	<td style="background-color: #89a8d8;"><p align="center" class="text-h1">Registro de Usuarios</p></td>
        </tr>		
        <tr>
        <td style="background-color: #d0e3f7;">
        
        	<table width="553" border="0" cellspacing="0" cellpadding="0">
			<form name="frm1" action="proc_registro.php" method="post">
            <tr>
            <td width="34"></td>
            <td width="482">
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                <tr>
                <td colspan="3" class="txt_verdeclaro14" align="left">Registrate y recibe grandes beneficios para ti y tu familia.</td>
                </tr>
                <tr>
                <td colspan="3" height="12"></td>
                </tr>
                </table>
			</td>
            <td width="37"></td>
            </tr>
	        <tr bgcolor="#d0e3f7">
            <td width="34"></td>
            <td width="482">
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="3" height="5"></td>
                </tr>
                <tr>
                <td width="226" align="left"><b>Nombres:</b></td>
                <td width="30"></td>
                <td width="226" align="left"><b>Apellidos:</b></td>
                </tr>
                <tr>
                <td width="226" height="33" ><input class="form-control" style="width:226px;" type="text" name="nombres" maxlength="100" required ></td>
                <td width="30"></td>
                <td width="226" height="33" ><input class="form-control" style="width:226px;" type="text" name="apellidos" maxlength="100" required ></td>
                </tr>                
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                </table>
            </td>
            <td width="37"></td>
            </tr>
            
            <tr>
            <td width="34"></td>
            <td width="482">
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                <tr>
                <td width="226" align="left"><b>Fecha de Nacimiento:</b></td>
                <td width="30"></td>
                <td width="226" align="left"><b>Tel&eacute;fono:</b></td>
                </tr>
                <tr>
                <td width="226" height="33" ><input class="form-control" style="width:226px;" type="date" name="fechanac" maxlength="50" required ></td>
                <td width="30"></td>
                <td width="226" height="33" ><input class="form-control" style="width:226px;" type="text" name="fono" maxlength="20" onkeypress="soloNum();" required ></td>
                </tr>                
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                </table>
            </td>
            <td width="37"></td>
            </tr>
            <tr bgcolor="#d0e3f7">
            <td width="34"></td>
            <td width="482">
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="3" height="5"></td>
                </tr>
                <tr>
                <td width="226" align="left"><b>Direcci&oacute;n:</b></td>
                <td width="30"></td>
                <td width="226" align="left"><b>Distrito:</b></td>
                </tr>
                <tr>
                <td width="226" height="33" ><input class="form-control" style="width:226px;" type="text" name="direcc" maxlength="200" required ></td>
                <td width="30"></td>
                <td width="226" height="33" ><input class="form-control" style="width:226px;" type="text" name="distrito" maxlength="100" required ></td>
                </tr>                
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                </table>
            </td>
            <td width="37"></td>
            </tr>
            
            <tr>
            <td width="34"></td>
            <td width="482">
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                <tr>
                <td width="226" align="left"><b>E-mail:</b></td>
                <td width="30"></td>
                <td width="226" align="left"><b>DNI / Carn&eacute; de Extranjer&iacute;a:</b></td>
                </tr>
                <tr>
                <td width="226" height="33" ><input class="form-control" style="width:226px;" type="text" name="email" id="email" maxlength="100" required ></td>
                <td width="30"></td>
                <td width="226" height="33" ><input class="form-control" style="width:226px;" type="text" name="dni" id="dni" maxlength="11" required ></td>
                </tr>                
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                </table>
            </td>
            <td width="37"></td>
            </tr>
            <tr bgcolor="#d0e3f7">
            <td width="34"></td>
            <td width="482">
                               
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
            	<td colspan="3" class="txt_verdeclaro14" align="left">Crea tu usuario y contraseña <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="right" title="Registre un usuario y una contraseña para ingresar a nuestras ¡Promociones!">
 				<img src="iconos/tooltip.png" height="35">
				</span></td> 
                <tr>
                <td colspan="3" height="5">                	
                </td>
                </tr>
                <tr>
                <td width="226" align="left"><span class="Estilo1">Usuario:</span></td>
                <td width="30"></td>
                <td width="226" align="left"><span class="Estilo1">Contrase&ntilde;a:</span></td>
                </tr>
                <tr>
                <td width="226" height="33" ><input class="form-control" style="width:226px;" type="text" name="user" id="user" maxlength="20" required ></td>
                <td width="30"></td>
                <td width="226" height="33" >
				<input type="hidden" name="check1" id="check1" >
				<input type="hidden" name="check2" id="check2" >
				<input type="hidden" name="check3" id="check3" >
				<input class="form-control" style="width:226px;" type="password" name="passw" maxlength="20" required ></td>
                </tr>                
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                </table>
            </td>
            <td width="37"></td>
            </tr>
            
            <tr>
            <td width="34"></td>
            <td width="482">
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="3" height="11"></td>
                </tr>
                <tr>
                <td width="238" height="98" background="iconos/bg_radios.gif" valign="top">
                	<table height="98" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td colspan="3" height="15"></td>
                    </tr>
	                <tr>
                    <td width="18"></td>
                    <td width="109" align="left"><input name="rd_promo" type="radio" value="0" /></td>
                    <td width="97" align="left"><input name="rd_promo" type="radio" value="1" /></td>
                    </tr>
                    </table>
                </td>
                <td width="7.5%">
                </td>
                <td width="226" height="98" background="iconos/bg_botones.gif" align="right">
                	<table border="0" cellspacing="0" cellpadding="0" align="right">
	                <tr>
                    <td><a href="javascript:test()"><img src="iconos/bt_enviar.gif" alt="" border="0" width="123" height="35" /></a>--><!-- <input type="image" src="iconos/bt_enviar.gif"  width="123" height="35" /> --><!--</td>
                    </tr>
                    <tr>
                    <td height="20"></td>
                    </tr>
                    <tr>
                    <td><a href="index.php"><img src="iconos/bt_cancelar.gif" alt="" border="0" width="123" height="35" /></a></td>
                    </tr>
                    </table>                   
                </td>
                </tr>
                <tr bgcolor="#d0e3f7">
            <td width="34"></td>
            <td width="100">   
            <td width="37"></td>
            </tr>      
                </table>
            </td>
            <td width="37"></td>
            </tr>
            <tr>
                <td colspan="3" height="11"></td>
                </tr>
			</form>
            </table>
            
        </td>
        </tr>
        --><!--<tr >
        		<tr bgcolor="#F4EBD7">
                <td colspan="3" height="8"></td>
                </tr>
                <tr bgcolor="#F4EBD7">
                	<td colspan="3" align="center"><h6>Si necesitas ayuda para registrarte comunicate al 938 970 607</h6></td>
                </tr>
                <tr bgcolor="#F4EBD7">
                <td colspan="3" height="12"></td>
        		</tr>
        </tr>-->
        
        <!--</table>
    </td>
    </tr>
    </table>

</td>
</tr>
</table>-->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30833338-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
