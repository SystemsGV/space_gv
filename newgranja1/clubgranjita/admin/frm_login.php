<?php 
include("includes/inc_header.php");
session_unset(); 
session_destroy();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador de Contenidos DINOPARK</title>
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
</head>

<body>
<div align="center" width="100%">
<br>
<table bgcolor="#FFFFFF" width="910" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td bgcolor="#998479" colspan="3" width="910" height="1"></td>
  </tr>
  <tr>
  <td width="1" bgcolor="#998479"></td>
  <td width="908">
	<table width="908" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td height="80">
		<table width="908" border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td width="30"></td>
		<td width="424"><img src="iconos/logo_cab.jpg" alt=""></td>
		<td width="424" align="right"><img src="iconos/logo_cab2.jpg" alt=""></td>
		<td width="30"></td>
		</tr>
		</table>
	</td>
	</tr>
	<tr>
	<td height="2" bgcolor="#633A10"></td>
	</tr>
	<tr>
	<td height="4"></td>
	</tr>
	<tr>
	<td height="50" bgcolor="#446092" align="center"><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif" size="4">Administrador de Contenidos</font></td>
	</tr>
	<tr>
	<td height="4"></td>
	</tr>
	<tr>
	<td height="2" bgcolor="#633A10"></td>
	</tr>
	<tr>
	<td height="300">
	
		<form action="proc_administrador.php?op=4" method="post" name="form1">    
		<table bgcolor="#F9F7EF" width="252" height="148" border="0" align="center" cellpadding="0" cellspacing="0" style="border:#4A5219 1px solid">
		  <tr>
			<td valign="top"><table width="252" border="0" cellpadding="0" cellspacing="0">
			  <tr bgcolor="#633A10">
				<td height="23">&nbsp;</td>
				<td colspan="2" align="center" valign="middle" class="titulo_blanco">INGRESE SUS DATOS</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td width="12" height="10" class="texto_01"></td>
				<td width="76" class="texto_01"></td>
				<td width="149" class="texto_01"></td>
				<td width="15" class="texto_01"></td>
			  </tr>
			  <tr>
                <td colspan="4" class="texto_01" align="center"><?php if(isset($_GET['error'])) {?> <b><font color="#CC0000">Informaci&oacute;n Invalida!</font></b> <?php }?> &nbsp;</td>
              </tr>
			  <tr>
				<td width="12" height="7" class="texto_01"></td>
				<td width="76" class="texto_01"></td>
				<td width="149" class="texto_01"></td>
				<td width="15" class="texto_01"></td>
			  </tr>
			  <tr>
				<td height="17">&nbsp;</td>
				<td align="left" class="texto_01">Usuario:</td>
				<td align="right"><label>
				  <input name="usuario" type="text" class="input" size="22" maxlength="19">
				</label></td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td height="15"></td>
				<td align="left" class="texto_01"></td>
				<td align="right"></td>
				<td></td>
			  </tr>
			  <tr>
				<td height="17">&nbsp;</td>
				<td align="left" class="texto_01">Contrase&ntilde;a:</td>
				<td align="right"><input name="clave" type="password" class="input" size="22" maxlength="18"></td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td height="10"></td>
				<td></td>
				<td></td>
				<td></td>
			  </tr>
			  <tr>
				<td height="18">&nbsp;</td>
				<td>&nbsp;</td>
				<td>
				<input name="acep" type="image" src="iconos/login.gif" onClick="javascript:Valida_Datos();">							  
	&nbsp;
								<a href="frm_login.php"><img src="iconos/clean.gif" width="68" height="18"  border="0"></a>            </td>
				<td>&nbsp;</td>
			  </tr>

			</table></td>
		  </tr>
		</table>
		</form>
	
	</td>
	</tr>
	<tr>
	<td height="2" bgcolor="#633A10"></td>
	</tr>
	<tr>
	<td height="30" bgcolor="#E5E7DD">&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.websconsulting.com/" target="_blank" class="pie">Desarrollado por WSConsulting</a></td>
	</tr>
	</table>
	
  </td>
  <td width="1" bgcolor="#998479"></td>
  </tr>
  <tr>
  <td colspan="3" width="910" height="1" bgcolor="#998479"></td>
  </tr>
  
</table>

</div>
</body>
</html>
