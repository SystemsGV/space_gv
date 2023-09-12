<?php 
include "sendmail/class.phpmailer.php";
function send_email($path,$host,$from,$name,$to,$subject,$body) {
	/************* php mailer ***************/
	  $mail = new phpmailer();
	  $mail->PluginDir = $path;
	  $mail->Mailer = "mail";
	  $mail->Host = $host;
	  $mail->From = $from;
	  $mail->FromName = $name;
	  $mail->Sender = $from;
	  $mail->Timeout = 30;
	  $mail->AddAddress($to);
	  $mail->Subject = $subject;
	  $mail->IsHTML(true);
	  $mail->Body = $body;
	  $exito = $mail->Send();
	  $intentos=1;
	  while ((!$exito) && ($intentos < 2)) {
		sleep(5);
			$exito = $mail->Send();
			$intentos=$intentos+1;	
	   }
	   if (!$exito)
	   {
		   return 0;
	   } else {
		   return 1;
	   }
	/************* fin php mailer **************/
}
conn_abre ();
function cboComplejo($nombreCombo,$estilo,$sql,$campoValor,$campoItem,$datoCompara,$title,$Ctop=0,$xSel=0,$jvSel=0){
	if($jvSel==1){$jvEvent="onChange='pedirDatos($Ctop)'";};
	echo "<select name='$nombreCombo' class='$estilo' title='$title' $jvEvent>";
	$a=0;
		$res_cboComplejo=mysql_query($sql)or die("Error select".mysql_error());
		if($xSel==1){echo "<option value='0' selected>Seleccione</option>";};
		while($row_cboComplejo=mysql_fetch_array($res_cboComplejo)){
			
			echo "<option ";
				if ($datoCompara==$row_cboComplejo[$campoValor]){
					echo " selected ";
					$a=1;
				}
			echo "value='$row_cboComplejo[$campoValor]'>".ucwords (strtolower($row_cboComplejo[$campoItem]));
		}
	echo "</select>";
}
function cboSBsimple($cboNom,$estilo,$title,$cboVal,$swcbo=0){
echo "<select name='$cboNom' class='$estilo' title='$title' $jvEvent>";
foreach ($cboVal as $valor) {
		$a++;
		if($swcbo){$dato=$a;}else{$dato=$valor;}
	    echo "<option value='$dato'>$valor</option>";	
}
echo "</select>";
}
function TblIdioma(){
$sql="select * from tbl_idioma order by txt_idioma";
$arNivel=array("Basico","Intermedio", "Avanzado");
$result=mysql_query($sql)or die("Error : ".mysql_error());
echo "<table width=\"100%\">";
	while($rs=mysql_fetch_array($result)){
	echo "<tr><td align=left><input type='checkbox' value='$rs[id_idioma]'/>$rs[txt_idioma] </td><td><input type='radio' value='1' name='cbo_nivel$rs[id_idioma]'/>Basico<input type='radio' value='2' name='cbo_nivel$rs[id_idioma]'/>Intermedio<input type='radio' value='3' name='cbo_nivel$rs[id_idioma]'/>Avanzado</td></tr>";		
	}
echo "</table>";
}
function get_countRs($tabla,$swRs="") {
conn_abre ();
		$sql="SELECT COUNT(*) FROM $tabla $swRs";
        $rsql= mysql_query($sql) or die(mysql_error());
        $total = mysql_fetch_array($rsql);
        return $total[0];
}

function send_mailconsulta($data,$param,$sw=0){	
  if($param['form']==1){$campo="Describe tu consulta:";}else{$campo="Comentarios:";}
  if($param['form']==2){
  $cproc="<tr>
    <td width=\"169\"><b>Procedencia:</b></td>
    <td>$data[procedencia]</td>
  </tr>";
  }
  if($param['form']!=3){
  $cont="<tr>
    <td width=\"169\"><b>Telefono:</b></td>
    <td>$data[telefono]</td>
  </tr>
  <tr>
    <td width=\"169\"><b>Raza de animal:</b></td>
    <td>$data[ranimal]</td>
  </tr>
  <tr>
    <td width=\"169\"><b>Edad:</b></td>
    <td>$data[edad]</td>
  </tr>
  <tr>
    <td width=\"169\"><b>Sexo:</b></td>
    <td>$data[sexo]</td>
  </tr>";
  }
$msg = $data['titulo'];
$msg="
<table width=400>
  <tr>
    <td width=\"169\"><b>Nombres:</b></td>
    <td>$data[nombres]</td>
  </tr>
  <tr>
    <td width=\"169\"><b>Apellidos:</b></td>
    <td>$data[apellidos]</td>
  </tr>
  <tr>
    <td width=\"169\"><b>Correo:</b></td>
    <td>$data[correo]</td>
  </tr>
  $cont
  $cproc
  <tr>
    <td width=\"169\" valign=\"top\"><b>$campo</b></td>
    <td>".nl2br($data['textarea'])."</td>
  </tr>
</table>

";
if($sw==1){
	$msg="
  <tr>
    <td width=\"169\"><b>Nombres:</b></td>
    <td>$data[nombres]</td>
  </tr>
  <tr>
    <td width=\"169\"><b>Apellidos:</b></td>
    <td>$data[apellidos]</td>
  </tr>
  <tr>
    <td width=\"169\"><b>Correo:</b></td>
    <td>$data[correo]</td>
  </tr>
  <tr>
    <td width=\"169\"><b>Telefono:</b></td>
    <td>$data[telefono]</td>
  </tr>
";
	return 	$msg;
}else{
	return $msg;
}
}

#Funcion que formatea una fecha, ej. "2006-02-25 10:25:45" a "25/02/2006 10:25:45" y viceversa
function formatDateTime($charCurrent,$charReplace,$date,$no_show_hour=0){
	$date=explode($charCurrent,$date);
	$time=explode(" ",$date[2]);
	if($no_show_hour){
		$newDate=$time[0].$charReplace.$date[1].$charReplace.$date[0];
	}else{
		$newDate=$time[0].$charReplace.$date[1].$charReplace.$date[0]." ".$time[1];
	}
	
	return $newDate;
}
?>
