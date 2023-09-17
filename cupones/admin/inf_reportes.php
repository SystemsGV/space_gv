<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_cliente.php");
	include("clases/cls_emp_foto2.php");
	include("clases/cls_emp_categoria.php");
	include("clases/cls_emp_administrador.php");
	$cliente= new cls_emp_cliente($_GET['idcl']);
	include("clases/cls_paginador_.php");
	$objcat0 = new cls_administrador($_SESSION['session_administrator']);
	
	$idcat= $_GET['idcat'];
	$objcat = new cls_emp_categoria($_GET['idcat']);
	$idcats= $objcat->get_id_categoria().trim(strtolower(preg_replace('([^A-Za-z0-9])', '',$objcat->get_txt_nombre())));
	$txt_criterio10=0;
	$txt_nombre = $_POST['txt_nombre'];
	if ($_POST["txt_criterio10"]=="" || $_POST["txt_criterio10"]==1){
		$txt_criterio10=1;
	}
	else {
		$txt_criterio10=0;
	}
	
	if ($_POST["txt_criterio11"]<>""){
		$txt_criterio11 = $_POST["txt_criterio11"];
	}elseif ($_GET["txt_criterio11"]<>""){
		$txt_criterio11 = $_GET["txt_criterio11"];	
	}
	
	if ($_POST["txt_criterio12"]<>""){
		$txt_criterio12 = $_POST["txt_criterio12"];
	}elseif ($_GET["txt_criterio12"]<>""){
		$txt_criterio12 = $_GET["txt_criterio12"];	
	}
	
	if ($_POST["txt_criterio13"]<>""){
		$txt_criterio13 = $_POST["txt_criterio13"];
	}elseif ($_GET["txt_criterio13"]<>""){
		$txt_criterio13 = $_GET["txt_criterio13"];	
	}
	
	

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
input {
  border:solid 1px #ccc;
  border-radius: 5px;
  padding:7px 14px;
  margin-bottom:10px
}
input:focus {
  outline:none;
  border-color:#aaa;
}
.sort {
  padding:8px 30px;
  border-radius: 6px;
  border:none;
  display:inline-block;
  color:#fff;
  text-decoration: none;
  background-color: #949494;
  height:30px;
}
.sort:hover {
  text-decoration: none;
  background-color:#8B8C8C;
}
.sort:focus {
  outline:none;
}
.sort:after {
  display:inline-block;
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 5px solid transparent;
  content:"";
  position: relative;
  top:-10px;
  right:-5px;
}
.sort.asc:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid #fff;
  content:"";
  position: relative;
  top:4px;
  right:-5px;
}
.sort.desc:after {
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-bottom: 5px solid #fff;
  content:"";
  position: relative;
  top:-4px;
  right:-5px;
}
.pagination li {
  display:inline-block;
  padding: 4px;
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
	<div id="users" width="100%">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
			  <tr>
				<td width="100%" height="4">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
                  	<td width="32"><img src="iconos/ic_inf.png" alt="" border="0" /></td>
					<td width="638" height="30" class="titu_secc"> &nbsp;&nbsp;MODULO CUPONES</td>
                    <div class="form-1-2">
                    <div class="form-group">
                    </div>
                    </div>                   
                    </td>
				  </tr>
                  <tr>
                  <td colspan="4" height="10"></td>
                  </tr>
				</table>
				<input class="search" placeholder="Buscar" />
				<button class="sort" data-sort="cliente">
					Ordenar Por Nombre
				</button>
				<button class="sort" data-sort="ecliente">
					Ordenar Por Estado
				</button>
				<button class="sort" data-sort="tipo">
					Ordenar Por Tipo
				</button>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="104" height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center">NRO</td>
					  <td width="304" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">EMPRESA / CLIENTE</td>
					  <td width="304" align="center" valign="middle" bgcolor="#949494" class="titus_tablas">TIPO</td>					  
                      <td width="190" align="center" valign="middle" bgcolor="#949494" class="titus_tablas">NUM. CUPONES</td>
                      <td width="226" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">FECHA VENCIMIENTO</div></td>
                      <td width="235" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">CUPONES GENERADOS</div></td>
                       <td width="166" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">CUPONES USADOS</div></td>
                      
                      <td width="217" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">ESTADO CLIENTE</div></td>
					  <? if(($objcat0->getTipo()==0) || ($objcat0->getTipo()==1)){?><td width="201" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">OPCIONES</div></td><?}?>
					</tr>
					<tr>
					  <td colspan="8" height="2"></td>
				    </tr>
				    <?php
						$sql="SELECT * FROM tbl_cliente WHERE id_cliente='$_GET[idcl]'";
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,50,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
					//	echo "paginador->pos_final_pag : ".$paginador->pos_final_pag;
						while($contador < $paginador->pos_final_pag)
						{
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0]))
								{
									$datos= new cls_emp_cliente($registro[0]);
									if($color=="#e8e8e8")
									{
									  $color="#F6F5F5";}
									else{
									  $color="#e8e8e8";
									}
					  ?>
					<tbody class="list">
 
					<tr valign="middle" bgcolor="<?=$color?>" class="bg_fila">
					  <td height="100" class="numero" align="center"><? echo $contador?></td>                      
					  <td align="left" class="cliente"><b><?=strtoupper($cliente->get_txt_nombre())?></b></td>
					  <?if($cliente->get_txt_nombre6()==0){?>
					  <td align="center" class="tipo"><b>Ninguna Promoci&oacute;n</b></td>
					  <?}elseif($cliente->get_txt_nombre6()==1){?>
					  <td align="center" class="tipo"><b>Venta de Pulseras</b></td>
					  <?}elseif($cliente->get_txt_nombre6()==2){?>
					  <td align="center" class="tipo"><b>Devoluciones</b></td>
					  <?}elseif($cliente->get_txt_nombre6()==3){?>
					  <td align="center" class="tipo"><b>CANJE</b></td>
					  <?}elseif($cliente->get_txt_nombre6()==4){?>
					  <td align="center" class="tipo"><b>Convenios</b></td>
					  <?}elseif($cliente->get_txt_nombre6()==5){?>
					  <td align="center" class="tipo"><b>Cortes&iacute;as</b></td>
					  <?}elseif($cliente->get_txt_nombre6()==6){?>
					  <td align="center" class="tipo"><b>Festival GV</b></td>
					  <?}elseif($cliente->get_txt_nombre6()==7){?>
					  <td align="center" class="tipo"><b>Colegios</b></td>
					  <?}elseif($cliente->get_txt_nombre6()==8){?>
					  <td align="center" class="tipo"><b>Cumplea&ntilde;os</b></td>
                      <?}elseif($cliente->get_txt_nombre6()==9){?>
					  <td align="center" class="tipo"><b>Compras</b></td>
					  <?}?>
                      <td align="left" class="cupones" style="color:#d4750e"><div align="center"><b><?=$cliente->get_txt_nombre2()?></b></div></td>
                      <td align="left" class="vencimiento" style="color:#d4750e"><div align="center"><b><?=$cliente->get_txt_nombre4()?></b></div></td>  
                      <td align="left" class="generados" style="color:#d4750e"><div align="center"><b><?=$idCustomer->getCountCuponUser()?></b></div></td> 
                       <td align="left" class="usados" style="color:#d4750e"><div align="center"><b><?=$idCustomer->get_id_cliente()?></b></div></td>       
               
                     
                      	
					  
					
    
                    </tbody>
                    <tr>
					  <td height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center"></td>
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"></td>	                      
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>                      
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					</tr>
				  </table>
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr width="100%">
					  <td width="100%" align="right">
					  <p align="right">Pág.&nbsp;</p><tbody width="100%" align="right" class="pagination"></tbody>
					  </td>
					  </tr>
				</table>
                </tr>
          
           
					  </tr>
				  </table>
				  </td>
			  </tr>			  
			</table>
		</div>
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
	<td height="30" bgcolor="#607b9b">&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.lagranjavilla.com/" target="_blank" class="pie">La Granja Villa</a></td>
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
<script type="text/javascript" src="js/list.min.js"></script>
<script type="text/javascript">
var userList = new List('users', {
  valueNames: [ 'numero', 'cliente', 'tipo', 'cupones', 'vencimiento', 'generados', 'usados' ],
  page: 100,
  pagination: true
});
</script>
