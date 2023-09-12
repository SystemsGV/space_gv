<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_galeria.php");
	include("clases/cls_paginador_.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador de Contenidos LAGRANJAVILLA</title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script>
function eliminar(id, img)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_galeria.php?op=3&id=" + id + "&img=" + img;
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
					<td height="30" bgcolor="#F1EEE7" class="titus">&nbsp;&nbsp;MODULO BANNERS HOME</td>
				  </tr>
				  <tr>
					<td height="10"></td>
				  </tr>
				</table>
				<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="51" height="25" valign="middle" bgcolor="#DEDAC8" class="titus_tablas" align="center">Nro&nbsp;</td>
					  <td width="317" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Titulo</td>
					  <td width="109" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Estado</td>
					  <td width="314" height="25" align="center" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Foto</td>
					  <td width="90" align="center" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Opciones</td>
					</tr>
					<tr>
					  <td colspan="6" height="2"></td>
				    </tr>
					<?
						$sql="select id_galeria from tbl_galeria order by id_galeria desc";
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,30,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
					//	echo "paginador->pos_final_pag : ".$paginador->pos_final_pag;
						while($contador < $paginador->pos_final_pag)
						{
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0]))
								{
									$noticia_tc= new cls_emp_galeria($registro[0]);
									if($color=="#e8e8e8")
									{
									  $color="#F6F5F5";}
									else{
									  $color="#e8e8e8";
									}
					  ?>
					<tr class="bg_fila" valign="middle" bgcolor="<? echo $color?>">
					<td height="96" class="texto_02">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $contador?></td>
					<td align="left" class="texto_02"><div style="padding-left:5px; padding-right:5px;"><?
                    $texto1=substr(urldecode($noticia_tc->get_txt_titulo()),0,45);
					echo "<a href='".urldecode($noticia_tc->get_txt_titulo())."' target='_blank'>".$texto1."....</a>";
					?></div></td>
					<td align="left" class="texto_02">&nbsp;<?=inc_devuelve_estado($noticia_tc->get_int_estado())?></td>
						  <?
							$foto=$noticia_tc->get_txt_foto();
							if (empty($foto))
							{
							$foto=UPLOAD_GALERIA."img_noticia_sf.jpg";
							}else
							{
							$trozos = explode(".", $noticia_tc->get_txt_foto());
							$nombre=$trozos[0]."_t.".$trozos[1];
							$foto=UPLOAD_GALERIA.$nombre;
							}
						  ?>
					<td align="left" class="texto_02"><div align="center"><img src="<?=$foto?>" width="280" height="90" border="0" style="border:#333333 1px solid" /></div></td>
					<td align="left"><div align="center"><a href="frm_galeria.php?id=<? echo $noticia_tc->get_id_galeria()?>"><img src="iconos/icon18_editdoc.gif" border="0" alt="Editar registro" title="Editar registro" /></a>&nbsp;&nbsp; <a href="javascript:eliminar('<? echo $noticia_tc->get_id_galeria()?>','<? echo $foto?>')"><img src="iconos/delete.gif" border="0" alt="Eliminar registro" title="Eliminar registro" /></a></div></td>
					</tr>
                    <tr>
            		<td colspan="5" height="1" bgcolor="#CCCCCC"></td>
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
					  
						<td width="205" align="left"><a href="frm_galeria.php"><img src="iconos/ico_nuevo.gif" border="0" alt="Agregar nuevo"></a></td>
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

