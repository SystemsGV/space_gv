<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");	
	include("clases/cls_emp_productos.php");
	include("clases/cls_emp_categoria.php");	
//	include("fckeditor/fckeditor.php") ;

	$id_producto=$_GET['id_producto'];	
	$enoteca_modulos = new cls_emp_productos($id_producto);	
	$coloma_cate = new cls_emp_categoria($enoteca_modulos->get_id_categoria());	
	$nombre_categoria=$coloma_cate->get_txt_nombre();
	$cp=$_REQUEST['cp'];
	
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

<script type="text/javascript">
function ver()
{
location=document.form2.txt_detalle.options[document.form2.txt_detalle.selectedIndex].value;
val=document.form2.txt_detalle.value;

alert("seleccionado : ".val);
return false;
}

function registrar(codigo)

{

	var i;
	var x;

	i=0;
/*val=document.form2.txt_detalle.value;

alert("seleccionado : ".val);*/

	if(document.form1.txt_id_categoria.value=="0")
	{
			alert("Por favor, seleccione el Tipo");
			document.form1.txt_id_categoria.focus();
			return;
			i=i+1;
	}
/*	if(document.form2.txt_detalle.value=="" || document.form2.txt_detalle.value==""){
		alert("Por favor, seleccione el especialidad");
			document.form2.txt_detalle.value.focus();
			return;
			i=i+1;
		
	}*/
	if(document.form1.txt_titulo.value=="")
	{
			alert("Por favor, ingresa el Titulo");
			document.form1.txt_titulo.focus();
			return;
			i=i+1;
	}
	
	if(document.form1.txt_autor.value=="")
	{
			alert("Por favor, ingresa el Autor");
			document.form1.txt_autor.focus();
			return;
			i=i+1;
	}
	
	if(document.form1.txt_tema.value=="")
	{
			alert("Por favor, ingresa el Tema");
			document.form1.txt_tema.focus();
			return;
			i=i+1;
	}

	
// Valida para la foto 1
   if(document.form1.txt_file.value!="" && i==0)
	{	adres1 = document.form1.txt_file.value;
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
			document.form1.txt_file.focus();
			return;
			i=i+1;
		}	

	}


	if(i==0){

//alert(document.form1.txt_codigo.value);
		document.form1.action="proc_productos.php?cp=<?=$cp?>&op=1&codigo="+ document.form1.txt_titulo.value;
		document.form1.submit();
	}

}

function editar(id)
{
	var i;
	i=0;
	if(document.form1.txt_titulo.value=="")
	{
			alert("Por favor, ingresa el Titulo");
			document.form1.txt_titulo.focus();
			return;
			i=i+1;
	}
	

// Valida para la foto 1
   if(document.form1.txt_file.value!="" && i==0)
	{	adres1 = document.form1.txt_file.value;
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
			document.form1.txt_file.focus();
			return;
			i=i+1;
		}	

	}

	if(i==0){

		document.form1.action="proc_productos.php?cp=<?=$cp?>&op=2&id="+id;

		document.form1.submit();

	}

}



function nuevo()

