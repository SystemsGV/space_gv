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
</head>

<body>
<div align="center" width="100%">
<br>
<table bgcolor="#FFFFFF" width="910" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td bgcolor="#8f9fb4" colspan="3" width="910" height="1"></td>
  </tr>
  <tr>
  <td width="1" bgcolor="#8f9fb4"></td>
  <td width="908">
	<table width="908" border="0" cellpadding="0" cellspacing="0">
	<?include("cabecera_i.php")?>
	<tr>
	<td height="400">
	
		<form action="proc_administrador.asp?op=4" method="post" name="form1">    
		<table bgcolor="#f3f3f3" width="349" height="192" border="0" align="center" cellpadding="0" cellspacing="0" style="border:#355888 1px solid">
		  <tr>
			<td width="347" height="190" valign="top"><table width="347" border="0" cellpadding="0" cellspacing="0">
			  <tr bgcolor="#355888">
				<td height="30" bgcolor="#355888">&nbsp;&nbsp;&nbsp;</td>
				<td colspan="2" align="center" valign="middle" bgcolor="#355888" class="titulo_blanco">INGRESE SUS DATOS</td>
				<td bgcolor="#355888">&nbsp;</td>
			  </tr>
			  <tr>
				<td width="5" height="10" class="texto_01"></td>
				<td width="79" class="texto_01"></td>
				<td width="244" class="texto_01"></td>
				<td width="19" class="texto_01"></td>
			  </tr>
			  <tr>
                <td colspan="4" class="texto_01" align="center"><?php if(isset($_GET['error'])) {?> <b><font color="#CC0000">Informaci&oacute;n Invalida!</font></b> <?php }?> &nbsp;</td>
              </tr>
			  <tr>
				<td width="5" height="7" class="texto_01"></td>
				<td width="79" class="texto_01"></td>
				<td width="244" class="texto_01"></td>
				<td width="19" class="texto_01"></td>
			  </tr>
			  <tr>
				<td height="17">&nbsp;</td>
				<td align="left" class="texto_01">Usuario:</td>
				<td align="right"><label>
				  <input name="usuario" style="padding-left:7px;" type="text" class="input" size="33" maxlength="19">
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
				<td align="right"><input name="clave" style="padding-left:7px;" type="password" class="input" size="33" maxlength="18"></td>
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
				    <input name="acep" type="image" src="iconos/login.gif" onClick="javascript:Valida_Datos();">							  
				    &nbsp;
				    <a href="frm_login.php"><img src="iconos/clean.gif"  border="0"></a> </div></td>
				<td>&nbsp;</td>
			  </tr>

			</table></td>
		  </tr>
		</table>
		</form>
	
	</td>
	</tr>
	<tr>
	<td height="2" bgcolor="#3b587a"></td>
	</tr>
	<tr>
	<td height="30" bgcolor="#607b9b">&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.websconsulting.com/" target="_blank" class="pie">Desarrollado por WSConsulting</a></td>
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
