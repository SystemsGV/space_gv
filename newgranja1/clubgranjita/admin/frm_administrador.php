<?
	include("includes/inc_header.php");
//	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_administrador.php");

	$id=$_GET['id'];
	$administrador = new cls_administrador($id);
	if($_SESSION['session_opt']!="1"){
		header ("location: frm_login.php");
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>...:::  Administrador de Contenidos - FOTOMAGIC.COM  :::...</title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script type="text/javascript">
function registrar()
{
	var i;
	i=0;
	if(document.form1.nombres.value=="")
	{
			alert("Por favor, ingrese nombres");
			document.form1.nombres.focus();
			i=i+1;
	}
	if(document.form1.correo.value=="" && i==0)
	{
			alert("Por favor, ingrese el email");
			document.form1.correo.focus();
			i=i+1;
	}
	if(document.form1.usuario.value==""  && i==0)
	{
			alert("Por favor, ingrese el usuario");
			document.form1.usuario.focus();
			i=i+1;
	}
	if(document.form1.clave.value==""  && i==0)
	{
			alert("Por favor, ingrese clave");
			document.form1.clave.focus();
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_administrador.php?op=1";
		document.form1.submit();
	}
}

function editar(id)
{
	var i;
	i=0;
	if(document.form1.nombres.value=="")
	{
			alert("Por favor, ingresa los nombres");
			document.form1.nombres.focus();
			i=i+1;
	}
	if(document.form1.correo.value=="" && i==0)
	{
			alert("Por favor, ingresa el email");
			document.form1.correo.focus();
			i=i+1;
	}
	if(document.form1.clave.value==""  && i==0)
	{
			alert("Por favor, ingresa la clave");
			document.form1.clave.focus();
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_administrador.php?op=2&id="+id;
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_administrador.php";
	document.form1.submit();
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
	<td height="10"></td>
	</tr>
	<tr>
	<td align="center"><script type="text/javascript" language="JavaScript1.2" src="<? if($_SESSION['session_tipo']==1){ echo "menu_admin.js"; }else{echo "menu_usuario.js";}?>"></script></td>
	</tr>
	<tr>
	<td height="20"></td>
	</tr>
	<tr>
	<td>
		
		
		<table width="881" border="0" cellpadding="0" cellspacing="0" align="center">
			  <tr>
				<td width="881" height="4"><table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td height="5"></td>
				  </tr>
				  <tr>
					<td height="30" bgcolor="#DEDAC8" class="titus">&nbsp;&nbsp;USUARIOS ADMINISTRADORES</td>
					<td height="30" bgcolor="#DEDAC8" align="right" valign="bottom"><a href="inf_administrador.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				  </tr>
				  <tr>
					<td height="10"></td>
				  </tr>
				</table>
          <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" name="form1" id="form1">
              <tr bgcolor="#F9F6ED">
                <td width="333" height="10" valign="top"></td>
                <td width="548" align="left" bgcolor="#F9F6ED"></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Tipo:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><select name="cbotipo" class="input">
				  <option value="0" <? if($administrador->getInttipo()==0){echo "selected";}?>>Seleccionar</option>
				  <option value="1" <? if($administrador->getInttipo()==1){echo "selected";}?>>AD-Administrador</option>
				  <option value="2" <? if($administrador->getInttipo()==2){echo "selected";}?>>US-Usuario</option>
			  
				  </select>
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Nombres:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="nombres" type="text" class="input" id="nombres" size="30" value="<? echo $administrador->getNombres()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">E-mail:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="correo" type="text" class="input" id="correo" size="30" value="<? echo $administrador->getCorreo()?>"/>
                    <span class="titus_tablas">*</span></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Usuario:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="usuario" type="text" class="input" id="usuario" size="30" value="<? echo $administrador->getUsuario()?>"/>
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Clave:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="clave" type="password" class="input" id="clave" size="30" value="<? echo $administrador->getClave()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="10"></td>
                <td align="left" bgcolor="#F9F6ED"></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><? if($id!="") { ?>
                    &nbsp;<a href="javascript:editar(<? echo $id?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }else{?>
                    &nbsp;<a href="javascript:registrar();"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }?>
                  &nbsp;&nbsp;&nbsp;<a href="javascript:nuevo();"><img src="iconos/nuevo.gif" alt="Nuevo registro" border="0"></a>&nbsp;</td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED">&nbsp;</td>
              </tr>
            </form>
          </table>
          </td>
      </tr>
    </table>
	
	
	
	</td>
	</tr>
	<tr>
	<td height="10"></td>
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
