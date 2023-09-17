<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_cliente.php");
	include("clases/cls_emp_categoria.php");
	include("clases/cls_paginador_.php");
	
	$idcat= $_GET['idcat'];
	$objcat = new cls_emp_categoria($_GET['idcat']);
	$idcats= $objcat->get_id_categoria().trim(strtolower(preg_replace('([^A-Za-z0-9])', '',$objcat->get_txt_nombre())));
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script>
function eliminar(id,idcat)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_clientes.php?op=3&id="+id+"&idcat="+idcat;
	}
}
</script>
</head>

<body>
<div align="center" width="100%">
<br>
<table bgcolor="#FFFFFF" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td bgcolor="#8f9fb4" colspan="3" width="910" height="1"></td>
  </tr>
  <tr>
  <td width="1" bgcolor="#8f9fb4"></td>
  <td width="100%">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<?include("cabecera.php")?>
	<tr>
	<td>
	<div style="margin-left:20px; margin-right:20px;">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
			  <tr>
				<td width="100%" height="4">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
                  	<td width="32"><img src="iconos/ic_inf.png" alt="" border="0" /></td>
					<td width="849" height="30" class="titu_secc"> &nbsp;&nbsp;Paquetes Promocionales: <?=$objcat->get_txt_nombre();?></td>
                    <td height="30" align="right"><a href="inf_categoria.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a></td>
				  </tr>
                  <tr>
                  <td colspan="3" height="10"></td>
                  </tr>
				</table>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="44" height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="left">&nbsp;&nbsp;&nbsp;NRO</td>
					  <td width="228" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">NOMBRE PAQUETE</td>					  
                      <td width="129" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">PORTADA</div></td>
					  <td width="71" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">FOTOS</div></td>
					  <td width="79" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">VIDEO</div></td>
					  <td width="69" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">HOME</div></td>
                      <td width="80" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">NRO.HOME</div></td>
                      <td width="70" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">PUBLIC</div></td>
					  <td width="111" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">OPCIONES</div></td>
					</tr>
					<tr>
					  <td colspan="9" height="2"></td>
				    </tr>
					<?
						if($_POST['txt_cliente']!=""){$campo1="and txt_nombre like '%$_POST[txt_cliente]%'";}else{$campo1="";}
						if($_POST['txt_email']!=""){$campo2="and txt_email like '%$_POST[txt_email]%'";}else{$campo2="";}
						$sql="select id_cliente from tbl_cliente where txt_password=1";	
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,FILASXPAGINA,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
						while($contador < $paginador->pos_final_pag){
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0])){
									$cliente= new cls_emp_cliente($registro[0]);
									if($color=="#e8e8e8"){$color="#F6F5F5";}else{$color="#e8e8e8";}
					  ?>
					<tr valign="middle" bgcolor="<?=$color?>" class="bg_fila">
					  <td height="100" class="texto_02">&nbsp;&nbsp;&nbsp;<? echo $contador?></td>
					  <td align="left" class="texto_02"><b><?=$cliente->get_txt_nombre()?></b></td>
                     	  <?
							$foto=$cliente->get_txt_email();
							if (empty($foto))
							{
							$foto=UPLOAD_FOTOS."img_galeria_sf.jpg";
							}else
							{
							$trozos = explode(".", $cliente->get_txt_email());
							$nombre=$trozos[0]."_t.".$trozos[1];
							$foto=UPLOAD_FOTOS.$nombre;
							}
						  ?>
                      <td align="left" class="texto_02"><div align="center"><img src="<?=$foto?>" height="90" border="0" style="border:#666666 1px solid" /></div></td>
					  <td align="left" class="texto_02"><div align="center"><a href="inf_fotos.php?idcat=<?=$idcat?>&idcl=<?=$cliente->get_id_cliente()?>"><img src="iconos/ic_pics.png" border="0" alt="Editar Fotos" /></a></div></td>
					  <td align="left" class="texto_02"><div align="center"><a href="inf_video.php?idcat=<?=$idcat?>&idcl=<?=$cliente->get_id_cliente()?>"><img src="iconos/ic_video.png" border="0" alt="Editar Video" /></a></div></td>
                      <?
                      if($cliente->get_txt_password()==1){
					  $imghome="<img src='iconos/si.gif' alt='' border=''>";
					  }else{
					  $imghome="<img src='iconos/no.gif' alt='' border=''>";
					  }
					  ?>
					  <td align="left" class="texto_02"><div align="center"><?=$imghome?></div></td>
                      <td align="left" class="texto_02"><div align="center"><?=$cliente->get_txt_departamento()?></div></td>
                      <?
                      if($cliente->get_int_stado()==1){
					  $imgpublicado="<img src='iconos/si.gif' alt='' border=''>";
					  }else{
					  $imgpublicado="<img src='iconos/no.gif' alt='' border=''>";
					  }
					  ?>
                      <td align="left" class="texto_02"><div align="center"><?=$imgpublicado?></div></td>
					  <td align="center"><div align="center"><a href="frm_clientes.php?idcat=<?=$idcat?>&id=<?=$cliente->get_id_cliente()?>"><img src="iconos/ic_edit.png" border="0" alt="Editar registro" title="Editar registro" /></a><!--&nbsp;&nbsp;<a href="http://www.riostore.pe/fbstock.php?id=<?//=$cliente->get_id_cliente()?>" target="_blank"><img src="iconos/ic_face.png" border="0" alt="Compartir en Facebook" title="Compartir en Facebook" /></a>-->&nbsp;&nbsp;<a href="javascript:eliminar(<?=$cliente->get_id_cliente()?>,<?=$idcat?>)"><img src="iconos/ic_delete.png" border="0" alt="Eliminar registro" title="Eliminar registro" /></a> </div></td>
					</tr>
                    <tr>
                    <td colspan="9" height="1" bgcolor="#CCCCCC"></td>
                    </tr>
					<?
					}
					$contador++;
					}?>
				  </table>
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="205" align="left" height="8"></td>
						<td width="465" align="right"></td>
					  </tr>
					  <tr>
						<td width="205" align="left"><a href="frm_clientes.php?idcat=<?=$idcat?>"><img src="iconos/ico_nuevo.gif" border="0" alt="Agregar nuevo"></a></td>
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
	</div>
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
