<?php
include 'inc_header.php';
include 'constantes.php';
include 'funciones.php';
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="js-no ie9"> <![endif]-->
<!--[if IE 10]> <html lang="en" class="js-no ie10"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<title>Cosmic Bowling - Promociones</title>
<link rel="shortcut icon" href="assets/img/logocosminc.ico">
<link rel="stylesheet" href="css/estilos.css">
<link href="https://fonts.googleapis.com/css?family=Slackey&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
<!--<script src="js/function.js" type="text/javascript"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <style>
      .btn-color{
        background-color: #5a3813;
        color: #fff;
      }

    </style>
        
<!--<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>-->
  
</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Registro Exitoso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¡Felicidades! te has registrado correctamente.</p>
        <p>Ahora podrás acceder a nuestras promociones exclusivas para ti.</p>
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
<div class="hero-image">
  <div class="container hero-text">
    <div class="container" style="width: 300px; height: 250px;" align="center">
          <p class="text-h2">Inicio de Sesión</p>
          <img src="assets/img/logo.png" class="img-responsive" width="160" height="160" style="margin-top: 20px;">
      </div>
      <div class="container" style="width: 300px; height: 250px; padding-top: 50px;">
      <form action="proc_login.php" method="post">
        <div class="form-row">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required>            
          </div>
        </div>
        <div class="form-row">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required>      
          </div>
        </div>
        <button type="image" class="btn btn-color btn-block" style="margin-bottom: 7px;">Iniciar Sesión</button>
        <?php
               if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
               {
                  echo "<div class='text-center' style='color:red'>Usuario o contraseña invalido </div>";
               }
        ?>
      </form>
      </div>
    </div>
</div>

<!--<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 align="center" style=" color:red ">Información:</h3>
     </div>
         <div class="modal-body">
            <h4 align="justify">Estimado usuario, por motivos de actualización le agradeceremos realice un nuevo registro de sus datos completos siguiendo las indicaciones detalladas, de esta forma podrá disfrutar de todas nuestras promociones mes a mes.</h4>    
     </div>
         <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
     </div>
      </div>
   </div>
</div>-->

<!--<section class="bg-6 bg-center bg-cover  section-fxd">
        <div class="bg-filter">
            <div class="hv-center">
                <div class="sign-up">
                    <div class="sign-up-hr hidden-xs"></div>                    
                    <div class="row" style="padding-top:15px;">
                        <div class="col-md-4 col-sm-4" align="center">
                                <h2 style="color:#fff; margin-top:0px;">Iniciar Sesión</h2>
                                <img src="assets/img/logocosminc.png" class="img-responsive" style="margin-top: 50px">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <span id="error" class="text-danger hidden text-center"> Usuario y/o contraseña son incorrectos </span>
                            <table border="0" cellspacing="0" cellpadding="0">
        <form action="proc_login.php" method="post">
        <tr>
        <td width="304" height="361" background="iconos/bg_login1.jpg" valign="top"><table width="304" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3" height="95"></td>
          </tr>
          <tr>
            <td width="23"></td>
            <td colspan="3" class="txt_verde11" align="left"></td>
            <td width="23"></td>
          </tr>
<tr></tr>
        </table>
            
            <table width="304" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td colspan="5" height="10"></td>
            </tr>
           <tr>
            <td width="7  "></td>
          
            <td width="75" class="txt_verde14" align="right"><b>Usuario:</b> </td></td>
            <td width="1"></td>
            <td width="350" height="30" cellspacing="0" cellpadding="0">--> <!--<input type="user" id="user" name="user" class="form-control" placeholder="Usuario" type="text" name="usuario"> <i class="fa fa-user" align="right"></i>-->
                <!--<div class="form-group">
                     <div class="control">
                         <input type="user" id="user" name="user" class="form-control" placeholder="Ingresa tu usuario" type="text" name="usuario" required>
                     </div>
                </div>
            </td> 
            
                                       
            <td width="23"></td>
            </tr> 

     
            <tr>
            <td colspan="5" height="5"></td>
            </tr>
            <tr>
            <td width="23"></td>
            <td width="75" class="txt_verde14" align="right"><b>Clave:</b></td>
            <td width="8"></td> 
            <td width="175" height="50">--><!--<input class="cajatexto" type="password" name="clave" req></td>
            <td width="23"></td> -->
            <!--<div class="form-group">
                     <div class="control">
                         <input  id="user" name="clave" class="form-control" placeholder="Contraseña" type="password" name="clave" required>
                                        
                     </div>
                </div>
            </tr>
            <tr>
            <td colspan="5" height="12"></td>
            </tr>
            <tr>
            <td width="23"></td>
            <td width="75"></td>
            <td width="10"></td>
            <td width="175" align="center"><button type="image" class="btn" style="background-color: #b4407e; color: #ffff;">Iniciar Sesión</button> </td>
            
            <td width="23"></td>
            </tr>
            <tr>
            <td colspan="5" height="12"></td>
            </tr>
            <tr>
            <td width="23"></td>
            <td width="75"></td>
            <td width="8" align="right" class="registro"><br>&nbsp;&nbsp;<a href="registro.php" class="btn btn-hover"><font style="color: #ffff; font-weight: bold;" >Reg&iacute;strate</font></a>&nbsp;</td>
            <td width="175" align="right" class="recuperar"><br>&nbsp;<a href="recuperar.php" class="btn btn-hover"><font style="color: #ffff; font-weight: bold;">Recuperar contraseña</font></a></td>
            <td width="23">  </td>
            </tr>
            </table>
            
        </td>
        </tr>
        </form>
        </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
            
        </td>
        </tr>
        </form>
        </table>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


</body>

</html>

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>La Granja Villa - Promociones</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<style type="text/css">
.Estilo1 {
	color: #990000;
	font-weight: bold;
}
</style>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td class="bg_cab" align="center">

    <table border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td width="320" valign="top">
    	<table border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td height="16"></td>
        </tr>
        <tr>
        <td width="197" height="223" class="logo_granja"></td>
        </tr>
        <tr>
        <td height="16"></td>
        </tr>
        </table>  
        
        <? //include("inc_login.php");?>
          
        
    </td>
    <td width="20"></td>
    <td width="553" valign="top">
    	<table border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td height="30"></td>
        </tr>
		<tr>
        <td><img src="iconos/titu_registro.gif" border="0" alt="" /></td>
        </tr>
        <tr>
        <td bgcolor="#EDE0C4" background="iconos/bg_cuponera.jpg" height="465" valign="top">
        	<table width="553" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td width="34"></td>
            <td width="482">
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="3" height="12"></td>
                </tr>
                <tr>
                <td colspan="3" class="txt_verdeclaro14" align="left"><b>Registro Exitoso. Gracias por registrarte!!!</b></td>
                </tr>
                <tr>
                <td colspan="3" height="70"></td>
                </tr>
                <tr>
                <td colspan="3" align="center"><img src="iconos/msg_ok.gif" alt="" border="0" /></td>
                </tr>
                </table>
			</td>
            <td width="37"></td>
            </tr>
	       
            </table>
        </td>
        </tr>
        <tr>
        <td><img src="iconos/titu_registro_abajo.gif" border="0" alt="" /></td>
        </tr>
        </table>
    </td>
    </tr>
    </table>

</td>
</tr>
</table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
-->