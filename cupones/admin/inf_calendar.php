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
	
	$objcat0 = new cls_administrador($_SESSION['session_administrator']);
	
	$idcat="1";
	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<link href='fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar.print.css' rel='stylesheet' media='print' />

<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='fullcalendar.min.js'></script>

<?
echo "<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			
			defaultDate: '2016-02-12',
			editable: false,
			eventLimit: true, 
			events: [";
				

						$sql="select id_foto0 from tbl_hotel where int_stado=0 order by id_foto0 DESC";
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,30,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
											while($contador < $paginador->pos_final_pag)
						{
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0]))
								{
									$datos= new cls_emp_foto0($registro[0]);	
									
									if($datos->get_int_stado0()==0){$moneda="US$";}
									if($datos->get_int_stado0()==1){$moneda="S/.";}
							
					 
				
				
echo			"{
					title: '".$moneda." ".$datos->get_txt_titulo5()." - ".$datos->get_txt_titulo()."',
					url: 'http://www.travelmax.com/paquetes/inf_fotos.php?idcat=1&idcl=".$datos->get_id_cliente()."&id0=".$datos->get_id_foto0()."',					
					start: '".$datos->get_txt_titulo4()."'
				},";

				
					}
					$contador++;
					}


echo		"]
		});
		
	});

</script>";

?>





                    
                    
<style>
	body {
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 12px;
		background-color:#f5f5f5;
	}

	#calendar {
		max-width: 1300px;
		margin: 0 auto;
	}
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
</style>
</head>

<body bgcolor="#f5f5f5">
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
					<td>
                    <div id='calendar'></div>
                    
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


