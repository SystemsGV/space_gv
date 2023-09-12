<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");	
	include("clases/cls_emp_cupon.php");
	$id_producto=1;	
	$enoteca_modulos = new cls_emp_cupon($id_producto);	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Administrador de Contenidos LAGRANJAVILLA</title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<link href="calendar.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script type="text/javascript" language="JavaScript1.2" src="../validaciones.js"></script>
<script language="JavaScript" type="text/javascript" src="validar.js"></script>
<script language="javascript" src="calendar.js"></script>
<script language="javascript" src="calendar-es.js"></script>
<script language="javascript" src="calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.js"></script>
<script language="JavaScript" type="text/javascript" src="cbrte/richtext_compressed.js"></script>
<script type="text/javascript">
function editar(id)
{
	var i;
	i=0;
	if(document.form1.txt_des1.value=="")
	{
			alert("Por favor, ingrese descripcion de cupon 1");
			document.form1.txt_des1.focus();
			return;
			i=i+1;
	}
	if(document.form1.txt_des2.value=="")
	{
			alert("Por favor, ingrese descripcion de cupon 2");
			document.form1.txt_des2.focus();
			return;
			i=i+1;
	}
	if(document.form1.txt_des3.value=="")
	{
			alert("Por favor, ingrese descripcion de cupon 3");
			document.form1.txt_des3.focus();
			return;
			i=i+1;
	}
	if(document.form1.txt_des4.value=="")
	{
			alert("Por favor, ingrese descripcion de cupon 4");
			document.form1.txt_des4.focus();
			return;
			i=i+1;
	}
	if(document.form1.txt_des5.value=="")
	{
			alert("Por favor, ingrese descripcion de cupon 5");
			document.form1.txt_des5.focus();
			return;
			i=i+1;
	}

// Valida para la foto 1
   if(document.form1.txt_file1.value!="" && i==0)
	{	adres1 = document.form1.txt_file1.value;
		index1 = adres1.indexOf(".jpg");
		index1 = index1 + adres1.indexOf("JPG");
		index1 = index1 + adres1.indexOf("jpeg");
		index1 = index1 + adres1.indexOf("JPEG");
		index1 = index1 + adres1.indexOf("gif");
	    index1 = index1 + adres1.indexOf("GIF");
		
		
		index1 = index1 + adres1.indexOf("DOC");
		index1 = index1 + adres1.indexOf("doc");
		index1 = index1 + adres1.indexOf("XLS");
		index1 = index1 + adres1.indexOf("xls");
		index1 = index1 + adres1.indexOf("PDF");
		index1 = index1 + adres1.indexOf("pdf");
		index1 = index1 + adres1.indexOf("EXE");
		index1 = index1 + adres1.indexOf("exe");
		index1 = index1 + adres1.indexOf("PPT");
		index1 = index1 + adres1.indexOf("ppt");
		//Si no es del formato establecido
		if (index1 == -6)
		{	
			alert("Tipo de archivo inválido para el Archivo");
			document.form1.txt_file1.focus();
			return;
			i=i+1;
		}	

	}

	if(i==0){
		document.form1.action="proc_promociones.php?op=2&id="+id;
		document.form1.submit();

	}

}