{

	document.form1.action="frm_productos.php";

	document.form1.submit();

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
			<td height="30" bgcolor="#DEDAC8" class="titus">&nbsp;&nbsp;DOCUMENTOS - <?php if($cp=="1"){?>CURSO DE FACULTAD<?php }else{?>BANCO DE INFORMACI&oacute;N</span><?php }?></td>
			<td height="30" bgcolor="#DEDAC8" align="right" valign="bottom"><a href="inf_productos.php?cp=<?=$cp?>"><img src="iconos/volver.gif" alt="Volver" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
                <td height="5"></td>
                <td></td>
                <td width="648" align="left" bgcolor="#F9F6ED"></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas"><?php if($cp=="1"){?>Curso<?php }else{?>Tipo</span><?php }?></td>
                <td>:</td>
                <td align="left">
				<? if (empty($id_producto)){?>
				<select name="txt_id_categoria" class="select"  onChange="pedirDatos()">
				<option value="0" selected="selected">Seleccione...</option>
				<?
				$sql="select * from tbl_categoria where int_estado=1 and txt_cursofacultad='$cp' order by txt_nombre asc";
				$resultado=conn_array ($sql);
				$num_elementos=count($resultado);
				if ($num_elementos > 0)
				{
					$contador=0;
						while($contador < $num_elementos)
					{
															
					?>
					<option value="<?=$resultado[$contador][0]?>" <? if ($enoteca_modulos->get_id_categoria()==$resultado[$contador][0]){?> selected <? }?>><?=$resultado[$contador][1]?></option>
					<?
					$contador++;
					}
				}
				?>
				</select>
				<? }else{?>
				<div class="texto_03" style="border:1px solid #404041; width:163px;">
				&nbsp;<?=$nombre_categoria?>
				</div>
				<input type="hidden" name="txt_id_categoria" value="<?=$enoteca_modulos->get_id_categoria()?>">
				<? }?>
				</td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas"><?php if($cp=="1"){?>A&ntilde;o<?php }else{?>Especialidad<?php }?></span></td>
                <td>:</td>
                <td align="left">
				<? if (empty($id_producto)){?>
				<div class="texto_03" id="resultado"  style="border:1px solid #404041; width:163px;">
				<!--sin filtrado<input type="text" name="det" value="1">-->
				</div>
				<? }else{ ?>
				
				<select name="txt_id_cate_det" id="txt_id_cate_det" class="select" style="width:163px">
				<?
				
				$sql="select * from tbl_categoria_det where id_categoria=".$enoteca_modulos->get_id_categoria()." and int_estado=1 order by txt_nombre asc";
				$resultado=conn_array ($sql);
				$num_elementos=count($resultado);
				if ($num_elementos > 0)
				{
					$contador=0;
						while($contador < $num_elementos)
					{
															
					?>
					<option value="<?=$resultado[$contador][0]?>"<? if ($resultado[$contador][0]==$enoteca_modulos->get_id_cate_det()){?> selected <? }?>><?=$resultado[$contador][2]?></option>
					<?
					$contador++;
					}
				}
				?>
				</select>
				<? }?>
				
				</td>
              </tr>			  
              <tr bgcolor="#F9F6ED">
                <td height="25" align="right" bgcolor="#F9F6ED" class="titus_tablas">Titulo</td>
                <td>:</td>
                <td align="left"><input name="txt_titulo" type="text" class="input"  size="40" style="width:280px;" value="<?=$enoteca_modulos->get_txt_titulo()?>" /><span id="validar_codigo" class="menu1"></span> 
				</td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td width="220" height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas">&nbsp;&nbsp;&nbsp;Autor</span></td>
                <td width="13">:</td>
                <td align="left"><input name="txt_autor" type="text" class="input"  size="40" style="width:280px;" value="<?=$enoteca_modulos->get_txt_autor()?>" /></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Tema (tags)</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_tema" type="text" class="input"  size="40" style="width:280px;" value="<?=$enoteca_modulos->get_txt_tema()?>" /></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Editorial</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_editorial" type="text" class="input"  size="40" style="width:280px;" value="<?=$enoteca_modulos->get_txt_editorial()?>" /></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Edici&amp;oacut&oacute; V&oacute;n</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_edicion" type="text" class="input"  size="40" style="width:280px;" value="<?=$enoteca_modulos->get_txt_edicion()?>" /></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Idioma</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><select name="cbo_idioma" class="select">
				<option value="Aleman" <? if($enoteca_modulos->get_txt_idioma()=="Aleman"){ echo "selected"; }?> ><? echo "Aleman"?></option>
				<option value="Chino" <? if($enoteca_modulos->get_txt_idioma()=="Chino"){ echo "selected"; }?> ><? echo "Chino"?></option>
				<option value="Espanol" <? if($enoteca_modulos->get_txt_idioma()=="Espanol"){ echo "selected"; }?> ><? echo "Espa&ntilde;ol"?></option>
				<option value="Frances" <? if($enoteca_modulos->get_txt_idioma()=="Frances"){ echo "selected"; }?> ><? echo "Frances"?></option>
				<option value="Holandes" <? if($enoteca_modulos->get_txt_idioma()=="Holandes"){ echo "selected"; }?> ><? echo "Holandes"?></option>
				<option value="Ingles" <? if($enoteca_modulos->get_txt_idioma()=="Ingles"){ echo "selected"; }?> ><? echo "Ingles"?></option>
				<option value="Italiano" <? if($enoteca_modulos->get_txt_idioma()=="Italiano"){ echo "selected"; }?> ><? echo "Italiano"?></option>
				<option value="Japones" <? if($enoteca_modulos->get_txt_idioma()=="Japones"){ echo "selected"; }?> ><? echo "Japones"?></option>
				<option value="Portugues" <? if($enoteca_modulos->get_txt_idioma()=="Portugues"){ echo "selected"; }?> ><? echo "Portugues"?></option>
				<option value="Ruso" <? if($enoteca_modulos->get_txt_idioma()=="Ruso"){ echo "selected"; }?> ><? echo "Ruso"?></option>
                  </select>                </td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Archivo</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_file" type="file" class="input" id="txt_file" size="34" style="width:280px;" /></td>
              </tr>
              <? if($enoteca_modulos->get_txt_file()!="") {?>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas"><div align="right">Archivo actual</div></td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><table width="255" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <!-- <td width="135"><img src="<? echo UPLOAD_PRODUCTO.$enoteca_modulos->get_txt_file()?>" width="100" height="32" style="border:#FFFFFF 1px solid" /></td> -->
					  <td width="135" class="texto_02"><a href="<? echo UPLOAD_PRODUCTO.$enoteca_modulos->get_txt_file()?>" target="other">[Abrir Archivo]</a></td>
                      <td width="35" class="titus_tablas">&nbsp;Quitar</td>
                      <td width="85"><input name="chk_quitar" type="checkbox" id="chk_quitar" value="1" />
                          <input name="hid_txt_imagen" type="hidden" value="<? echo $enoteca_modulos->get_txt_file()?>" />                      </td>
                    </tr>
                </table></td>
              </tr>
              <? }?>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Tipo de documento</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><select name="txt_tipodoc" class="select">
				<option value="Archivo imagen" <? if($enoteca_modulos->get_txt_tipodoc()=="Archivo imagen"){ echo "selected"; }?> ><? echo "Archivo imagen"?></option>
				<option value="Archivo video" <? if($enoteca_modulos->get_txt_tipodoc()=="Archivo video"){ echo "selected"; }?> ><? echo "Archivo video"?></option>
				<option value="Archivo audio" <? if($enoteca_modulos->get_txt_tipodoc()=="Archivo audio"){ echo "selected"; }?> ><? echo "Archivo audio"?></option>
				<option value="Archivo word" <? if($enoteca_modulos->get_txt_tipodoc()=="Archivo word"){ echo "selected"; }?> ><? echo "Archivo word"?></option>
				<option value="Archivo excel" <? if($enoteca_modulos->get_txt_tipodoc()=="Archivo excel"){ echo "selected"; }?> ><? echo "Archivo excel"?></option>
				<option value="Archivo powerpoint" <? if($enoteca_modulos->get_txt_tipodoc()=="Archivo powerpoint"){ echo "selected"; }?> ><? echo "Archivo powerpoint"?></option>
				<option value="Archivo acrobat PDF" <? if($enoteca_modulos->get_txt_tipodoc()=="Archivo acrobat PDF"){ echo "selected"; }?> ><? echo "Archivo acrobat PDF"?></option>
				<option value="Programa" <? if($enoteca_modulos->get_txt_tipodoc()=="Programa"){ echo "selected"; }?> ><? echo "Programa"?></option>
				<option value="Otros" <? if($enoteca_modulos->get_txt_tipodoc()=="Otros"){ echo "selected"; }?> ><? echo "Otros"?></option>				
                  </select>      </td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td width="220" height="25" align="right" bgcolor="#F9F6ED"><span class="titus_tablas">&nbsp;&nbsp;&nbsp;Descripci&oacute;n</span></td>
                <td width="13">:</td>
                <td align="left"><textarea name="txt_descripcion" cols="40" class="input" style="width:520px; height:118px"><?=$enoteca_modulos->get_txt_descripcion()?></textarea></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Ciclo</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_ciclo" type="text" class="input"  size="40" style="width:280px;" value="<?=$enoteca_modulos->get_txt_ciclo()?>" /></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Fecha de publicaci&oacute;n</td>
                <td>:</td>
				<?
				$txt_fecha=$enoteca_modulos->get_fecha_public();
				if (empty($txt_fecha))
				{$txt_fecha=date("Y-m-d");}
				else
				{$txt_fecha=$enoteca_modulos->get_fecha_public();}
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
                <td height="26" align="right" class="titus_tablas">Condici&oacute;n</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><select name="id_public" class="select">
                    <option value="0" <? if($enoteca_modulos->get_int_public()==0){ echo "selected"; }?> ><? echo PUBLICO?></option>
                    <option value="1" <? if($enoteca_modulos->get_int_public()==1){ echo "selected"; }?> ><? echo PRIVADO?></option>
                  </select>               &nbsp;&nbsp;<span class="texto_02">(para p&uacute;blico en general o exclusivo para socios)</span></td>
              </tr>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="right" class="titus_tablas">Publicado</td>
                <td>:</td>
                <td align="left" bgcolor="#F9F6ED"><select name="id_estado" class="select">
                    <option value="0" <? if($enoteca_modulos->get_int_estado()==0){ echo "selected"; }?> ><? echo NO?></option>
                    <option value="1" <? if($enoteca_modulos->get_int_estado()==1){ echo "selected"; }?> ><? echo SI?></option>
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
                <td align="left" bgcolor="#F9F6ED"><? if($id_producto!="") { ?>
                    &nbsp;<a href="javascript:editar(<?=$id_producto?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }else{?>
                    &nbsp;<a href="javascript:registrar(document.form1.txt_titulo.value);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }?>
                  &nbsp;&nbsp;&nbsp;<a href="javascript:nuevo();"><img src="iconos/nuevo.gif" alt="Nuevo registro" border="0"></a>&nbsp;</td>
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
<?
//echo "La seccion es: ". $_SESSION['validacion'];
?>

<script>
	<? if((int)$_SESSION['validacion']==1){
		$_SESSION['validacion'] = "";
	?>
		alert("No se ingreso el registro porque el codigo ya existe.");
	<? }?>
</script>

</div>
</body>
</html>

