<?php 
conn_abre ();
## $nombreCombo es el nombre del select
## $estilo es el estilo en css que va tener el objeto
## $sql es la consulta en mysql que va recuperar el combo
## $campoValor es el id dela consulta que va tener el combo
## $campoItem es el texto que se va a mostrar en el combo
## $datoCompara es donde se va seleccionar el combo el dato comparado
## $title es el title del combo
## $Ctop es donde controla cuando hay 2 combos con ajax valor es 1 y 2
## $Xsel es para poner un valor 0 y texto Selecciones en un combo valor es 0 y 1
## $jvSel es para poner envento javascript enun combo AJAX
## $enabled es para poner en disabled al combo
function cboComplejo($nombreCombo,$estilo,$sql,$campoValor,$campoItem,$datoCompara,$title,$Ctop=0,$xSel=0,$jvSel=0,$enabled=""){
conn_abre ();
	if($enabled==1){$blocked="disabled";};
	if($jvSel==1){$jvEvent="onChange='pedirDatos($Ctop)'";};
	echo "<select name='$nombreCombo' class='$estilo' title='$title' $jvEvent $blocked>";
	$a=0;
//	echo $sql;
		$res_cboComplejo=mysql_query($sql)or die("Error select".mysql_error());
		if($xSel==1){echo "<option value='0' selected>Seleccione</option>";};
		while($row_cboComplejo=mysql_fetch_array($res_cboComplejo)){
			
			echo "<option ";
				if ($datoCompara==$row_cboComplejo[$campoValor]){
					echo " selected ";
					$a=1;
				}
			echo "<option value='$row_cboComplejo[$campoValor]'>".ucwords (strtolower($row_cboComplejo[$campoItem]))."</option>";
		}
	echo "</select>";
}

/*function cboComplejo2($nombreCombo,$estilo,$sql,$campoValor,$campoItem,$datoCompara,$title,$Ctop=0,$xSel=0,$jvSel=0){
	if($jvSel==1){$jvEvent="onChange='recargaDatos()'";};
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
}*/

#$cboVal es los datos o array que se quiere mostrar en el combo
#$swcbo es cuando se quiere controlar si se quiere poner el id del combo datos del id o datos del texto a mostrar 1 y 0
# valor 1  se guardar el id del combo el valor del $a y no del $cboVal
#$jvEvent alguna funcion en javascript o evento del combo
#$xSel es para poner un valor en 0 y texto seleccione 1 y 0
function cboSBsimple($cboNom,$estilo,$title,$cboVal,$datoCompara,$swcbo=0,$jvEvent="",$xSel=0,$enabled=0){
conn_abre ();
	if($enabled==1){$blocked="disabled";};
echo "<select name='$cboNom' class='$estilo' title='$title' $jvEvent $blocked>";
if($xSel==1){echo "<option value='0' selected>Seleccione</option>";};
foreach ($cboVal as $valor) {
		$a++;
		if($swcbo){$dato=$a;}else{$dato=$valor;}
		echo "<option ";
				if ($datoCompara==$dato){
					echo " selected ";
					$a=1;
				}
	    echo "<option value='$dato'>$valor</option>";	
}
echo "</select>";
}

