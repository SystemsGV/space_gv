<?
include("includes/inc_header.php");
include("includes/inc_login.php");		
include("includes/constantes.php");
include("includes/funciones.php");
include("includes/fc_global.php");	
include("clases/cls_emp_hotel.php");
include("clases/cls_emp_administrador.php");
	
$objcat0 = new cls_administrador($_SESSION['session_administrator']);
	
$idcat=$_GET['idcat'];
$id_foto0=$_GET['id_foto0'];
$id=$_GET['id'];
$dato = new cls_emp_foto0($id);	
$trozos = explode(".", $dato->get_txt_foto());
$nombre=$trozos[0]."_t.".$trozos[1];
$foto=UPLOAD_FOTOS.$nombre;
include("clases/cls_emp_cliente.php");
$cliente= new cls_emp_cliente($_GET['idcl']);
$agente = new cls_administrador($cliente->get_txt_telefono());
$pasajero = $cliente->get_txt_nombre();

$nomagente=$agente->getNombres();
	
conn_abre();
$path="http://www.travelmax.com";
$host="http://www.travelmax.com";
$from="accounting@travelmax.com";
$name="TRAVELMAX";
$subject="REGISTRO DE PAGO";
$AddCC="luisangelvega@hotmail.com";
//$AddCC="lvega@talentconsulting.com.pe";
	$sql="select * from tbl_hotel where id_foto0=$id_foto0";
	$rsl=mysql_query($sql) or die(mysql_error());
	while($rs=mysql_fetch_array($rsl)){
		$i++;
		$to= $agente->getCorreo();
		if($rs[int_stado0]==0){$moneda="US$";}else{$moneda="S/.";}
				$body="
				<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
				<html xmlns='http://www.w3.org/1999/xhtml'>
				<head>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
				<title>CENTRO PSICOLOGICO TALENT CONSULTING</title>
				<style>
				body{
				margin:0px;
				background-color:#f1f1f1;
				}
				</style>
				</head>
				<body>
				<div style='width:100%;' align='center'>					
				<br>
					<table width='697' cellpadding='0' cellspacing='0'>
					<tr>
					<td style='border:#c0c0c0 1px solid; background-color:#ffffff;'>						
						<table width='697' cellpadding='0' cellspacing='0'>
						<tr>
						<td width='25'></td>
						<td width='647'>
							<br>
							<div style='font-family:Verdana; font-size:18px; color:#af0000; font-weight:800;' align='left'><strong><i>TRAVELMAX<br>
							REGISTRO DE PAGO</i></strong></div>
							<br>
							<div style='font-family:Verdana; font-size:12px;' align='left'>Estimado (a): <strong>$nomagente</strong></div>
							<br>
							<div style='font-family:Verdana; font-size:12px;' align='left'>Te informamos que recientemente se ha registrado un pago, enviamos a continuaci&oacute;n los detalles del mismo:</div>
							<br>
							<div align='left' style='background-color:#ffffff;'>
							<table border='1' bgcolor='#ffffff' bordercolor='#c0c0c0' style='font-family:Verdana; font-size:12px;' cellpadding='5' cellspacing='0'>
							<tr>
							<td width='120' align='left'><strong>NRO. FILE:</strong></td>
							<td width='280' align='left'>$_GET[idcl]</td>
							</tr>
							<tr>
							<td width='120' align='left'><strong>PASAJERO:</strong></td>
							<td width='280' align='left'>$pasajero</td>
							</tr>
							<tr>
							<td width='120' align='left'><strong>TITULO:</strong></td>
							<td width='280' align='left'>$rs[txt_titulo]</td>
							</tr>
							<tr>
							<td width='120' align='left'><strong>MONTO:</strong></td>
							<td width='280' align='left'>$moneda&nbsp;$rs[txt_titulo5]</td>
							</tr>
							</table>
							</div>
							<br>
							<div style='font-family:Verdana; font-size:12px;' align='left'>
							
							<br>							
							Atentamente.
							<br>
							<strong>El Equipo de TRAVELMAX</strong>
							</div>
							<br>
						</td>
						<td width='25'></td>
						</tr>
						</table>
					</td>
					</tr>
					</table>				
				</div>				
				</body>
				";
		send_email($path,$host,$from,$name,$to,$subject,$body,$AddCC);
		echo $body;
		
	}

//header("location: inf_paciente.php");
echo "<br><br><center><input name='button' type='button' onclick='window.close();' value='CERRAR VENTANA' /> </center>";

?>