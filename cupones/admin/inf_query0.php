<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_cliente.php");
	include("clases/cls_emp_categoria.php");
	include("clases/cls_emp_administrador.php");
	include("clases/cls_paginador_.php");
	
	$objcat0 = new cls_administrador($_SESSION['session_administrator']);
	
	$idcat= $_GET['idcat'];
	$objcat = new cls_emp_categoria($_GET['idcat']);
	$idcats= $objcat->get_id_categoria().trim(strtolower(preg_replace('([^A-Za-z0-9])', '',$objcat->get_txt_nombre())));
	
	if ($_POST["txt_criterio"]<>""){
		$txt_criterio = $_POST["txt_criterio"];
	}elseif ($_GET["txt_criterio"]<>""){
		$txt_criterio = $_GET["txt_criterio"];	
	}
	
	if ($_POST["txt_criterio1"]<>""){
		$txt_criterio1 = $_POST["txt_criterio1"];
	}elseif ($_GET["txt_criterio1"]<>""){
		$txt_criterio1 = $_GET["txt_criterio1"];	
	}
	
	if ($_POST["txt_criterio2"]<>""){
		$txt_criterio2 = $_POST["txt_criterio2"];
	}elseif ($_GET["txt_criterio2"]<>""){
		$txt_criterio2 = $_GET["txt_criterio2"];	
	}
	//echo $txt_criterio;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
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
<style>
.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #54a3f7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #54a3f7;
	box-shadow:inset 0px 1px 0px 0px #54a3f7;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #007dc1), color-stop(1, #0061a7));
	background:-moz-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-webkit-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-o-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:-ms-linear-gradient(top, #007dc1 5%, #0061a7 100%);
	background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#007dc1', endColorstr='#0061a7',GradientType=0);
	background-color:#007dc1;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	border:1px solid #124d77;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:9px 16px;
	text-decoration:none;
	text-shadow:0px 1px 0px #154682;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0061a7), color-stop(1, #007dc1));
	background:-moz-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-webkit-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-o-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:-ms-linear-gradient(top, #0061a7 5%, #007dc1 100%);
	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0061a7', endColorstr='#007dc1',GradientType=0);
	background-color:#0061a7;
}
.myButton:active {
	position:relative;
	top:1px;
}
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

</style>
</head>

<body>
<div align="center" width="100%">
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
					<td width="849" height="30" class="titu_secc"> &nbsp;&nbsp;REPORTE POR VENDEDOR - Desde <?=$_POST["txt_criterio1"]?> hasta <?=$_POST["txt_criterio2"]?></td>
                    <td height="30" align="right"></td>
                    <td height="30" align="right"><!--<a href="inf_clientes_2.php?idcat=1" class="myButton">MIS FILES</a>--></td>
				  </tr>
                  <tr>
                  <td colspan="4" height="10"></td>
                  </tr>
				</table>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="80" height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center">ID FILE</td>
                      <td width="170" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">FECHA VENTA</div></td>
					  <td width="260" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">NOMBRE PASAJERO</td>	
                      <td width="150" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">FECHA VIAJE</div></td>
                      <td width="260" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">VENDIDO POR</td>
                      <td width="150" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">MONTO TOTAL</td>
                      <td width="150" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">COMISION ESP.</td>
                      <td width="150" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">DOCUMENTOS</div></td>
					  <td width="150" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">REQUERIMIENTO PAGOS</div></td>
					  <td width="120" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">EST. VIAJE</div></td>
                      <td width="120" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">EST. FILE</div></td>
					  <td width="191" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">OPCIONES</div></td>
					</tr>
					<tr>
					  <td colspan="12" height="2"></td>
				    </tr>
					<?
					/*	if($_POST['txt_cliente']!=""){$campo1="and txt_nombre like '%$_POST[txt_cliente]%'";}else{$campo1="";}
						if($_POST['txt_email']!=""){$campo2="and txt_email like '%$_POST[txt_email]%'";}else{$campo2="";}	*/
											
						$sql="select id_cliente from tbl_cliente where id_categoria='{$_GET[idcat]}' and txt_telefono='$txt_criterio' and txt_nombre3 BETWEEN '$txt_criterio1' AND '$txt_criterio2' order by id_cliente desc";
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,FILASXPAGINA,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
						while($contador < $paginador->pos_final_pag){
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0])){
									$cliente= new cls_emp_cliente($registro[0]);
									if($color=="#e8e8e8"){$color="#F6F5F5";}else{$color="#e8e8e8";}
									$enoteca_modulos = new cls_administrador($cliente->get_txt_telefono());
					  ?>
					<tr valign="middle" bgcolor="<?=$color?>" class="bg_fila">
					  <td height="100" class="texto_02" align="center"><strong><?=$cliente->get_id_cliente()?></strong></td>
                      <td align="left" class="texto_02" style="color:#d4750e"><div align="center"><b><?=$cliente->get_txt_nombre3()?></b></div></td>
					  <td align="left" class="texto_02"><b><?=strtoupper($cliente->get_txt_nombre())?></b></td>
                      <td align="left" class="texto_02" style="color:#d4750e"><div align="center"><b><?=$cliente->get_txt_nombre4()?></b></div></td>
                      <td align="left" class="texto_02" style="color:#244579"><b><?=strtoupper($enoteca_modulos->getNombres())?></b></td>
                      <?
					  $total=$total+$cliente->get_txt_nombre5();
					  ?>
                      <td align="left" class="texto_02"><div align="left">US$&nbsp;<b><?=$cliente->get_txt_nombre5()?></b></div></td>
                      <?
					  $comision=$comision+$cliente->get_txt_nombre6();
					  ?>
                      <td align="left" class="texto_02"><div align="left">US$&nbsp;<b><?=$cliente->get_txt_nombre6()?></b></div></td>
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
                      
                      <td align="left" class="texto_02"><div align="center"><a href="inf_fotos2.php?idcat=1&idcl=<?=$cliente->get_id_cliente()?>"><img src="iconos/ic_hotel.png" border="0" alt="Editar Archivos" /></a></div></td>
                      	
					  <td align="left" class="texto_02">
                      	<?php
						$client = $cliente->get_id_cliente();
						$sql0 = 'SELECT * FROM tbl_hotel WHERE id_cliente='.$client.' and int_stado=0'; 
						$result = conn_array($sql0);
						if(count($result)==0){$pinta="#6aac0b";}else{$pinta="#fd6500";}
						?>
                      		<div align="center">
                            <table><tr><td><a href="inf_reqpago.php?idcat=1&idcl=<?=$cliente->get_id_cliente()?>"><img src="iconos/ic_pics.png" border="0" alt="Editar Req. Pagos" /></a></td><td style="color:<?=$pinta?>">&nbsp;<strong>(<?=count($result)?>)</strong></td></tr></table></div></td>
                      
                      <?
                      if($cliente->get_txt_password()==1){
					  $imgpublicado1="<img src='iconos/si1.png' alt='' border=''>";
					  }else{
					  $imgpublicado1="<img src='iconos/no1.png' alt='' border=''>";
					  }
					  ?>
                      <td align="left" class="texto_02"><div align="center"><?=$imgpublicado1?></div></td>
					  <?
                      if($cliente->get_int_stado()==1){
					  $imgpublicado="<img src='iconos/si.png' alt='' border=''>";
					  }else{
					  $imgpublicado="<img src='iconos/no.png' alt='' border=''>";
					  }
					  ?>
                      <td align="left" class="texto_02"><div align="center"><?=$imgpublicado?></div></td>
					  <td align="center"><div align="center"><a href="frm_clientes.php?idcat=<?=$idcat?>&id=<?=$cliente->get_id_cliente()?>"><img src="iconos/ic_edit.png" border="0" alt="Editar registro" title="Editar registro" /></a><!--&nbsp;&nbsp;<a href="http://www.riostore.pe/fbstock.php?id=<?//=$cliente->get_id_cliente()?>" target="_blank"><img src="iconos/ic_face.png" border="0" alt="Compartir en Facebook" title="Compartir en Facebook" /></a>-->&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:eliminar(<?=$cliente->get_id_cliente()?>,<?=$idcat?>)"><img src="iconos/ic_delete.png" border="0" alt="Eliminar registro" title="Eliminar registro" /></a> </div></td>
					</tr>
                    <tr>
                    <td colspan="12" height="1" bgcolor="#CCCCCC"></td>
                    </tr>
					<?
					}
					$contador++;
					}?>
                    <tr>
					  <td height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center"></td>
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"></td>	
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas">TOTALES:</td>					  
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas">US$:&nbsp;<?=$total;?></td>
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas">US$:&nbsp;<?=$comision;?></td>
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					</tr>
                    
				  </table>
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="205" align="left" height="8"></td>
						<td width="465" align="right"></td>
					  </tr>
					  <tr>
						<td width="205" align="left"><!--<a href="frm_clientes.php?idcat=<?=$idcat?>" class="myButton2">AGREGAR REGISTRO</a>--></td>
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
