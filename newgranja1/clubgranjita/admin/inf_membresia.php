<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_menbresia.php");
	include("clases/cls_paginador_.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador de Contenidos LAGRANJAVILLA</title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<link href="calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar.js"></script>
<script language="javascript" src="calendar-es.js"></script>
<script language="javascript" src="calendar-setup.js"></script>

<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script>
function eliminar(id)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_socio.php?op=3&id=" + id;
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
					<td height="30" bgcolor="#F1EEE7" class="titus">&nbsp;&nbsp;REGISTROS DE MEMBRESIA </td>
				  </tr>
				  <tr>
					<td height="10"></td>
				  </tr>
				</table>
				
				<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td height="30" class="titus">
					<form name="form1" action="inf_membresia.php" method="post">
						<table width="100%" border="1" cellpadding="0" cellspacing="0" align="center" bordercolor="#DEDAC8" bgcolor="#F2F0EB">
						<tr>
						<td class="titus_tablas">&nbsp;N&uacute;mero de operaci&oacute;n <input type="text" name="txt_op" class="input" value="<?=$_POST['txt_op']?>"/></td>
						<td class="titus_tablas">&nbsp;Fecha de operaci&oacute;n <input type="text" name="fecha_fpago" class="input" style="width:70px" value="<?=$_POST['fecha_fpago']?>"/><input id="lanzador" type="image" src="calendario.gif" />
				<script type="text/javascript">
					Calendar.setup({
					inputField     :    "fecha_fpago",      // id del campo de texto
					ifFormat       :    "%Y-%m-%d",       // formato de la fecha, cuando se escriba en el campo de texto
					button         :    "lanzador"   // el id del bot?n que lanzar? el calendario
					});
				</script></td>
						<td><input type="submit" value="Buscar" class="input"/></td>
						</tr>
						</table>
						</form>
					</td>
				  </tr>
				</table>
				
				<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="79" height="25" valign="middle" bgcolor="#DEDAC8" class="titus_tablas" align="center">Nro&nbsp;</td>
					  <td width="189" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">N&uacute;mero de operaci&oacute;n </td>
					  <td width="138" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Fecha de operaci&oacute;n </td>
					  <td width="475" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Socio</td>
					  
					</tr>
					<tr>
					  <td colspan="5" height="2"></td>
				    </tr>
					<?
					
if($_POST['txt_op']!=""){$campo1=" and txt_op like '%".$_POST['txt_op']."%'";}
if($_POST['fecha_fpago']!=""){$campo2=" and fecha_fpago='".$_POST['fecha_fpago']."'";}
$sql="select id_menbresia from tbl_menbresia where int_stado='1' $campo1 $campo2 order by id_menbresia DESC";
$resultado=conn_array($sql);
$paginador = new cls_tbl_paginar($resultado,FILASXPAGINA,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
$contador=$paginador->pos_inicial_pag;
while($contador < $paginador->pos_final_pag){
$registro=$paginador->resultado_pag[$contador-1];
if(!empty($registro[0])){
	//echo $registro[0]."<br>";
$menbresia= new cls_emp_menbresia($registro[0]);
if($color=="#F2F0EB"){$color="#F6F5F5";}else{$color="#F2F0EB";}
$nLocal = array(1=>"SUR",2=>"NORTE");
conn_abre();
mysql_select_db("lagranja_peru4",$conexion);
$sql="select c.ccliecode,c.sClieApel,c.sClieName,c.sClieTelf,c.sClieMail from CLIENTE as c, TARJETA as t where c.ccliecode=t.ccliecode and t.ntarjnumb=".$menbresia->get_id_socio()." and c.dnacmdate='".$menbresia->get_fecha_fnac()."'";
	$rsl=mysql_query($sql)or die(mysql_error());
	$rs=mysql_fetch_array($rsl);


					  ?>
					<tr valign="middle" bgcolor="<?=$color?>">
					  <td height="26" class="texto_02">&nbsp;&nbsp;&nbsp;&nbsp;<?=$contador?></td>
					  <td align="left" class="texto_02"><?=$menbresia->get_txt_op()?></td>
					  <td align="left" class="texto_02"><?=$menbresia->get_fecha_fpago()?></td>
					  <td align="left" class="texto_02"><?=$rs['sClieApel'].", ".$rs['sClieName']." Telf. :".$rs['sClieTelf']." E-mail:".$rs['sClieMail']?></td>
					 
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
						<td width="205" align="left">&nbsp;</td>
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
