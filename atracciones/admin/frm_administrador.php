<?
	include("includes/inc_header.php");
//	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_administrador.php");

	$id=$_GET['id'];
	$administrador = new cls_administrador($id);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
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
  <td bgcolor="#8f9fb4" colspan="3" width="910" height="1"></td>
  </tr>
  <tr>
  <td width="1" bgcolor="#8f9fb4"></td>
  <td width="908">
	<?include("cabecera.php")?>
	<tr>
	<td>
		
		
		<table width="881" border="0" cellpadding="0" cellspacing="0" align="center">
			  <tr>
				<td width="881" height="4"><table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td height="5"></td>
		  </tr>
		  <tr>
          	<td width="32"><img src="iconos/ic_frm.png" alt="" border="0" /></td>
			<td height="30" class="titu_secc">&nbsp;&nbsp;MODULO ADMINISTRADORES</td>
			<td height="30" align="right" valign="bottom"><a href="inf_administrador.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a></td>
		  </tr>
		  <tr>
			<td height="10"></td>
		  </tr>
		</table>
          <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" name="form1" id="form1">
             <tr bgcolor="#989898">
                <td colspan="2" height="1"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td width="333" height="10" valign="top"></td>
                <td width="548" align="left" bgcolor="#f5f5f5"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Nombres:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><input name="nombres" type="text" class="input" id="nombres" size="40" value="<? echo $administrador->getNombres()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td colspan="2" height="10"></td>
              </tr>	
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">E-mail:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><input name="correo" type="text" class="input" id="correo" size="40" value="<? echo $administrador->getCorreo()?>" onBlur="IsMail(this,2)" />
                    <span class="titus_tablas">*</span></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td colspan="2" height="10"></td>
              </tr>	
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Usuario:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><input name="usuario" type="text" class="input" id="usuario" size="40" value="<? echo $administrador->getUsuario()?>"  <? if($id!=""){?> readonly="true" <? }?> />
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td colspan="2" height="10"></td>
              </tr>	
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Clave:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><input name="clave" type="password" class="input" id="clave" size="40" value="<? echo $administrador->getClave()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="10"></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><? if($id!="") { ?>
                    &nbsp;<a href="javascript:editar(<? echo $id?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }else{?>
                    &nbsp;<a href="javascript:registrar();"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }?>
                  </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;</td>
              </tr>
               <tr bgcolor="#989898">
                <td colspan="2" height="1"></td>
               </tr
            ></form>
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
