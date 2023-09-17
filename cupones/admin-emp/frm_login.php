<?php 
include("includes/inc_header.php");
include("includes/constantes.php");
session_unset(); 
session_destroy();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN;?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script language="javascript">
	function Valida_Datos()
	{
		if(document.form1.usuario.value=="")
		{
			alert("Ingrese el Nombre del Usuario.");
			document.form1.usuario.focus();
		}else{		
			if(document.form1.clave.value=="")
			{
				alert("Ingrese su Clave.");
				document.form1.clave.focus();	
			}else{
				document.form1.action="proc_administrador.php?op=4";
				document.form1.submit();			
			}
		}	
	}
</script>
<style>
.myButton3 {
	-moz-box-shadow:inset 0px 1px 0px 0px #9acc85;
	-webkit-box-shadow:inset 0px 1px 0px 0px #9acc85;
	box-shadow:inset 0px 1px 0px 0px #9acc85;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #74ad5a), color-stop(1, #68a54b));
	background:-moz-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-webkit-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-o-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-ms-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:linear-gradient(to bottom, #74ad5a 5%, #68a54b 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#74ad5a', endColorstr='#68a54b',GradientType=0);
	background-color:#74ad5a;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #3b6e22;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:10px 18px;
	text-decoration:none;
}
.myButton3:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #68a54b), color-stop(1, #74ad5a));
	background:-moz-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-webkit-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-o-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-ms-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:linear-gradient(to bottom, #68a54b 5%, #74ad5a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#68a54b', endColorstr='#74ad5a',GradientType=0);
	background-color:#68a54b;
}
.myButton3:active {
	position:relative;
	top:1px;
}
.myButton4 {
	-moz-box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	-webkit-box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fc8d83), color-stop(1, #e4685d));
	background:-moz-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-webkit-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-o-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-ms-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:linear-gradient(to bottom, #fc8d83 5%, #e4685d 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fc8d83', endColorstr='#e4685d',GradientType=0);
	background-color:#fc8d83;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #d83526;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	padding:9px 16px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b23e35;
}
.myButton4:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e4685d), color-stop(1, #fc8d83));
	background:-moz-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-webkit-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-o-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-ms-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:linear-gradient(to bottom, #e4685d 5%, #fc8d83 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e4685d', endColorstr='#fc8d83',GradientType=0);
	background-color:#e4685d;
}
.myButton4:active {
	position:relative;
	top:1px;
}

</style>
</head>

<body>
<div align="center" width="100%">
<table bgcolor="#FFFFFF" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td bgcolor="#8f9fb4" colspan="3" width="910" height="1"></td>
  </tr>
  <tr>
  <td width="1" bgcolor="#8f9fb4"></td>
  <td width="100%">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<?include("cabecera_i.php")?>
	<tr>
	<td height="280">
	
		<form action="proc_administrador.php?op=4" method="post" name="form1">    
		<table bgcolor="#f3f3f3" width="382" height="226" border="0" align="center" cellpadding="0" cellspacing="0" style="border:#025700 1px solid">
		  <tr>
			<td width="380" height="224" valign="top"><table width="380" border="0" cellpadding="0" cellspacing="0">
			  <tr bgcolor="#025700">
				<td height="35" bgcolor="#025700">&nbsp;&nbsp;&nbsp;</td>
				<td colspan="2" align="center" valign="middle" bgcolor="#025700" class="titulo_blanco">INGRESE SUS DATOS</td>
				<td bgcolor="#025700">&nbsp;</td>
			  </tr>
			  <tr>
				<td width="30" height="10" class="texto_01"></td>
				<td width="95" class="texto_01"></td>
				<td width="216" class="texto_01"></td>
				<td width="39" class="texto_01"></td>
			  </tr>
			  <tr>
                <td colspan="4" class="texto_01" align="center"><?php if(isset($_GET['error'])) {?> <b><font color="#CC0000">Informaci&oacute;n Invalida!</font></b> <?php }?> &nbsp;</td>
              </tr>
			  <tr>
				<td width="30" height="7" class="texto_01"></td>
				<td width="95" class="texto_01"></td>
				<td width="216" class="texto_01"></td>
				<td width="39" class="texto_01"></td>
			  </tr>
			  <tr>
				<td height="17">&nbsp;</td>
				<td align="left" class="texto_01"><strong>USUARIO</strong>:</td>
				<td align="right"><label>
				  <input name="usuario" style="padding-left:7px; height:35px;" type="text" class="input" size="25" maxlength="19">
				</label></td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td height="10"></td>
				<td align="left" class="texto_01"></td>
				<td align="right"></td>
				<td></td>
			  </tr>
			  <tr>
				<td height="17">&nbsp;</td>
				<td align="left" class="texto_01"><strong>CONTRASE&Ntilde;A</strong>:</td>
				<td align="right"><input name="clave" style="padding-left:7px; height:35px;" type="password" class="input" size="25" maxlength="18"></td>
				<td>&nbsp;</td>
			  </tr>

			  <tr>
				<td height="10"></td>
				<td></td>
				<td></td>
				<td></td>
			  </tr>
			  <tr>
				<td height="46">&nbsp;</td>
				<td>&nbsp;</td>
				<td>
				  <div align="right">
				    <input name="acep" type="image" src="iconos/login.gif" height="25" onClick="javascript:Valida_Datos();">							  
				    <!--&nbsp;
				    <a href="frm_login.php"><img src="iconos/clean.gif"  border="0"></a>--> </div></td>
				<td></td>
			  </tr>

			</table></td>
		  </tr>
		</table>
		</form>
	
	</td>
	</tr>
	<tr>
	<td height="2" bgcolor="#666666"></td>
	</tr>
	<tr>
	<td height="30" bgcolor="#b7b7b7">&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.websconsulting.com/" target="_blank" class="pie">Desarrollado por WSConsulting</a></td>
	</tr>
	</table>
	
  </td>
  <td width="1" bgcolor="#8f9fb4"></td>
  </tr>
  <tr>
  <td colspan="3" width="910" height="1" bgcolor="#8f9fb4"></td>
  </tr>
  
</table>

</div>
</body>
</html>
