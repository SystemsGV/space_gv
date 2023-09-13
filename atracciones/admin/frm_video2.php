<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");	
	include("clases/cls_emp_video2.php");
	include("clases/class.video.php");

	$idcat=$_GET['idcat'];
	$id_modulos=$_GET['id'];

	$enoteca_modulos = new cls_emp_video($id_modulos);
	$imgyoutube = new YouTube();
	$imgRand=rand(1,2);
	$ulrPuro=explode("&",$enoteca_modulos->get_txt_url());
	$idYoutube=explode("=",$ulrPuro[0]);
	
	include("clases/cls_emp_cliente2.php");
	$cliente= new cls_emp_cliente($_GET['idcl']);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script type="text/javascript" language="JavaScript1.2" src="../validaciones.js"></script>
<script language="javascript" src="calendar.js"></script>
<script language="javascript" src="calendar-es.js"></script>
<script language="javascript" src="calendar-setup.js"></script>

<script type="text/javascript">

function registrar(idcat)
{
	var i;
	i=0;
	if(document.form1.txt_titulo.value=="")
	{
			alert("Por favor, ingresa el titulo");
			document.form1.txt_titulo.focus();
			return;
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_video2.php?op=1&idcat="+idcat;
		document.form1.submit();
	}
}

function editar(id,idcat)
{
	var i;
	i=0;
	if(document.form1.txt_titulo.value=="")
	{
			alert("Por favor, ingresa el titulo");
			document.form1.txt_titulo.focus();
			return;
			i=i+1;
	}

	if(i==0){
		document.form1.action="proc_video2.php?op=2&id="+id+"&idcat="+idcat;
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_video2.php";
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
		index1 = index1 + adres1.indexOf("png");
		index1 = index1 + adres1.indexOf("PNG");
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
		index1 = index1 + adres1.indexOf("png");
		index1 = index1 + adres1.indexOf("PNG");
		
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
			<td height="30" class="titu_secc">&nbsp;&nbsp;VIDEOS - <?=strtoupper($cliente->get_txt_nombre())?></td>
			<td height="30" align="right" valign="bottom"><a href="inf_video2.php?idcat=<?=$idcat?>&idcl=<?=$_GET['idcl'];?>"><img src="iconos/volver.gif" alt="Volver" border="0"></a></td>
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
                <td width="233" height="25"></td>
                <td width="10"></td>
                <td width="638" align="left" bgcolor="#f5f5f5"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">Título del Video</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5">
				<input class="input" name="txt_titulo" value="<?=$enoteca_modulos->get_txt_titulo()?>" maxlength="50" style="width:400px"/>
                  <input name="id" type="hidden" value="<?=$id_modulos?>" />
				  <input name="idcl" type="hidden" value="<?=$_GET['idcl']?>" /></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>
			  <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">URL</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><input class="input" name="txt_link" value="<?=$enoteca_modulos->get_txt_url()?$enoteca_modulos->get_txt_url():"http://"?>" maxlength="150" style="width:400px" /></td>
			  </tr>
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>
			  <? if($enoteca_modulos->get_txt_url()){?>
			  <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">Capturas</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><?="&nbsp;".$imgyoutube->ShowImg($idYoutube[1])."&nbsp;".$imgyoutube->ShowImg($idYoutube[1],2)."&nbsp;".$imgyoutube->ShowImg($idYoutube[1],3);?></td>
			  </tr>
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>
			  <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">Video</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><div style="border:#333333 2px solid; width:400px;"><?=$imgyoutube->EmbedVideo($enoteca_modulos->get_txt_url(),400,280)?></div></td>
			  </tr>			  
			  <? }?>
			 	<tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>          
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">Publicado</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><select name="id_stado" class="select">
                    <option value="0" <? if($enoteca_modulos->get_int_stado()==0){ echo "selected"; }?> ><? echo NO?></option>
                    <option value="1" <? if($enoteca_modulos->get_int_stado()==1){ echo "selected"; }?> ><? echo SI?></option>
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
                <td align="left" bgcolor="#f5f5f5"><? if($id_modulos!="") { ?>
                    <a href="javascript:editar(<?=$id_modulos?>,<?=$idcat?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }else{?>
                    <a href="javascript:registrar(<?=$idcat?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }?>
                  </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="20"></td>
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

