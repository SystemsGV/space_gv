<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("includes/fc_global.php");	
	include("clases/cls_emp_usuarios.php");
	/*$tot=get_countRs("tbl_noticia_tc","where int_home='1'");
	if($tot>=4){$enabled="Disabled";}*/
	$id=$_GET['id'];
	$usuarios = new cls_emp_usuarios($id);

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador de Contenidos LAGRANJAVILLA</title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<link href="calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script type="text/javascript" language="JavaScript1.2" src="../validaciones.js"></script>
<script language="javascript" src="calendar.js"></script>
<script language="javascript" src="calendar-es.js"></script>
<script language="javascript" src="calendar-setup.js"></script>

<script type="text/javascript">

function registrar()

{
	var i;
	i=0;
	if(document.form1.txt_nombre.value=="")
	{
			alert("Por favor, ingresar Nombres");
			document.form1.txt_nombre.focus();
			return;
			i=i+1;
	}
	
	if(i==0){
		document.form1.action="proc_usuarios.php?op=1";
		document.form1.submit();
	}

}

function editar(id)
{
	var i;
	i=0;
	if(document.form1.txt_nombre.value=="")
	{
			alert("Por favor, ingresar Nombres");
			document.form1.txt_nombre.focus();
			return;
			i=i+1;
	}
	

	if(i==0){
		document.form1.action="proc_usuarios.php?op=2&id="+id;
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_usuarios.php";
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
	<td height="50" bgcolor="#2E3B6F" align="center"><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif" size="4">Administrador de Contenidos</font></td>
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
	<td align="center"><script type="text/javascript" language="JavaScript1.2" src="<? if($_SESSION['session_opt']==1){ echo "menu_admin.js"; }else{echo "menu_usuario.js";}?>"></script></td>
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
			<td height="30" bgcolor="#DEDAC8" class="titus">&nbsp;&nbsp;MODULO USUARIOS </td>
			<td height="30" bgcolor="#DEDAC8" align="right" valign="bottom"><a href="inf_usuarios.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		  </tr>
		  <tr>
			<td height="10"></td>
		  </tr>
		</table>
		
		
          <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <tr>
                <td height="1" colspan="3" align="center" bgcolor="#ffffff" class="azulbold"></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td width="209" height="15"></td>
                <td width="11"></td>
                <td width="661" align="left" bgcolor="#F9F6ED"></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Nombres</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_nombre" type="text" class="input" style="width:300px;" value="<?=urldecode($usuarios->get_txt_nombre())?>" /></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Apellidos</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_apellido" type="text" class="input" style="width:300px;" value="<?=urldecode($usuarios->get_txt_apellido())?>" /></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Fecha de Nac.</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_fecnac" type="text" class="input" style="width:300px;" value="<?=urldecode($usuarios->get_txt_fecnac())?>" /></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Tel&eacute;fono</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_telefono" type="text" class="input" style="width:300px;" value="<?=urldecode($usuarios->get_txt_telefono())?>" /></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Direcci&oacute;n</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_direccion" type="text" class="input" style="width:300px;" value="<?=urldecode($usuarios->get_txt_direccion())?>" /></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Distrito</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_distrito" type="text" class="input" style="width:300px;" value="<?=urldecode($usuarios->get_txt_distrito())?>" /></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">E-mail</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_email" type="text" class="input" style="width:300px;" value="<?=urldecode($usuarios->get_txt_email())?>" /></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Usuario</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_usuario" type="text" class="input" style="width:300px;" value="<?=urldecode($usuarios->get_txt_usuario())?>" /></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Contrase&ntilde;a</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_password" type="text" class="input" style="width:300px;" value="<?=urldecode($usuarios->get_txt_password())?>" /></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Tipo de Cupones</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><select name="id_opc" class="select">
                    <option value="0" <? if($usuarios->get_id_opc()==0){ echo "selected"; }?> ><? echo Jovenes?></option>
                    <option value="1" <? if($usuarios->get_id_opc()==1){ echo "selected"; }?> ><? echo Familias?></option>
                  </select>                </td>
              </tr>
              
              <tr bgcolor="#F9F6ED">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED">&nbsp;</td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><? if($id!="") { ?>
                    &nbsp;<a href="javascript:editar(<?=$id?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }else{?>
                    &nbsp;<a href="javascript:registrar();"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }?>
                  &nbsp;&nbsp;&nbsp;<a href="javascript:nuevo();"><img src="iconos/nuevo.gif" alt="Nuevo registro" border="0"></a>&nbsp;<input name="tot" type="hidden" value="<?=$tot?>"></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="5"></td>
                <td></td>
                <td align="left" bgcolor="#F9F6ED"></td>
              </tr>
            </form>
          </table></td>
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
	<td height="30" bgcolor="#DEDAC8">&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.websconsulting.com/" target="_blank" class="pie">Desarrollado por WSConsulting</a></td>
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