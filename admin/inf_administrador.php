<?
	include("includes/inc_header.php");
	include("includes/constantes.php");
	include("includes/inc_login.php");	
	include("includes/funciones.php");
	include("clases/cls_emp_administrador.php");
	include("clases/cls_paginador_.php");
	$tUsuario=array(1=>"AD",2=>"US",3=>"CC");
	if($_SESSION['session_opt']!="1"){
		header ("location: frm_login.php");
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>...:::  Administrador de Contenidos - FOTOMAGIC.COM  :::...</title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script>
function eliminar(id)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_administrador.php?op=3&id=" + id;
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
					<td height="30" bgcolor="#F1EEE7" class="titus">&nbsp;&nbsp;USUARIOS ADMINISTRADORES</td>
				  </tr>
				  <tr>
					<td height="10"></td>
				  </tr>
				</table>
				<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="60" height="25" valign="middle" bgcolor="#DEDAC8" class="titus_tablas" align="center">Nro&nbsp;</td>
					  <td width="291" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Nombre</td>
					  <td width="255" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">E-mail</td>
					  <td width="170" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Usuario</td>
					  <td width="38" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Tipo</td>
					  <td width="67" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Opciones</td>
					</tr>
					<tr>
					  <td colspan="5" height="2"></td>
				    </tr>
					<?
					/*echo "hola".$_SESSION['session_opt'];*/
						$sql="select id_administrador from administrador";
						$resultado=conn_array ($sql);
					$paginador = new cls_tbl_paginar($resultado,FILASXPAGINA,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
						while($contador < $paginador->pos_final_pag){
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0])){
									$administrador= new cls_administrador($registro[0]);
									if($color=="#F2F0EB"){$color="#F6F5F5";}else{$color="#F2F0EB";}
					  ?>
					<tr valign="middle" bgcolor="<?=$color?>">
					  <td height="26" bgcolor="<?=$color?>" class="texto_02">&nbsp;&nbsp;&nbsp;&nbsp;<?=$contador?></td>
					  <td align="left" bgcolor="<?=$color?>" class="texto_02"><?=$administrador->getNombres()?></td>
					  <td align="left" bgcolor="<?=$color?>" class="texto_02"><?=$administrador->getCorreo()?></td>
					  <td align="left" bgcolor="<?=$color?>" class="texto_02"><?=$administrador->getUsuario()?></td>
					  <td align="left" bgcolor="<?=$color?>" class="texto_02"><?=$tUsuario[$administrador->getInttipo()]?></td>
					  <td align="left"><a href="frm_administrador.php?id=<? echo $administrador->getId_administrador()?>"><img src="iconos/icon18_editdoc.gif" border="0" alt="Editar registro" title="Editar registro" /></a>&nbsp;&nbsp; <a href="javascript:eliminar(<? echo $administrador->getId_administrador()?>)"><img src="iconos/delete.gif" border="0" alt="Eliminar registro" title="Eliminar registro" /></a> </td>
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
						<td width="205" align="left"><a href="frm_administrador.php"><img src="iconos/ico_nuevo.gif" border="0" alt="Agregar nuevo"></a></td>
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
