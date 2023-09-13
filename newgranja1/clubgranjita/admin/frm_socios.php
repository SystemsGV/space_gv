<?
	include("includes/inc_header.php");
//	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_socio.php");
	include("clases/cls_emp_menbresia.php");

	$id=$_GET['id'];
	$socio = new cls_emp_socio($id);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador de Contenidos LAGRANJAVILLA</title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<link href="calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script language="javascript" src="calendar.js"></script>
<script language="javascript" src="calendar-es.js"></script>
<script language="javascript" src="calendar-setup.js"></script>

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
//	if(document.form1.cbo_tipo.value=="")
//	{
//			alert("Por favor, Situaci&oacute;n");
//			document.form1.nombres.focus();
//			i=i+1;
//	}
	if(document.form1.clave.value==""  && i==0)
	{
			alert("Por favor, ingrese clave");
			document.form1.clave.focus();
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_socio.php?op=1";
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
		document.form1.action="proc_socio.php?op=2&id="+id;
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_socios.php";
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
				<td width="881" height="4">
				<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td height="5"></td>
				  </tr>
				  <tr>
					<td height="30" bgcolor="#DEDAC8" class="titus">&nbsp;&nbsp;Registro de Socios</td>
					<td height="30" bgcolor="#DEDAC8" align="right" valign="bottom"><a href="inf_socios.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Nombres:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="nombres" type="text" class="input" id="nombres" size="30" value="<? if(isset($_GET[nombres])){echo $_GET[nombres];}else{echo $socio->get_txt_nombres();}?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
			   <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Direcci&oacute;n:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="direccion" type="text" class="input" id="direccion" size="30" maxlength="100" value="<? if(isset($_GET[direccion])){echo $_GET[direccion];}else{echo $socio->get_txt_direccion();}?>" />
                   </td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Tel&amp;iecute;fono:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="telefono" type="text" class="input" id="telefono" size="20" maxlength="20" value="<? if(isset($_GET[telefono])){echo $_GET[telefono];}else{echo $socio->get_txt_telefono();}?>" />
                    </td>
              </tr>

              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">E-mail:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="correo" type="text" class="input" id="correo" size="30" value="<?  if(isset($_GET[correo])){echo $_GET[correo];}else{echo $socio->get_txt_email();}?>" onBlur="IsMail(this,2)" /><?php if($_GET['msg1']=="1") {?> <b><font color="#CC0000">E-mail ya existe!</font></b> <?php }?>
                    <span class="titus_tablas">*</span></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Fecha de Nacimiento:&nbsp;&nbsp;</td>
               
				<?
				$txt_fecha=$socio->get_txt_fechanac();
				if (empty($txt_fecha))
				{$txt_fecha=date("Y-m-d");}
				else
				{$txt_fecha=$socio->get_txt_fechanac();}
				?>
                <td align="left" bgcolor="#F9F6ED"><input name="fechanac" id="fechanac" type="text" class="input"  style="width:75px;" readonly value="<? if(isset($_GET[fechanac])){echo $_GET[fechanac];}else{echo $txt_fecha;}?>" />
				<input id="lanzador" type="image" src="calendario.gif" />
				<script type="text/javascript">
					Calendar.setup({
					inputField     :    "fechanac",      // id del campo de texto
					ifFormat       :    "%Y-%m-%d",       // formato de la fecha, cuando se escriba en el campo de texto
					button         :    "lanzador"   // el id del bot?n que lanzar? el calendario
					});
				</script><span class="titus_tablas">*</span></td>
              </tr>
			 <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Codigo del cliente:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="codsocio" type="text" class="input" id="dni" maxlength="8" size="10" value="<? if(isset($_GET[codsocio])){echo $_GET[codsocio];}else{echo $socio->get_txt_codsocio();}?>" />
                    </td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Numero de tarjeta:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="codtarjeta" type="text" class="input" id="cuni" size="10" maxlength="10" value="<? if(isset($_GET[codtarjeta])){echo $_GET[codtarjeta];}else{echo $socio->get_txt_codtarjeta();}?>" />
                    </td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Usuario:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="usuario" type="text" class="input" id="usuario" size="30"  maxlength="20" value="<? if(isset($_GET[usuario])){echo $_GET[usuario];}else{echo $socio->get_txt_usuario();}?>"/><?php if($_GET['msg2']=="1") {?> <b><font color="#CC0000">Usuario ya existe!</font></b> <?php }?>
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Clave:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="clave" type="password" class="input" id="clave" maxlength="10" size="30" value="<? echo $socio->get_txt_pws()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="10"></td>
                <td align="left" bgcolor="#F9F6ED"></td>
              </tr>
			  <?php if($id==""){?>
              <tr bgcolor="#F9F6ED">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><? if($id!="") { ?>
                    &nbsp;<a href="javascript:editar(<? echo $id?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }else{?>
                    &nbsp;<a href="javascript:registrar();"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }?>
                  &nbsp;&nbsp;&nbsp;<a href="javascript:nuevo();"><img src="iconos/nuevo.gif" alt="Nuevo registro" border="0"></a>&nbsp;</td>
              </tr>
			  <?php }?>
              <tr bgcolor="#F9F6ED">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED">&nbsp;</td>
              </tr>
            </form>
          </table>
		    <?php if($id!=""){?>
		  <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td height="5"></td>
				  </tr>
				  <tr>
					<td height="30" bgcolor="#DEDAC8" class="titus">&nbsp;&nbsp;Menbresia</td>
					<td height="30" bgcolor="#DEDAC8" align="right" valign="bottom"><!--<a href="inf_socios.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a>-->&nbsp;&nbsp;&nbsp;&nbsp;</td>
				  </tr>
				  <tr>
					<td height="10"></td>
				  </tr>
				</table>
		  <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="54" height="25" valign="middle" bgcolor="#DEDAC8" class="titus_tablas" align="center">Nro&nbsp;</td>
					  <td width="205" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">N° Operaci&oacute;n</td>
					  <td width="166" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Fecha de Pago</td>
					</tr>
					<tr>
					  <td colspan="5" height="2"></td>
				    </tr>
					<?
					conn_abre();
						$contador=1;
						$sql="select * from tbl_menbresia where id_socio='$id'";
						$rs=mysql_query($sql)or die("Error :".mysql_error());
						while($menbresia=mysql_fetch_array($rs))
						{
									if($color=="#F2F0EB")
									{
									  $color="#F6F5F5";}
									else{
									  $color="#F2F0EB";
									}
					  ?>
					<tr valign="middle" bgcolor="<? echo $color?>">
					  <td height="26" bgcolor="<? echo $color?>" class="texto_02">&nbsp;&nbsp;&nbsp;&nbsp;<?=$contador?></td>
					  <td align="left" bgcolor="<? echo $color?>" class="texto_02"><?=$menbresia['txt_op']?></td>
					  <td align="left" bgcolor="<? echo $color?>" class="texto_02"><?=$menbresia['fecha_fpago']?></td>
					</tr>
					<?
					$contador++;
					}?>
				  </table>
			<?php }?>	  
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
