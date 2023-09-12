<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("includes/fc_global.php");	
	include("clases/cls_emp_noticia_tc.php");
	/*$tot=get_countRs("tbl_noticia_tc","where int_home='1'");
	if($tot>=4){$enabled="Disabled";}*/
	$id=$_GET['id'];
	$noticia_tc = new cls_emp_noticia_tc($id);

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
	if(document.form1.txt_titulo.value=="")
	{
			alert("Por favor, ingresar Titulo");
			document.form1.txt_titulo.focus();
			return;
			i=i+1;
	}
	
// Valida para la foto 1
   if(document.form1.txt_imagen.value!="" && i==0)
	{	adres1 = document.form1.txt_imagen.value;
		index1 = adres1.indexOf(".jpg");
		index1 = index1 + adres1.indexOf("JPG");
		index1 = index1 + adres1.indexOf("jpeg");
		index1 = index1 + adres1.indexOf("JPEG");
		index1 = index1 + adres1.indexOf("gif");
	    index1 = index1 + adres1.indexOf("GIF");
		
		//Si no es del formato establecido
		if (index1 == -6)
		{	
			alert("Tipo de archivo inválido para la foto chica. Solo JPG o Gif");
			document.form1.txt_imagen.focus();
			return;
			i=i+1;
		}	
	}

	if(i==0){
		document.form1.action="proc_noticia_tc.php?op=1";
		document.form1.submit();
	}

}

function editar(id)
{
	var i;
	i=0;
	if(document.form1.txt_titulo.value=="")
	{
			alert("Por favor, ingresar Titulo");
			document.form1.txt_titulo.focus();
			return;
			i=i+1;
	}
	

// Valida para la foto 1
   if(document.form1.txt_imagen.value!="" && i==0)
	{	adres1 = document.form1.txt_imagen.value;
		index1 = adres1.indexOf(".jpg");
		index1 = index1 + adres1.indexOf("JPG");
		index1 = index1 + adres1.indexOf("jpeg");
		index1 = index1 + adres1.indexOf("JPEG");
		index1 = index1 + adres1.indexOf("gif");
	    index1 = index1 + adres1.indexOf("GIF");
		
		//Si no es del formato establecido
		if (index1 == -6)
		{	
			alert("Tipo de archivo inválido para la foto chica. Solo JPG o Gif");
			document.form1.txt_imagen.focus();
			return;
			i=i+1;
		}	
	}

	if(i==0){
		document.form1.action="proc_noticia_tc.php?op=2&id="+id;
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_noticia_tc.php";
	document.form1.submit();
}


function validar_foto(i)
{
// Valida para la foto 1
   if(document.form1.txt_imagen.value!="" && i==0)
	{	adres1 = document.form1.txt_imagen.value;
		index1 = adres1.indexOf(".jpg");
		index1 = index1 + adres1.indexOf("JPG");
		index1 = index1 + adres1.indexOf("jpeg");
		index1 = index1 + adres1.indexOf("JPEG");
		index1 = index1 + adres1.indexOf("gif");
	    index1 = index1 + adres1.indexOf("GIF");
		
		//Si no es del formato establecido
		if (index1 == -6)
		{	
			alert("Tipo de archivo inválido para la foto chica. Solo JPG o Gif");
/*			document.form1.txt_imagen.focus();
			return;
			i=i+1;
*/		}	

	}


// Valida para la foto 2
   if(document.form1.txt_imagen2.value!="" && i==0)
	{	adres1 = document.form1.txt_imagen2.value;
		index1 = adres1.indexOf(".jpg");
		index1 = index1 + adres1.indexOf("JPG");
		index1 = index1 + adres1.indexOf("jpeg");
		index1 = index1 + adres1.indexOf("JPEG");
		index1 = index1 + adres1.indexOf("gif");
	    index1 = index1 + adres1.indexOf("GIF");
		
		//Si no es del formato establecido
		if (index1 == -6)
		{	
			alert("Tipo de archivo inválido para la foto grande. Solo JPG o Gif");
/*			document.form1.txt_imagen2.focus();
			return;
			i=i+1;
*/		}	
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
		<td width="424"><img src="iconos/logo_cab.jpg" alt="Coloma SAC"></td>
		<td width="424" align="right"><img src="iconos/logo_cab2.jpg" alt="Coloma SAC"></td>
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
			<td height="30" bgcolor="#DEDAC8" class="titus">&nbsp;&nbsp;MODULO NOTICIAS Y ARTICULOS- ZONA ECOL&oacute;ICA </td>
			<td height="30" bgcolor="#DEDAC8" align="right" valign="bottom"><a href="inf_noticia_tc.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
                <td height="26" align="right" class="titus_tablas">Fecha</td>
                <td>:</td>
				<?
				$txt_fecha=$noticia_tc->get_txt_fecha();
				if (empty($txt_fecha))
				{$txt_fecha=date("Y-m-d");}
				else
				{$txt_fecha=$noticia_tc->get_txt_fecha();}
				?>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_fecha" id="txt_fecha" type="text" class="input"  style="width:75px;" readonly value="<?=$txt_fecha?>" />
				<input id="lanzador" type="image" src="calendario.gif" />
				<script type="text/javascript">
					Calendar.setup({
					inputField     :    "txt_fecha",      // id del campo de texto
					ifFormat       :    "%Y-%m-%d",       // formato de la fecha, cuando se escriba en el campo de texto
					button         :    "lanzador"   // el id del bot?n que lanzar? el calendario
					});
				</script></td>
              </tr>	
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Titulo</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_titulo" type="text" class="input" style="width:520px;" value="<?=urldecode($noticia_tc->get_txt_titulo())?>" /></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td width="220" height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas">&nbsp;&nbsp;&nbsp;Resumen</span></td>
                <td width="13">:</td>
                <td align="left"><textarea name="txt_resumen" cols="40" class="input" style="width:520px; height:70px"><?=urldecode($noticia_tc->get_txt_resumen())?></textarea></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td width="220" height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas">&nbsp;&nbsp;&nbsp;Descripci&oacute;n</span></td>
                <td width="13">:</td>
                <td align="left"><textarea name="txt_descripcion" cols="40" class="input" style="width:520px; height:118px"><?=urldecode($noticia_tc->get_txt_descripcion())?></textarea></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Foto</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_imagen" type="file" class="input" id="txt_imagen" size="30" /></td>
              </tr>
              <? if($noticia_tc->get_txt_foto()!="") {?>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas"><div align="right">Foto actual</div></td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><table width="255" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="135"><img src="<? echo UPLOAD_NOTICIA_TC.$noticia_tc->get_txt_foto()?>" width="100" height="80" style="border:#FFFFFF 1px solid" /></td>
                      <td width="35" class="titus_tablas">&nbsp;Quitar </td>
                      <td width="85"><input name="chk_quitar" type="checkbox" id="chk_quitar" value="1" />
                          <input name="hid_txt_imagen" type="hidden" value="<? echo $noticia_tc->get_txt_foto()?>" />                      </td>
                    </tr>
                </table></td>
              </tr>
			  <? }?>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Publicado</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><select name="int_estado" class="select">
                    <option value="0" <? if($noticia_tc->get_int_estado()==0){ echo "selected"; }?> ><? echo NO?></option>
                    <option value="1" <? if($noticia_tc->get_int_estado()==1){ echo "selected"; }?> ><? echo SI?></option>
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