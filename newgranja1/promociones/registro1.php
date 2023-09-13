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
<script src="function.js" type="text/javascript"></script>
<style type="text/css">
<!--
.Estilo1 {
	color: #990000;
	font-weight: bold;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function test()
{
	
	if (document.frm1.nombres.value=="")
	{
		alert("Por favor, ingrese sus Nombres");
		document.frm1.nombres.focus();
		return;
	}
	if (document.frm1.apellidos.value=="")
	{
		alert("Por favor, ingrese sus Apellidos");
		document.frm1.apellidos.focus();
		return;
	}

	if (document.frm1.fechanac.value=="")
	{
		alert("Por favor, ingrese su Fecha de Nacimiento");
		document.frm1.fechanac.focus();
		return;
	}
	if (document.frm1.fono.value=="")
	{
		alert("Por favor, ingrese su Telefono");
		document.frm1.fono.focus();
		return;
	}
	if (document.frm1.direcc.value=="")
	{
		alert("Por favor, ingrese su Direccion");
		document.frm1.direcc.focus();
		return;
	}
	if (document.frm1.distrito.value=="")
	{
		alert("Por favor, ingrese su Distrito");
		document.frm1.distrito.focus();
		return;
	}
	if (document.frm1.email.value=="")
	{
		alert("Por favor, ingrese su Email");
		document.frm1.email.focus();
		return;
	}
	if (document.frm1.email.value!="")
	{
		   var txt=document.frm1.email.value;
			if (txt.indexOf("@")<3){
				alert("La direccion e-mail no es valida. Por favor"
					  + " introduzca una direccion que contenga el simbolo '@'.");
				document.frm1.email.focus();
				return;
			}
			if ((txt.indexOf(".com")<5)&&(txt.indexOf(".org")<5)
			   &&(txt.indexOf(".gov")<5)&&(txt.indexOf(".net")<5)
			   &&(txt.indexOf(".mil")<5) &&(txt.indexOf(".gob.pe")<5)){
					alert("La direccion e-mail no es valida."
							+" La direccion e-mail debe contener un sufijo del tipo "
							+".com,.net,.org,.gov or .mil");
				 document.frm1.email.focus();
				 return;
			}
		
			
	}	
	

	if (document.frm1.user.value=="")
	{
		alert("Por favor, ingrese su Usuario");
		document.frm1.user.focus();
		return;
	}
		
	if (document.frm1.passw.value=="")
	{
		alert("Por favor, ingrese su Password");
		document.frm1.passw.focus();
		return;
	}

/*	var s = "no"; 
	with (document.frm1){ 
	for ( var i = 0; i < rd_promo.length; i++ ) { 
	if ( rd_promo[i].checked ) { 
	s= "si"; 
	//alert("Ha seleccionado: \n" + rd_promo[i].value); 
	break; 
	} 
	} 
	if ( s == "no" ){ 
	alert("Debe seleccionar: Jovenes o Familias" ) ;
	return;
	} 
	} */
		
	document.frm1.submit();

}				

function limpiar()
{
	document.frm1.reset();
}

function soloNum(punto,menos){
	
		if ((event.keyCode > 32 && event.keyCode < 48) || (event.keyCode > 57 && event.keyCode < 65) || (event.keyCode > 90 && event.keyCode < 97)) event.returnValue = false;
		if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
		if (typeof(punto)!='undefined' && punto!='' ){
				if (event.keyCode==46) event.returnValue = true;
		}	
		if (typeof(menos)!='undefined' && menos !=''){
			if (event.keyCode==45) event.returnValue = true;
		}
	
}
//-->
</script>
<script type="text/javascript"><!--  
 //<![CDATA[  
function comprobar(mail)   
{  
  var url = 'http://www.lagranjavilla.com/promociones/ajax/ajax_comprobar_nick.php';  
  var pars='email=mail';  
  var myAjax = new Ajax.Updater( 'comprobar_mensaje', url, { method: 'get', parameters: pars});  
}  
// -->  
</script>
        
</head>
<body> 

<section class="bg-6 bg-center bg-cover  section-fxd">
        <div class="bg-filter">
            <div class="hv-center">
                <div class="sign-up">
                    <div class="sign-up-hr hidden-xs"></div>                    
                    <div class="row" style="padding-top:15px;">
                        <div class="col-md-4 col-sm-4" align="center">
                                <h2 style="color:#333; margin-top:0px;"></h2>
                                <img src="assets/img/logo.png" class="img-responsive">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <span id="error" class="text-danger hidden text-center"> Usuario y/o contraseña son incorrectos </span>
                            <table border="0" cellspacing="0" cellpadding="0">
		<form name="frm1" action="proc_registro1.php" method="post">
            <tr>
            <td width="34"></td>
            <td width="482">
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="3" height="8"><img src="iconos/titu_registro.png" border="0" alt="" /></td>
                </tr>
                <tr>
                <td colspan="3" class="txt_verdeclaro14" align="left"><br>Registrate y recibe grandes beneficios para ti y tu familia.</td>
                </tr>
                <tr>
                <td colspan="3" height="12"></td>
                </tr>
                </table>
			</td>
            <td width="37"></td>
            </tr>
	        <tr bgcolor="">
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
                <td width="226" height="33" background=""><input class="cajatexto" style="width:196px;" type="text" name="nombres"></td>
                <td width="30"></td>
                <td width="226" height="33" background=""><input class="cajatexto" style="width:196px;" type="text" name="apellidos"></td>
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
                <td width="226" height="33" background=""><input class="cajatexto" style="width:196px;" type="text" name="fechanac"></td>
                <td width="30"></td>
                <td width="226" height="33" background=""><input class="cajatexto" style="width:196px;" type="text" name="fono" onkeypress="soloNum();"></td>
                </tr>                
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                </table>
            </td>
            <td width="37"></td>
            </tr>
            <tr bgcolor="">
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
                <td width="226" height="33" background=""><input class="cajatexto" style="width:196px;" type="text" name="direcc"></td>
                <td width="30"></td>
                <td width="226" height="33" background=""><input class="cajatexto" style="width:196px;" type="text" name="distrito"></td>
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
                <td width="226" align="left"></td>
                </tr>
                <tr>
                <td width="226" height="33" background=""><input class="cajatexto" style="width:196px;" type="text" name="email" onKeyUp="comprobar(this.value)"><span id="comprobar_mensaje"></span></td>
                <td width="30"></td>
                <td width="226" height="33"></td>
                </tr>                
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                </table>
            </td>
            <td width="37"></td>
            </tr>
            <tr bgcolor="">
            <td width="34"></td>
            <td width="482">
            	<table class="txt_verde14" width="482" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td colspan="3" height="5"></td>
                </tr>
                <tr>
                <td width="226" align="left"><span class="Estilo1">Usuario:</span></td>
                <td width="30"></td>
                <td width="226" align="left"><span class="Estilo1">Contrase&ntilde;a:</span></td>
                </tr>
                <tr>
                <td width="226" height="33" background=""><input class="cajatexto" style="width:196px;" type="text" name="user"></td>
                <td width="30"></td>
                <td width="226" height="33" background=""><input class="cajatexto" style="width:196px;" type="password" name="passw"></td>
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
                <td width="226" height="98" background="" valign="top">
                	<table height="98" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td colspan="3" height="15"></td>
                    </tr>
	                <tr>
                    <td width="18"></td>
                    <td width="109" align="left"></td>
                    <td width="97" align="left"></td>
                    </tr>
                    </table>
                </td>
                <td width="30"></td>
                <td width="226" height="98" background="iconos/bg_botones.gif" align="right">
                	<table border="0" cellspacing="0" cellpadding="0">
	                <tr>
                    <td><a href="javascript:test()"><img src="iconos/bt_enviar.gif" alt="" border="0" width="123" height="35" /></a><!-- <input type="image" src="iconos/bt_enviar.gif"  width="123" height="35" /> --></td>
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
                </table>
            </td>
            <td width="37"></td>
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
