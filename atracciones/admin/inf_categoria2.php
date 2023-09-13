<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_categoria2.php");
	include("clases/cls_paginador_.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script>
function eliminar(idcat)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_categoria2.php?op=3&idcat="+idcat;
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
				<td width="881" height="4">
                <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
                  	<td width="32"><img src="iconos/ic_inf.png" alt="" border="0" /></td>
					<td width="849" height="30" class="titu_secc"> &nbsp;&nbsp;PRE-ORDENES: CATEGORIAS</td>
				  </tr>
                  <tr>
                  <td colspan="2" height="10"></td>
                  </tr>
				</table>
				<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="52" height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center">NRO</td>
					  <td width="415" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">NOMBRE DE LA CATEGORIA</td>					  
					  <td width="75" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td width="75" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">ARTICULOS</div></td>
					  <td width="75" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td width="189" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">OPCIONES</div></td>
					</tr>
					<tr>
					  <td colspan="6" height="2"></td>
				    </tr>
					<?
						$sql="select id_categoria from tbl_categoria2 order by txt_nombre";
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,FILASXPAGINA,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
						while($contador < $paginador->pos_final_pag){
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0])){
									$cliente= new cls_emp_categoria($registro[0]);
									if($color=="#e8e8e8"){$color="#F6F5F5";}else{$color="#e8e8e8";}
					  ?>
					<tr valign="middle" bgcolor="<?=$color?>" class="bg_fila">
					  <td height="36" class="texto_02">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $contador?></td>
					  <td align="left" class="texto_02"><?=$cliente->get_txt_nombre()?></td>
					  <td align="left" class="texto_02">&nbsp;</td>
					  <td align="left" class="texto_02"><div align="center"><a href="inf_clientes2.php?idcat=<?=$cliente->get_id_categoria()?>"><img src="iconos/ic_addart.png" border="0" alt="Administrar articulos" title="Administrar articulos" /></a></div></td>
					  <td align="left" class="texto_02">&nbsp;</td>
					  <td align="center"><div align="center"><a href="frm_categoria2.php?idcat=<?=$cliente->get_id_categoria()?>"><img src="iconos/ic_edit.png" border="0" alt="Editar registro" title="Editar registro" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:eliminar(<?=$cliente->get_id_categoria()?>)"><img src="iconos/ic_delete.png" border="0" alt="Eliminar registro" title="Eliminar registro" /></a> </div></td>
					</tr>
                    <tr>
                    <td colspan="6" height="1" bgcolor="#CCCCCC"></td>
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
						<td width="205" align="left"><a href="frm_categoria2.php"><img src="iconos/ico_nuevo.gif" border="0" alt="Agregar nuevo"></a></td>
						<td width="465" align="right"><?
							$param[0]="";$css[1]="txt_gris10";$css[2]="txt_gris10";
							$param[1]="";
							$paginador->inc_muestra_paginacion($css,$param,400);
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
	<td height="30"></td>
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
