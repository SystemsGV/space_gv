<?php
include 'inc_header.php';
include 'constantes.php';
include 'funciones.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>La Granja Villa - Promociones</title>

<link href="css/estilos.css" rel="stylesheet" type="text/css" />
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

	var s = "no"; 
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
	} 
		
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
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td class="bg_cab" align="center">

    <table border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td width="320" valign="top">
    	  <div class="col-md-4 col-sm-4" align="center">
                                <h2 style="color:#333; margin-top:0px;">Iniciar Sesión</h2>
                                <img src="assets/img/logo.png" class="img-responsive">
                        </div>
        
        
          
        
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
        <td bgcolor="#EDE0C4">
        
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
	        <tr bgcolor="#F4EBD7">
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
                <td width="226" height="33" background="iconos/bg_campo.gif"><input class="cajatexto" style="width:196px;" type="text" name="nombres"></td>
                <td width="30"></td>
                <td width="226" height="33" background="iconos/bg_campo.gif"><input class="cajatexto" style="width:196px;" type="text" name="apellidos"></td>
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
                <td width="226" height="33" background="iconos/bg_campo.gif"><input class="cajatexto" style="width:196px;" type="text" name="fechanac"></td>
                <td width="30"></td>
                <td width="226" height="33" background="iconos/bg_campo.gif"><input class="cajatexto" style="width:196px;" type="text" name="fono" onkeypress="soloNum();"></td>
                </tr>                
                <tr>
                <td colspan="3" height="8"></td>
                </tr>
                </table>
            </td>
            <td width="37"></td>
            </tr>
            <tr bgcolor="#F4EBD7">
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
                <td width="226" height="33" background="iconos/bg_campo.gif"><input class="cajatexto" style="width:196px;" type="text" name="direcc"></td>
                <td width="30"></td>
                <td width="226" height="33" background="iconos/bg_campo.gif"><input class="cajatexto" style="width:196px;" type="text" name="distrito"></td>
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
                <td width="226" height="33" background="iconos/bg_campo.gif"><input class="cajatexto" style="width:196px;" type="text" name="email"></td>
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
            <tr bgcolor="#E7CE98">
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
                <td width="226" height="33" background="iconos/bg_campo.gif"><input class="cajatexto" style="width:196px;" type="text" name="user"></td>
                <td width="30"></td>
                <td width="226" height="33" background="iconos/bg_campo.gif"><input class="cajatexto" style="width:196px;" type="password" name="passw"></td>
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
                <td width="226" height="98" background="iconos/bg_radios.gif" valign="top">
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
</body>
</html>
