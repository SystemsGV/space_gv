<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");	
	include("clases/cls_emp_galeria.php");

	$id=$_GET['id'];
	$noticia_tc = new cls_emp_galeria($id);	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
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
			alert("Tipo de archivo inv�lido para la foto chica. Solo JPG o Gif");
			document.form1.txt_imagen.focus();
			return;
			i=i+1;
		}	
	}

	if(i==0){
		document.form1.action="proc_galeria.php?op=1";
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
			alert("Tipo de archivo inv�lido para la foto chica. Solo JPG o Gif");
			document.form1.txt_imagen.focus();
			return;
			i=i+1;
		}	
	}

	if(i==0){
		document.form1.action="proc_galeria.php?op=2&id="+id;
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_galeria.php";
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
			alert("Tipo de archivo inv�lido para la foto chica. Solo JPG o Gif");
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
			alert("Tipo de archivo inv�lido para la foto grande. Solo JPG o Gif");
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
  <td bgcolor="#8f9fb4" colspan="3" width="910" height="1"></td>
  </tr>
  <tr>
  <td width="1" bgcolor="#8f9fb4"></td>
  <td width="908">
	<table width="908" border="0" cellpadding="0" cellspacing="0">
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
			<td height="30" class="titu_secc">&nbsp;&nbsp;MODULO BANNERS</td>
			<td height="30" align="right" valign="bottom"><a href="inf_galeria.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a></td>
		  </tr>
		  <tr>
			<td height="10"></td>
		  </tr>
		</table>
		
		
          <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <tr bgcolor="#989898">
                <td colspan="3" height="1"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" align="center" bgcolor="#ffffff" class="azulbold"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td width="209" height="15"></td>
                <td width="11"></td>
                <td width="661" align="left" bgcolor="#f5f5f5"></td>
              </tr>			  
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">Titulo Banner ESPA�OL</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><textarea name="txt_titulo2" cols="40" class="input" style="width:550px; height:60px; padding:5px 5px 5px 5px;"><?=urldecode($noticia_tc->get_txt_titulo2())?></textarea></td>
              </tr>			  
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>     
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">Titulo Banner INGLES</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><textarea name="txt_titulo" cols="40" class="input" style="width:550px; height:60px; padding:5px 5px 5px 5px;"><?=urldecode($noticia_tc->get_txt_titulo())?>
                  </textarea></td>
              </tr>			  
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">Banner</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><input name="txt_imagen" type="file" class="input" id="txt_imagen" size="30" /></td>
              </tr>
              <? if($noticia_tc->get_txt_foto()!="") {?>
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos"><div align="right">Banner actual</div></td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><table width="255" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="135"><img src="<? echo UPLOAD_GALERIA.$noticia_tc->get_txt_foto()?>" width="400" height="90" style="border:#666666 1px solid" /></td>
                      <td width="35" class="texto_campos">&nbsp;Quitar </td>
                      <td width="85"><input name="chk_quitar" type="checkbox" id="chk_quitar" value="1" />
                          <input name="hid_txt_imagen" type="hidden" value="<? echo $noticia_tc->get_txt_foto()?>" />                      </td>
                    </tr>
                </table></td>
              </tr>
			  <? }?>
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">Publicado</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><select name="int_estado" class="select">
                    <option value="0" <? if($noticia_tc->get_int_estado()==0){ echo "selected"; }?> ><? echo NO?></option>
                    <option value="1" <? if($noticia_tc->get_int_estado()==1){ echo "selected"; }?> ><? echo SI?></option>
                  </select>                </td>
              </tr>
              
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;</td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><? if($id!="") { ?>
                    &nbsp;<a href="javascript:editar(<?=$id?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }else{?>
                    &nbsp;<a href="javascript:registrar();"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }?>                </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="30"></td>
                <td></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>
              <tr bgcolor="#989898">
                <td colspan="3" height="1"></td>
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