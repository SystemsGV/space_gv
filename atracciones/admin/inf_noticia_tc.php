<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_noticia_tc.php");
	include("clases/cls_paginador_.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script>
function eliminar(id, img)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_noticia_tc.php?op=3&id=" + id + "&img=" + img;
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
					<td height="30" bgcolor="#F1EEE7" class="titus">&nbsp;&nbsp;MODULO NOTICIAS</td>
				  </tr>
				  <tr>
					<td height="10"></td>
				  </tr>
				</table>
				<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="54" height="25" valign="middle" bgcolor="#DEDAC8" class="titus_tablas" align="center">Nro&nbsp;</td>
					  <td width="205" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Titulo</td>
					  <td width="124" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Estado</td>
					  <td width="166" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Foto</td>
					  <td width="117" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Opciones</td>
					</tr>
					<tr>
					  <td colspan="5" height="2"></td>
				    </tr>
					<?
						$sql="select id_noticia_tc from tbl_noticia_tc order by id_noticia_tc desc";
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,30,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
					//	echo "paginador->pos_final_pag : ".$paginador->pos_final_pag;
						while($contador < $paginador->pos_final_pag)
						{
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0]))
								{
									$noticia_tc= new cls_emp_noticia_tc($registro[0]);
									if($color=="#F2F0EB")
									{
									  $color="#F6F5F5";}
									else{
									  $color="#F2F0EB";
									}
					  ?>
					<tr valign="middle" bgcolor="<? echo $color?>">
					  <td height="26" bgcolor="<? echo $color?>" class="texto_02">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $contador?></td>
					  <td align="left" bgcolor="<? echo $color?>" class="texto_02"><?=urldecode($noticia_tc->get_txt_titulo())?></td>
					  <td align="left" bgcolor="<? echo $color?>" class="texto_02"><?=inc_devuelve_estado($noticia_tc->get_int_estado())?></td>
						  <?
							$foto=$noticia_tc->get_txt_foto();
							if (empty($foto))
							{
							$foto=UPLOAD_NOTICIA_TC."img_noticia_sf.jpg";
							}else
							{
							$foto=UPLOAD_NOTICIA_TC.$noticia_tc->get_txt_foto();
							}
						  ?>
					  <td align="left" bgcolor="<? echo $color?>" class="texto_02"><img src="<?=$foto?>" width="80" height="64" border="0" style="border:#E19913 1px solid" /></td>
					  <td align="left"><a href="frm_noticia_tc.php?id=<? echo $noticia_tc->get_id_noticia_tc()?>"><img src="iconos/icon18_editdoc.gif" border="0" alt="Editar registro" title="Editar registro" /></a>&nbsp;&nbsp; <a href="javascript:eliminar('<? echo $noticia_tc->get_id_noticia_tc()?>','<? echo $foto?>')"><img src="iconos/delete.gif" border="0" alt="Eliminar registro" title="Eliminar registro" /></a></td>
					</tr>
					<?
					}
					$contador++;
					}?>
				  </table>
					<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="205" align="left" height="8"></td>
						<td width="465" align="right"></td>
					  </tr>
					  <tr>
					  
						<td width="205" align="left"><a href="frm_noticia_tc.php"><img src="iconos/ico_nuevo.gif" border="0" alt="Agregar nuevo"></a></td>
						<td width="465" align="right"><?
							$param[0]="";
							$param[1]="";
							$paginador->inc_muestra_paginacion($estilos,$param,400);
							?>
						</td>
					  </tr>
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
