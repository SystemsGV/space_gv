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
<!--<![endif]-->

<head>
	<title>Promociones Granja Villa</title>
	<link rel="shortcut icon" href="assets/img/favicon.ico">

	<!-- Meta Tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Cupones Granja Villa">
	<meta name="author" content="La Granja Villa">

	<!--  Boostrap Framework  -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!--=== CSS - Dragonfly ===-->
	<link href="assets/css/themes/light-blue.css" rel="stylesheet" id="colors">

	<!--=== LESS - Dragonfly ===-->
	<!--    <link href="assets/less/themes/light-blue.less" rel="stylesheet/less">-->

	<!-- Google Fonts - Lato -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">

	<!-- Font Awesome Icons -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- CSS Animations -->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet">

	<!--  Slippry Slideshow -->
	<link href="assets/css/slippry.min.css" rel="stylesheet">
        
        <!-- jQuery -->
        <script src="assets/js/min/jquery.min.js"></script>
        <!--script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script-->
        <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/2.1.0/less.min.js"></script>-->

        <!-- Modernizr -->
        <script src="assets/js/min/modernizr.custom.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>
  
</head>
<body> 


<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
</div>
<section class="bg-6 bg-center bg-cover  section-fxd">
        <div class="bg-filter">
            <div class="hv-center">
                <div class="sign-up">
                    <div class="sign-up-hr hidden-xs"></div>                    
                    <div class="row" style="padding-top:15px;">
                        <div class="col-md-4 col-sm-4" align="center">
                                <h2 style="color:#333; margin-top:0px;">Iniciar Sesión</h2>
                                <img src="assets/img/logo.png" class="img-responsive">
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
            <td width="23"></td>
            <td width="75" class="txt_verde14" align="right"><b>Usuario:</b></td>
            <td width="8"></td>
            <td width="175" height="30" background="iconos/bg_campo_login.gif"><input class="cajatexto" type="text" name="usuario" required></td>
            <td width="23"></td>
            </tr>
            
            <tr>
            <td colspan="5" height="5"></td>
            </tr>
            <tr>
            <td width="23"></td>
            <td width="75" class="txt_verde14" align="right"><b>Clave:</b></td>
            <td width="8"></td>
            <td width="175" height="30" background="iconos/bg_campo_login.gif"><input class="cajatexto" type="password" name="clave" req
            ></td>
            <td width="23"></td>
            </tr>
            <tr>
            <td colspan="5" height="12"></td>
            </tr>
            <tr>
            <td width="23"></td>
            <td width="75"></td>
            <td width="8"></td>
            <td width="175" align="right"><input type="image" src="iconos/bt_entrar.gif" /> </td>
            <td width="23"></td>
            </tr>
            <tr>
            <td colspan="5" height="12"></td>
            </tr>
            <tr>
            <td width="23"></td>
            <td width="75"></td>
            <td width="8" align="right" class="registro"><br>&nbsp;<a href="registro.php">Reg&iacute;strate</a>&nbsp;</td>
            <td width="175" align="right" class="recuperar"><br>&nbsp;<a href="recuperar.php">Recuperar contraseña</a></td>
            
            
            
            
            
            <td width="23"  </td>
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
        </table>



    

    <!--Back to top-->
<a href="#" class="back-to-top">
    <i class="fa fa-angle-up"></i>
</a> 
    
    
    

    

    

<!-- Bootstrap Plugin - open dropdown on hover -->
<script src="assets/js/min/bootstrap-hover-dropdown.min.js"></script>

<!-- LESS preprocessor -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/1.7.4/less.min.js"></script>

<!-- WOW.js - loading animations -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/wow/0.1.6/wow.min.js"></script>

<!-- Knobs - our skills -->
<script src="http://cdn.jsdelivr.net/jquery.knob/1.2.9/jquery.knob.min.js"></script>

<!-- Slippry - Slideshow -->
<script src="assets/js/min/slippry.min.js"></script>

<!-- Mixitup plugin - Portfolio Filter Grid -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/mixitup/1.5.6/jquery.mixitup.min.js"></script>

<!-- Make sticky whatever elements -->
<script src="http://cdn.jsdelivr.net/jquery.sticky/1.0.0/jquery.sticky.min.js"></script>

<!-- Smooth sroll -->
<script src="http://cdn.jsdelivr.net/jquery.nicescroll/3.5.4/jquery.nicescroll.min.js"></script>

<!-- Contact Form -->
<script src="assets/js/min/contact-form.min.js"></script>

<!-- Must be last of all scripts -->
<script src="assets/js/min/scripts.min.js"></script>

<!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


</body>

</html>
