<?
	include("includes/inc_header.php");
//	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_encuesta.php");
	include("clases/cls_emp_respuesta.php");
	include "clases/FusionCharts.php";
	include "clases/Functions.php";
	$id=$_GET['id'];
	$encuesta = new cls_emp_encuesta($id);
	conn_abre();
$sql="select id_encuesta,txt_encuesta from tbl_encuesta where id_encuesta='$id'";
$rsl=mysql_query($sql);
$rs=mysql_fetch_array($rsl);
$totv=sumTot("int_votos",$rs[id_encuesta]);
$strXML = "";
$strXML = "<chart caption = '".strtoupper($rs[txt_encuesta])."' bgColor='#F9F6ED' baseFontSize='11' showValues='1' xAxisName='$totv votos en total' >";
$sql="select * from tbl_respuesta where id_encuesta='$rs[id_encuesta]'";	  
$result=mysql_query($sql) or die(mysql_error());
while($rsop=mysql_fetch_array($result)){
	$color=str_replace("#","",$rsop[txt_color]);
	$strXML .= "<set label = '$rsop[txt_respuesta]' value ='".$rsop[int_votos]."' color = '$color' />";
}
$strXML .= "</chart>";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador de Contenidos LAGRANJAVILLA</title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script type="text/javascript" language="JavaScript1.2" src="../js/fvalidar.js"></script>
<script type="text/javascript">
function registrar()
{
	var i;
	i=0;
	if(document.form1.txt_encuesta.value=="")
	{
			alert("Por favor, ingrese nombres");
			document.form1.txt_encuesta.focus();
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_encuesta.php?op=1";
		document.form1.submit();
	}
}

function editar(id)
{
	var i;
	i=0;
	if(document.form1.txt_encuesta.value=="")
	{
			alert("Por favor, ingresa los nombres");
			document.form1.nombres.focus();
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_encuesta.php?op=2&id="+id;
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_encuesta.php";
	document.form1.submit();
}

</script>  
<SCRIPT LANGUAGE="JavaScript">
var cp = new ColorPicker('window'); // Popup window
var cp1 = new ColorPicker(); // DIV style
var cp2 = new ColorPicker(); // DIV style
var cp3 = new ColorPicker(); // DIV style
var cp4 = new ColorPicker(); // DIV style
var cp5 = new ColorPicker(); // DIV style
var cp6 = new ColorPicker(); // DIV style
</SCRIPT>

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
					<td height="30" bgcolor="#DEDAC8" class="titus">&nbsp;&nbsp;Modulo Encuestas </td>
					<td height="30" bgcolor="#DEDAC8" align="right" valign="bottom"><a href="inf_encuestas.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				  </tr>
				  <tr>
					<td height="10"></td>
				  </tr>
				</table>
          <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" name="form1" id="form1">
              <tr bgcolor="#F9F6ED">
                <td width="333" height="10" valign="top"></td>
                <td width="548" align="left" bgcolor="#F9F6ED"></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Encuesta:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><input name="txt_encuesta" type="text" class="input" id="txt_encuesta" size="30" value="<?=$encuesta->get_txt_encuesta()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
			  <?php
			  if($id!=""){
			  	$sql="select * from tbl_respuesta where id_encuesta='$id'";
				$result=mysql_query($sql) or die(mysql_error());
				while($rs=mysql_fetch_array($result)){
					$i++;
					?>
					
				<tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Respuesta <?=$i?>:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED" class="titus_tablas"><input name="txt_respuesta<?=$i?>" type="text" class="input" id="txt_respuesta<?=$i?>" size="30" value="<?=$rs['txt_respuesta']?>" />  <input type="hidden" name="id_respuesta<?=$i?>" value="<?=$rs['id_respuesta']?>"/>&nbsp;<INPUT TYPE="text" NAME="color<?=$i?>" VALUE="<?=$rs['txt_color']?>" class="input" readonly size="7"> <A HREF="#" onClick="cp<?=$i?>.select(document.forms[0].color<?=$i?>,'pick<?=$i?>');return false;" NAME="pick<?=$i?>" ID="pick<?=$i?>">Color <?=$i?></A>

<SCRIPT LANGUAGE="JavaScript">cp.writeDiv()</SCRIPT>
</td>
              </tr>	
				<?	
				}
			  }else{
			  ?>
			  
			  <?php for($i=1;$i<=6;$i++){?>
              <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Respuesta <?=$i?>:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED" class="titus_tablas"><input name="txt_respuesta<?=$i?>" type="text" class="input" id="txt_respuesta<?=$i?>" size="30" value="" />&nbsp;<INPUT TYPE="text" NAME="color<?=$i?>" VALUE="" class="input" readonly size="7"> <A HREF="#" onClick="cp<?=$i?>.select(document.forms[0].color<?=$i?>,'pick<?=$i?>');return false;" NAME="pick<?=$i?>" ID="pick<?=$i?>">Color <?=$i?></A><SCRIPT LANGUAGE="JavaScript">cp.writeDiv()</SCRIPT>
				
				</td>
              </tr>
			  
			  <?php }}?>
			  
			   <tr bgcolor="#F9F6ED">
                <td height="26" align="right" bgcolor="#F9F6ED" class="titus_tablas">Encuesta de la semana:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><select name="int_estado" class="select">
                    <option value="0" <? if($encuesta->get_int_estado()==0){ echo "selected"; }?> ><? echo NO?></option>
                    <option value="1" <? if($encuesta->get_int_estado()==1){ echo "selected"; }?> ><? echo SI?></option>
                  </select> </td>
              </tr>
			  <? if($id!=""){ ?>
			  <tr bgcolor="#F9F6ED">
                <td height="26" align="center"  bgcolor="#F9F6ED" class="titus_tablas" colspan="2"><?=renderChartHTML("clases/Column3D.swf", "Votos",$strXML, $rs['txt_encuesta'], 700, 400, false);?></td>
              </tr>
			  <?php }?>
              <tr bgcolor="#F9F6ED">
                <td height="10"></td>
                <td align="left" bgcolor="#F9F6ED"></td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED"><? if($id!="") { ?>
                    &nbsp;<a href="javascript:editar(<? echo $id?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }else{?>
                    &nbsp;<a href="javascript:registrar();"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }?>
                  &nbsp;&nbsp;&nbsp;<a href="javascript:nuevo();"><img src="iconos/nuevo.gif" alt="Nuevo registro" border="0"></a>&nbsp;</td>
              </tr>
              <tr bgcolor="#F9F6ED">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#F9F6ED">&nbsp;</td>
              </tr>
            </form>
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
