<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_cliente.php");
	include("clases/cls_emp_categoria.php");
	include("clases/cls_emp_administrador.php");
	include("clases/cls_emp_hotel.php");
	include("clases/cls_paginador_.php");
	$cliente= new cls_emp_cliente($_GET['idcl']);
	
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
					<td height="30" class="titu_secc"> &nbsp;&nbsp;REQUERIMIENTO DE PAGOS - Registrados Desde <?=$_POST["txt_criterio1"]?> hasta <?=$_POST["txt_criterio2"]?></td>
                    <td height="30" align="right"></td>
                    <td height="30" align="right"><!--<a href="inf_clientes_2.php?idcat=1" class="myButton">MIS FILES</a>--></td>
				  </tr>
                  <tr>
                  <td colspan="4" height="10"></td>
                  </tr>
				</table>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					<td width="67" height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center">NRO</td>
                    <td width="160" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">FECHA LIMITE</td>
					<td width="380" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">TITULO PAGO</td>
                    <td width="160" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">FECHA REGISTRO</td>
                    <td width="200" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">NRO. CUENTA</td>	
                    <td width="300" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">TITULAR CUENTA</td>	
                    <td width="300" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">BANCO</td>	
                    <td width="200" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">MONTO</td>					  
					<td width="300" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="left">OBSERVACIONES</div></td>
                    <!--<td width="250" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="left">REGISTRADO POR</div></td>-->
                    <td width="150" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">ESTADO PAGO</div></td>
					<td width="139" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">OPCIONES</div></td>
					</tr>
					<tr>
					<td colspan="10" height="2"></td>
				    </tr>
					<?
					/*	if($_POST['txt_cliente']!=""){$campo1="and txt_nombre like '%$_POST[txt_cliente]%'";}else{$campo1="";}
						if($_POST['txt_email']!=""){$campo2="and txt_email like '%$_POST[txt_email]%'";}else{$campo2="";}	*/
											
						$sql="select id_foto0 from tbl_hotel where id_categoria='{$_GET[idcat]}' and int_stado=0 and txt_titulo44 BETWEEN '$txt_criterio1' AND '$txt_criterio2' order by id_foto0 desc";
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
                    <td align="left" class="texto_02" style="color:#000000"><strong><?=urldecode($datos->get_txt_titulo44())?></strong></td>
                    <td align="left" class="texto_02"><?=urldecode($datos->get_txt_titulo2())?></td>
                    <td align="left" class="texto_02"><?=urldecode($datos->get_txt_titulo6())?></td>
                    <td align="left" class="texto_02"><?=urldecode($datos->get_txt_titulo7())?></td>
                    <?
                    if($datos->get_int_stado0()==0){$moneda="US$";}
					if($datos->get_int_stado0()==1){$moneda="S/.";}
					?>
                    <td align="left" class="texto_02"><?=$moneda;?>&nbsp;<strong><?=urldecode($datos->get_txt_titulo5())?></strong></td>					  
					<td align="left" class="texto_02"><div style="padding:8px 8px 8px 0px;"><?=urldecode($datos->get_txt_titulo3())?></div></td>
                    <!--<td align="left" class="texto_02" style="color:#244579"><strong><?=strtoupper($enoteca_modulos->getNombres())?></strong></td>-->
                    <?
                      if($datos->get_int_stado()==1){
						$link="<a href='inf_fotos.php?idcat=1&idcl=".$datos->get_id_cliente()."&id0=".$datos->get_id_foto0()."'>";
					  	$imgpublicado="<img src='iconos/ic_pago01.png' alt='' border='0'>";
					  }else{
						if($objcat0->getTipo()==0){
							$link="<a href='inf_fotos.php?idcat=1&idcl=".$datos->get_id_cliente()."&id0=".$datos->get_id_foto0()."'>";
						}
						if($objcat0->getTipo()==1){
							$link="";
						}
					  	$imgpublicado="<img src='iconos/ic_pago02.png' alt='' border='0'>";
					  }
					  ?>
                    <td align="left" class="texto_02"><div align="center"><?=$link?><?=$imgpublicado?></a></div></td>
					<td align="left"><div align="center"><a href="frm_reqpago.php?idcat=<?=$idcat?>&idcl=<?=$datos->get_id_cliente()?>&id=<?=$datos->get_id_foto0()?>"><img src="iconos/ic_edit.png" border="0" alt="Editar registro" title="Editar registro" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:eliminar('<?=$datos->get_id_foto0()?>','<?=$foto?>','<?=$datos->get_id_cliente()?>','<?=$idcat?>')"><img src="iconos/ic_delete.png" border="0" alt="Eliminar registro" title="Eliminar registro" /></a></div></td>
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
					  
						<td width="205" align="left"><!--<a href="frm_reqpago.php?idcat=<?=$idcat?>&idcl=<?=$_GET[idcl]?>" class="myButton2">AGREGAR REGISTRO</a>--></td>
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