function validar_foto(i)
{
// Valida para la foto 1
   if(document.form1.txt_file.value!="" && i==0)
	{	adres1 = document.form1.txt_file.value;
		index1 = adres1.indexOf(".jpg");
		index1 = index1 + adres1.indexOf("JPG");
		index1 = index1 + adres1.indexOf("jpeg");
		index1 = index1 + adres1.indexOf("JPEG");
		index1 = index1 + adres1.indexOf("gif");
	    index1 = index1 + adres1.indexOf("GIF");
		
		//Si no es del formato establecido
		if (index1 == -6)
		{	
			alert("Tipo de archivo inválido para el Archivo");
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
			<td height="30" bgcolor="#DEDAC8" class="titus">&nbsp;&nbsp;PROMOCIONES</td>
			<td height="30" bgcolor="#DEDAC8" align="right" valign="bottom"><!--<a href="inf_productos.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a>-->&nbsp;&nbsp;&nbsp;&nbsp;</td>
		  </tr>
		  <tr>
			<td height="10">

 </td>
		  </tr>
		</table>
		
		
          <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return submitForm();">
              <tr>
                <td height="1" colspan="3" align="center" bgcolor="#ffffff" class="azulbold"></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="5"></td>
                <td></td>
                <td width="648" align="left" bgcolor="#F9F6ED"></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas">Cupon 1</span></td>
                <td>:</td>
                <td align="left"><input name="txt_file1" type="file" class="input" id="txt_file1" size="34" style="width:280px;" /></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas"><div align="right"></div></td>
                <td>:</td>
                <td bgcolor="#F9F6ED"><table width="255" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="135"><img src="<?="../".UPLOAD_CUPON.$enoteca_modulos->get_txt_val1();?>" width="80" height="50" style="border:#FEBD1F 1px solid" /></td>
                      <td width="35" class="titus_tablas">&nbsp;Quitar</td>
                      <td width="85"><input name="chk_quitar1" type="checkbox" id="chk_quitar1" value="1" />
                          <input name="hid_txt_imagen1" type="hidden" value="<? echo $enoteca_modulos->get_txt_val1()?>" />                      </td>
					  <td><textarea name="txt_des1" cols="40" class="input" style="width:400px; height:50px"><?=$enoteca_modulos->get_txt_des1()?></textarea>
					  </td>
                    </tr>
                </table></td>
              </tr>	  
               <tr bgcolor="#F9F6ED">
                <td height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas">Cupon 2</span></td>
                <td>:</td>
                <td align="left"><input name="txt_file2" type="file" class="input" id="txt_file2" size="34" style="width:280px;" /></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas"><div align="right"></div></td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><table width="255" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="135"><img src="<?="../".UPLOAD_CUPON.$enoteca_modulos->get_txt_val2()?>" width="80" height="50" style="border:#FEBD1F 1px solid" /></td>
                      <td width="35" class="titus_tablas">&nbsp;Quitar</td>
                      <td width="85"><input name="chk_quitar2" type="checkbox" id="chk_quitar2" value="1" />
                          <input name="hid_txt_imagen2" type="hidden" value="<? echo $enoteca_modulos->get_txt_val2()?>" />                      </td>
						<td><textarea name="txt_des2" cols="40" class="input" style="width:400px; height:50px"><?=$enoteca_modulos->get_txt_des2()?></textarea>
					  </td>  
                    </tr>
                </table></td>
              </tr>	
               <tr bgcolor="#F9F6ED">
                <td height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas">Cupon 3</span></td>
                <td>:</td>
                <td align="left"><input name="txt_file3" type="file" class="input" id="txt_file3" size="34" style="width:280px;" /></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas"><div align="right"></div></td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><table width="255" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="135"><img src="<?="../".UPLOAD_CUPON.$enoteca_modulos->get_txt_val3()?>" width="80" height="50" style="border:#FEBD1F 1px solid" /></td>
                      <td width="35" class="titus_tablas">&nbsp;Quitar</td>
                      <td width="85"><input name="chk_quitar3" type="checkbox" id="chk_quitar3" value="1" />
                          <input name="hid_txt_imagen3" type="hidden" value="<? echo $enoteca_modulos->get_txt_val3()?>" />                      </td>
						  <td><textarea name="txt_des3" cols="40" class="input" style="width:400px; height:50px"><?=$enoteca_modulos->get_txt_des3()?></textarea>
					  </td>
                    </tr>
                </table></td>
              </tr>
               <tr bgcolor="#F9F6ED">
                <td height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas">Cupon 4</span></td>
                <td>:</td>
                <td align="left"><input name="txt_file4" type="file" class="input" id="txt_file4" size="34" style="width:280px;" /></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas"><div align="right"></div></td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><table width="255" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="135"><img src="<?="../".UPLOAD_CUPON.$enoteca_modulos->get_txt_val4()?>" width="80" height="50" style="border:#FEBD1F 1px solid" /></td>
                      <td width="35" class="titus_tablas">&nbsp;Quitar</td>
                      <td width="85"><input name="chk_quitar4" type="checkbox" id="chk_quitar4" value="1" />
                          <input name="hid_txt_imagen4" type="hidden" value="<? echo $enoteca_modulos->get_txt_val4()?>" />                      </td>
						  <td><textarea name="txt_des4" cols="40" class="input" style="width:400px; height:50px"><?=$enoteca_modulos->get_txt_des4()?></textarea>
					  </td>
                    </tr>
                </table></td>
              </tr>
               <tr bgcolor="#F9F6ED">
                <td height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas">Cupon 5</span></td>
                <td>:</td>
                <td align="left"><input name="txt_file5" type="file" class="input" id="txt_file5" size="34" style="width:280px;" /></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas"><div align="right"></div></td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><table width="255" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="135"><img src="<?="../".UPLOAD_CUPON.$enoteca_modulos->get_txt_val5()?>" width="80" height="50" style="border:#FEBD1F 1px solid" /></td>
                      <td width="35" class="titus_tablas">&nbsp;Quitar</td>
                      <td width="85"><input name="chk_quitar5" type="checkbox" id="chk_quitar5" value="1" />
                          <input name="hid_txt_imagen5" type="hidden" value="<?=$enoteca_modulos->get_txt_val5()?>" /></td>
						<td><textarea name="txt_des5" cols="40" class="input" style="width:400px; height:50px"><?=$enoteca_modulos->get_txt_des5()?></textarea>
					  </td>
                    </tr>
                </table><br></td>
              </tr>

			   <tr bgcolor="#F9F6ED">
                <td height="5"></td>
                <td></td>
                <td align="left" bgcolor="#F9F6ED">&nbsp;</td>
              </tr>        
              <tr bgcolor="#F9F6ED">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><? if($id_producto!="") { ?>
                    &nbsp;<a href="javascript:editar(<?=$id_producto?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }else{?>
                    &nbsp;<a href="javascript:registrar(document.form1.txt_descripcion.value);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }?>
                  &nbsp;&nbsp;&nbsp;<!--<a href="javascript:nuevo();"><img src="iconos/nuevo.gif" alt="Nuevo registro" border="0"></a>-->&nbsp;</td>
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

