<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("includes/fc_global.php");
	include("clases/cls_emp_encuesta.php");
	include("clases/cls_emp_respuesta.php");
	include("clases/cls_paginador_.php");
	conn_abre();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador de Contenidos LAGRANJAVILLA</title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script>
function eliminar(id)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_encuesta.php?op=3&id=" + id;
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
					<td height="30" bgcolor="#F1EEE7" class="titus">&nbsp;&nbsp;ENCUESTAS</td>
				  </tr>
				  <tr>
					<td height="10"></td>
				  </tr>
				</table>
				<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="51" height="25" valign="middle" bgcolor="#DEDAC8" class="titus_tablas" align="center">Nro&nbsp;</td>
					  <td width="530" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Encuesta</td>
					  <td width="106" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Fecha</td>					
					  <td width="92" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Total Votos</td>
					  <td width="32" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">ES</td>
					  <td width="70" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Opciones</td>
					</tr>
					<tr>
					  <td colspan="5" height="2"></td>
				    </tr>
					<?
						$sql="select id_encuesta from tbl_encuesta";
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,FILASXPAGINA,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
						while($contador < $paginador->pos_final_pag)
						{
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0]))
								{
									$encuesta= new cls_emp_encuesta($registro[0]);
									if($color=="#F2F0EB"){$color="#F6F5F5";}else{$color="#F2F0EB";}
									$ES=array(0=>"NO",1=>"SI");
									?>
					<tr valign="middle" bgcolor="<? echo $color?>">
					  <td height="26" bgcolor="<? echo $color?>" class="texto_02">&nbsp;&nbsp;&nbsp;&nbsp;<?=$contador?></td>
					  <td align="left" bgcolor="<? echo $color?>" class="texto_02"><?=$encuesta->get_txt_encuesta()?></td>
					  <td align="left" bgcolor="<? echo $color?>" class="texto_02"><?=$encuesta->get_txt_fecha()?></td>
					  <td align="left" bgcolor="<? echo $color?>" class="texto_02"><?=sumTot("int_votos",$encuesta->get_id_encuesta());?></td>
					  <td align="left" bgcolor="<?=$color?>" class="texto_02"><?=$ES[$encuesta->get_int_estado()];?></td>
					  <td align="center"><a href="frm_encuesta.php?id=<?=$encuesta->get_id_encuesta()?>"><img src="iconos/icon18_editdoc.gif" border="0" alt="Editar registro" title="Editar registro" /></a>&nbsp;&nbsp; <a href="javascript:eliminar(<?=$encuesta->get_id_encuesta()?>)"><img src="iconos/delete.gif" border="0" alt="Eliminar registro" title="Eliminar registro" /></a> </td>
					</tr>
					<?
					}
					$contador++;
					}?>
				  </table>
					<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="205" align="left" height="8"><table width="400" border="0">
  <tr>
    <td class="titus_tablas">ES=ENCUESTA DE LA SEMANA</td>
  </tr>
</table>
</td>
						<td width="465" align="right"></td>
					  </tr>
					  <tr>
						<td width="205" align="left"><a href="frm_encuesta.php"><img src="iconos/ico_nuevo.gif" border="0" alt="Agregar nuevo"></a></td>
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
