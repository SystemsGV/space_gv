<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("includes/fc_global.php");	
	include("clases/cls_emp_hotel.php");
	include("clases/cls_emp_cliente.php");
	include("clases/cls_emp_administrador.php");
	$cliente= new cls_emp_cliente($_GET['idcl']);
	include("clases/cls_paginador_.php");
	
	$idcat=$_GET['idcat'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script>
function eliminar(id,idcl,idcat)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_hotel.php?op=3&idcl="+idcl+"&id="+id+"&idcat="+idcat;
	}
}
</script>

<style>
.myButton2 {
	-moz-box-shadow:inset 0px 1px 0px 0px #fce2c1;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fce2c1;
	box-shadow:inset 0px 1px 0px 0px #fce2c1;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffb357), color-stop(1, #eb8100));
	background:-moz-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:-webkit-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:-o-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:-ms-linear-gradient(top, #ffb357 5%, #eb8100 100%);
	background:linear-gradient(to bottom, #ffb357 5%, #eb8100 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffb357', endColorstr='#eb8100',GradientType=0);
	background-color:#ffb357;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #db8b00;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:10px 18px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b36e00;
}
.myButton2:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #eb8100), color-stop(1, #ffb357));
	background:-moz-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:-webkit-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:-o-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:-ms-linear-gradient(top, #eb8100 5%, #ffb357 100%);
	background:linear-gradient(to bottom, #eb8100 5%, #ffb357 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#eb8100', endColorstr='#ffb357',GradientType=0);
	background-color:#eb8100;
}
.myButton2:active {
	position:relative;
	top:1px;
}
.myButton4 {
	-moz-box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	-webkit-box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fc8d83), color-stop(1, #e4685d));
	background:-moz-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-webkit-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-o-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-ms-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:linear-gradient(to bottom, #fc8d83 5%, #e4685d 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fc8d83', endColorstr='#e4685d',GradientType=0);
	background-color:#fc8d83;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #d83526;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	padding:9px 16px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b23e35;
}
.myButton4:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e4685d), color-stop(1, #fc8d83));
	background:-moz-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-webkit-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-o-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-ms-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:linear-gradient(to bottom, #e4685d 5%, #fc8d83 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e4685d', endColorstr='#fc8d83',GradientType=0);
	background-color:#e4685d;
}
.myButton4:active {
	position:relative;
	top:1px;
}

</style>

</head>

<body>
<div align="center" width="100%">
<br>
<table bgcolor="#FFFFFF" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td bgcolor="#8f9fb4" colspan="3" width="100%" height="1"></td>
  </tr>
  <tr>
  <td width="1" bgcolor="#8f9fb4"></td>
  <td width="100%">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<?include("cabecera.php")?>
	<tr>
	<td>

			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
			  <tr>
				<td width="100%" height="4"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td height="5"></td>
				  </tr>
				  <tr>
                  	<td width="32"><img src="iconos/ic_inf.png" alt="" border="0" /></td>
					<td height="30"><table width="100%" class="titu_secc"><tr><td align="left">&nbsp;Requerimiento de pago - Paquete #<?=strtoupper($cliente->get_id_cliente())?></td><td align="right"><a href="inf_clientes.php?idcat=<?=$idcat?>" class="myButton4">< REGRESAR</a></td></tr></table></td>
				  </tr>
				  <tr>
					<td height="10" align="right"></td>
				  </tr>
				</table>
					<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					<td width="67" height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center">NRO</td>
                    <td width="160" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">FECHA LIMITE</td>
					<td width="350" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">TITULO PAGO</td>
                    <td width="250" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">NRO. CUENTA</td>	
                    <td width="300" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">TITULAR CUENTA</td>	
                    <td width="300" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">BANCO</td>	
                    <td width="200" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">MONTO</td>					  
					<td width="300" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="left">OBSERVACIONES</div></td>
                    <td width="250" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="left">REGISTRADO POR</div></td>
                    <td width="150" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">ESTADO PAGO</div></td>
					<td width="139" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">OPCIONES</div></td>
					</tr>
					<tr>
					<td colspan="11" height="2"></td>
				    </tr>
					<?
						$sql="select id_foto from tbl_hotel where id_cliente='$_GET[idcl]' order by id_foto DESC";
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,30,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
					//	echo "paginador->pos_final_pag : ".$paginador->pos_final_pag;
						while($contador < $paginador->pos_final_pag)
						{
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0]))
								{
									$datos= new cls_emp_foto0($registro[0]);
									if($color=="#e8e8e8")
									{
									  $color="#F6F5F5";}
									else{
									  $color="#e8e8e8";
									}
									$enoteca_modulos = new cls_administrador($datos->get_int_retoque());
					  ?>
					<tr class="bg_fila" valign="middle" bgcolor="<?=$color?>">
					<td height="95" class="texto_02">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $contador?></td>
                    <td align="left" class="texto_02" style="color:#d4750e"><strong><?=urldecode($datos->get_txt_titulo4())?></strong></td>
					<td align="left" class="texto_02"><strong><?=urldecode($datos->get_txt_titulo())?></strong></td>
                    <td align="left" class="texto_02"><?=urldecode($datos->get_txt_titulo2())?></td>
                    <td align="left" class="texto_02"><?=urldecode($datos->get_txt_titulo6())?></td>
                    <td align="left" class="texto_02"><?=urldecode($datos->get_txt_titulo7())?></td>
                    <td align="left" class="texto_02"><strong><?=urldecode($datos->get_txt_titulo5())?></strong></td>					  
					<td align="left" class="texto_02"><div style="padding:8px 8px 8px 0px;"><?=urldecode($datos->get_txt_titulo3())?></div></td>
                    <td align="left" class="texto_02" style="color:#244579"><strong><?=strtoupper($enoteca_modulos->getNombres())?></strong></td>
                    <?
                      if($datos->get_int_stado()==1){
					  $imgpublicado="<img src='iconos/si.png' alt='' border=''>";
					  }else{
					  $imgpublicado="<img src='iconos/no.png' alt='' border=''>";
					  }
					  ?>
                    <td align="left" class="texto_02"><div align="center"><?=$imgpublicado?></div></td>
					<td align="left"><div align="center"><a href="frm_hotel.php?idcat=<?=$idcat?>&idcl=<?=$_GET[idcl]?>&id=<?=$datos->get_id_foto()?>"><img src="iconos/ic_edit.png" border="0" alt="Editar registro" title="Editar registro" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:eliminar('<?=$datos->get_id_foto()?>','<?=$foto?>','<?=$_GET['idcl']?>','<?=$idcat?>')"><img src="iconos/ic_delete.png" border="0" alt="Eliminar registro" title="Eliminar registro" /></a></div></td>
                    <tr>
                    <td colspan="11" height="1" bgcolor="#CCCCCC"></td>
                    </tr>
					</tr>
					<?
					}
					$contador++;
					}?>
				  	</table>
					<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="205" align="left" height="8"></td>
						<td width="465" align="right"></td>
					  </tr>
					  <tr>
					  
						<td width="205" align="left"><a href="frm_hotel.php?idcat=<?=$idcat?>&idcl=<?=$_GET[idcl]?>" class="myButton2">AGREGAR REGISTRO</a></td>
						<td width="465" align="right"><?
							$param[0]="idcl=".$_GET['idcl'];$css[1]="txt_gris10";$css[2]="txt_gris10";
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
