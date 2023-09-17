<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_administrador.php");
	include("clases/cls_paginador_.php");
	
	$objcat0 = new cls_administrador($_SESSION['session_administrator']);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
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

			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
			  <tr>
				<td height="4">
				<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
                  	<td width="32"><img src="iconos/ic_inf.png" alt="" border="0" /></td>
					<td height="30" class="titu_secc"> &nbsp;&nbsp;Modulo Usuarios</td>
				  </tr>
                  <tr>
                  <td colspan="2" height="10"></td>
                  </tr>
				</table>
				<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="71" height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="left">&nbsp;&nbsp;NRO</td>
					  <td width="298" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">NOMBRE DEL ADMINISTRADOR</td>
					  <td width="236" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">PERFIL</td>
					  <td width="129" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">USUARIO</td>
					  <td width="147" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">OPCIONES</div></td>
					</tr>
					<tr>
					  <td colspan="5" height="2"></td>
				    </tr>
					<?
						$sql="select id_administrador from administrador";
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,FILASXPAGINA,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
					//	echo "paginador->pos_final_pag : ".$paginador->pos_final_pag;
						while($contador < $paginador->pos_final_pag)
						{
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0]))
								{
									$administrador= new cls_administrador($registro[0]);
									if($color=="#e8e8e8")
									{
									  $color="#F6F5F5";}
									else{
									  $color="#e8e8e8";
									}
					  ?>
					<tr class="bg_fila" valign="middle" bgcolor="<? echo $color?>">
					  <td height="45" class="texto_02">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $contador?></td>
					  <td align="left" class="texto_02"><strong><? echo $administrador->getNombres()?></strong></td>
                      	<?
						if($administrador->getTipo()==0){
							$tip0="ADMINISTRADOR";
						}
						if($administrador->getTipo()==1){
							$tip0="PUNTO DE VENTA";
						}
						if($administrador->getTipo()==2){
							$tip0="CONSULTA";
						}
						?>
					  <td align="left" class="texto_02"><?=$tip0?></td>
					  <td align="left" class="texto_02"><? echo $administrador->getUsuario()?></td>
					  <td align="left"><div align="center"><a href="frm_administrador.php?id=<? echo $administrador->getId_administrador()?>"><img src="iconos/ic_edit.png" border="0" alt="Editar registro" title="Editar registro" /></a>&nbsp;&nbsp; <a href="javascript:eliminar(<? echo $administrador->getId_administrador()?>)"><img src="iconos/ic_delete.png" border="0" alt="Eliminar registro" title="Eliminar registro" /></a> </div></td>
					</tr>
                    <tr>
                    <td colspan="5" height="1" bgcolor="#CCCCCC"></td>
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
						<td width="205" align="left"><a href="frm_administrador.php" class="myButton2">AGREGAR REGISTRO</a></td>
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