function TblIdioma($idcv=""){
conn_abre ();
if($idcv!=""){ $sql="select i.txt_idioma,il.txt_nivel from tbl_idioma as i,tbl_idiomasel as il where i.id_idioma=il.id_idioma and il.id_cv='$idcv'";}else{$sql="select * from tbl_idioma";}
$arNivel[1]="Basico";$arNivel[2]="Intermedio";$arNivel[3]="Avanzado";
$result=mysql_query($sql)or die("Error : ".mysql_error());
echo "<table class=\"texto_02\" width=\"100%\">";
	while($rs=mysql_fetch_array($result)){
		if($idcv==""){
	echo "<tr><td align=left><input type='checkbox' name='idioma$rs[id_idioma]' id='idioma$rs[id_idioma]' value='$rs[id_idioma]' onclick='valCkb($rs[id_idioma])' title='Idioma*r'/>$rs[txt_idioma] </td><td><input type='radio' value='1' name='cbo_nivel$rs[id_idioma]' id='cbo_nivel$rs[id_idioma]'/>Basico<input type='radio' value='2' name='cbo_nivel$rs[id_idioma]' id='cbo_nivel$rs[id_idioma]'/>Intermedio<input type='radio' value='3' name='cbo_nivel$rs[id_idioma]' id='cbo_nivel$rs[id_idioma]' />Avanzado</td></tr>";		
		}else{
		$sel=$rs['txt_nivel'];
		echo "<tr><td align=left><b>Idioma:</b>&nbsp;&nbsp;$rs[txt_idioma]</td><td><b>Nivel Alcanzado:</b>&nbsp;&nbsp;$arNivel[$sel]</td></tr>";
		}
	}
echo "</table>";
}
function TblElaboral($idela){
conn_abre ();
 $sql="select ela.id_elaboral,ela.id_cv,ela.txt_nomemp,ela.txt_giroemp,ela.txt_cargemp,ela.txt_tlemp,ela.txt_suelemp,ela.txt_msalida,ela.txt_logro from tbl_elaboral as ela,tbl_curricullum as cv where ela.id_cv=cv.id_cv and ela.id_cv='$idela'";
$result=mysql_query($sql)or die("Error : ".mysql_error());
echo "<table class=\"titus_tablas\" width=\"100%\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" bordercolor=\"#DEDAC8\">";
	while($rs=mysql_fetch_array($result)){
		$a++;
		echo "
	<tr>
    <td colspan=\"6\" class=\"texto_04\" height=\"22\">EMPRESA $a:</td>
  </tr>
  <tr>
    <td>Nombre de la Empresa:</td>
    <td><input type=\"text\" name=\"txt_apepat\" class=\"input\" value=\"$rs[txt_nomemp]\" style=\"width:175px;\" readonly/></td>
    <td>Giro Empresa:</td>
    <td><input type=\"text\" name=\"txt_apepat\" class=\"input\" value=\"$rs[txt_giroemp]\" style=\"width:175px;\" readonly/></td>
    <td>Cargo Ocupado:</td>
    <td><input type=\"text\" name=\"txt_apepat\" class=\"input\" value=\"$rs[txt_cargemp]\" style=\"width:175px;\" readonly/></td>
  </tr>
  <tr>
    <td>Tiempo laborado</td>
    <td><input type=\"text\" name=\"txt_apepat\" class=\"input\" value=\"$rs[txt_tlemp]\" style=\"width:175px;\" readonly/></td>
    <td>Ultimo sueldo</td>
    <td><input type=\"text\" name=\"txt_apepat\" class=\"input\" value=\"$rs[txt_suelemp]\" style=\"width:175px;\" readonly/></td>
    <td>Motivocese</td>
    <td><input type=\"text\" name=\"txt_apepat\" class=\"input\" value=\"$rs[txt_msalida]\" style=\"width:175px;\" readonly/></td>
  </tr>
  <tr>
    <td colspan=\"3\">Indicar sus principales responsabilidades en el cargo, asi como logros alcanzados</td>
    <td colspan=\"3\"><textarea class=\"textarea\" style=\"width:247px; height:60px\" name=\"txt_logro\" readonly>$rs[txt_logro]</textarea></td>
  </tr>
		";
	}
echo "</table>";
}


function getCountR($tabla,$swRs="") {
conn_abre ();
        $total = mysql_query("SELECT COUNT(*) FROM $tabla $swRs") or die(mysql_error());
        $total = mysql_fetch_array($total);
        return $total[0];
} 

function verProfesion($id){
conn_abre ();
$sql="select txt_prof from tbl_profesion where id_prof='$id'";
$result=mysql_query($sql)or die("Select : <br>".mysql_error());
$rs=mysql_fetch_array($result);
return $rs['txt_prof'];
}

function getRow($campo,$tabla,$swRs=""){
		conn_abre ();
		$sql="SELECT $campo FROM $tabla $swRs";
        $total = mysql_query($sql) or die(mysql_error());
        $rs = mysql_fetch_array($total);
        return $rs[$campo];
}

?>
