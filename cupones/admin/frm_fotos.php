<?
	//error_reporting(E_ALL);
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("includes/fc_global.php");	
	include("clases/cls_emp_foto.php");
	include("clases/cls_emp_administrador.php");
	$objcat0 = new cls_administrador($_SESSION['session_administrator']);
	
	
	$idcat=$_GET['idcat'];
	$idcl=$_GET['idcl'];
	$id=$_GET['id'];
	$id0=$_GET['id0'];
	
	/*echo "idcat=".$idcat;
	echo "<br>";
	echo "id=".$id;
	echo "<br>";
	echo "idcl=".$idcl;
	echo "<br>";
	echo "id0=".$id0;
	echo "<br>";*/
	
	$dato = new cls_emp_foto($id);	
	$trozos = explode(".", $dato->get_txt_foto());
	$nombre=$trozos[0]."_t.".$trozos[1];
	$foto=UPLOAD_FOTOS.$nombre;
	include("clases/cls_emp_cliente.php");
	$cliente= new cls_emp_cliente($_GET['idcl']);
	
	include("clases/cls_emp_hotel.php");
	$hotel= new cls_emp_foto0($_GET['id0']);
	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<link href="calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar.js"></script>
<script language="javascript" src="calendar-es.js"></script>
<script language="javascript" src="calendar-setup.js"></script>

<script type="text/javascript">

function registrar(id0, idcl, idcat)

{
	var i;
	i=0;
// Valida para la foto 1
	if(i==0){
		document.form1.action="proc_foto.php?op=1&id0="+id0+"&idcl="+idcl+"idcat=1";
		document.form1.submit();
	}

}

function editar(id, id0, idcl, idcat)
{
	var i;
	i=0;	

	if(i==0){
		document.form1.action="proc_foto.php?op=2&id="+id+"&id0="+id0+"&idcl="+idcl+"&idcat=1";
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_fotos.php";
	document.form1.submit();
}


function validar_foto(i)
{

}
</script>
<style>
.myButton3 {
	-moz-box-shadow:inset 0px 1px 0px 0px #9acc85;
	-webkit-box-shadow:inset 0px 1px 0px 0px #9acc85;
	box-shadow:inset 0px 1px 0px 0px #9acc85;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #74ad5a), color-stop(1, #68a54b));
	background:-moz-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-webkit-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-o-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-ms-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:linear-gradient(to bottom, #74ad5a 5%, #68a54b 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#74ad5a', endColorstr='#68a54b',GradientType=0);
	background-color:#74ad5a;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #3b6e22;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:10px 18px;
	text-decoration:none;
}
.myButton3:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #68a54b), color-stop(1, #74ad5a));
	background:-moz-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-webkit-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-o-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-ms-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:linear-gradient(to bottom, #68a54b 5%, #74ad5a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#68a54b', endColorstr='#74ad5a',GradientType=0);
	background-color:#68a54b;
}
.myButton3:active {
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
  <td bgcolor="#8f9fb4" colspan="3" width="100%" height="1"></td>
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
		<td height="4"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td height="5"></td>
		  </tr>
		  <tr>
          	<td width="32"><img src="iconos/ic_frm.png" alt="" border="0" /></td>
			<td height="30" class="titu_secc">&nbsp;&nbsp; Registro de Pagos - Paquete #<?=strtoupper($cliente->get_id_cliente())?></td>
			<td height="30" align="right" valign="bottom"><a href="inf_fotos.php?idcat=<?=$idcat?>&idcl=<?=$_GET['idcl'];?>&id0=<?=$_GET['id0'];?>" class="myButton4">< REGRESAR</a></td>
		  </tr>
		  <tr>
			<td height="10"></td>
		  </tr>
		</table>
		
		
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <tr bgcolor="#989898">
                <td colspan="3" height="1"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" align="center" bgcolor="#ffffff" class="azulbold"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td width="209" height="25"></td>
                <td width="11"></td>
                <td width="800" align="left" bgcolor="#f5f5f5"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">TITULO PAGO</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><input name="txt_titulo" type="text" class="input" size="40" value="<?=urldecode($hotel->get_txt_titulo())?>" /></td>
              </tr>	
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">MONTO PAGADO</td>
                <td>:</td>
                	<?
                    if($hotel->get_int_stado0()==0){$moneda="US$";}
					if($hotel->get_int_stado0()==1){$moneda="S/.";}
					if($hotel->get_int_stado0()==2){$moneda="EUR";}
					?>
                <td align="left" bgcolor="#f5f5f5" class="texto_campos"><select name="int_stado0" class="input">
                    <option value="0" <? if($dato->get_int_stado0()==0){ echo "selected"; }?> ><? echo 'US$'?></option>
                    <option value="1" <? if($dato->get_int_stado0()==1){ echo "selected"; }?> ><? echo 'S/.'?></option>
                  </select>&nbsp;<input name="txt_titulo3" type="text" class="input" style="width:155px;" size="30" value="<?=urldecode($dato->get_txt_titulo3())?>" />&nbsp;&nbsp;<span style="font-family:arial; font-size:12px; font-weight:normal; color:#666;"><strong>MONTO:</strong> <?=$moneda;?>&nbsp;&nbsp;<?=$hotel->get_txt_titulo5()?>&nbsp;&nbsp;/&nbsp;&nbsp;<strong>NRO. CTA.:</strong>&nbsp;<?=$hotel->get_txt_foto()?>&nbsp;&nbsp;/&nbsp;&nbsp;<strong>TITULAR:</strong>&nbsp;<?=$hotel->get_txt_titulo6()?></span></td>
              </tr>	
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>	 
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">FECHA DE PAGO</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5">
                <table><tr><td><input name="int_stado" id="int_stado" class="input" style="width:150px; background-color:#FFF; padding-left:9px; font-size: 13px; height:28px;" type="text"  value="<?=$dato->get_int_stado()?>" readonly /></td><td><input id="lanzador" type="image" src="calendario.png" /><script type="text/javascript">
					Calendar.setup({
					inputField     :    "int_stado",      // id del campo de texto
					ifFormat       :    "%Y-%m-%d",       // formato de la fecha, cuando se escriba en el campo de texto
					button         :    "lanzador"   // el id del bot?n que lanzar? el calendario
					});
				</script></td><td>&nbsp;&nbsp;<span style="font-family:arial; font-size:12px; color:#666;"><strong>FECHA LIMITE:</strong>&nbsp;&nbsp;<?=$hotel->get_txt_titulo4()?></span></td></tr></table>
				</td>
              </tr>   
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>	 	  
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos" valign="top">REGISTRO DE PAGO</td>
                <td valign="top">:</td>
                <td align="left" bgcolor="#f5f5f5"><textarea name="txt_titulo2" cols="40" class="input" style="width:700px; height:350px; padding:5px 5px 5px 5px;"><?=$dato->get_txt_titulo2()?></textarea>
                    <span class="titus_tablas">*</span> </td>
              </tr>      		  	
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>		  
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">SUBIR ARCHIVO</td>
                <td>:</td>
                <td align="left" bgcolor="#f5f5f5"><input name="txt_imagen" type="file" class="input" id="txt_imagen" size="30" /></td>
              </tr>
              <? if($dato->get_txt_foto()!="") {?>              
              <tr bgcolor="#f5f5f5">
                <td align="right" class="texto_campos"></td>
                <td></td>
                <td align="left" bgcolor="#f5f5f5" class="texto_campos">
                Quitar Archivo: <input name="chk_quitar" type="checkbox" id="chk_quitar" value="1" />
                          <input name="hid_txt_imagen" type="hidden" value="<? echo $dato->get_txt_foto()?>" /></td>
              </tr>
			  <? }?>
                    
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><input type="hidden" name="idcl" value="<?=$_GET['idcl']?>"/>&nbsp;</td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">
<? if($id!="") { ?>
                    <a href="javascript:editar(<?=$id?>,<?=$id0?>,<?=$idcl?>,<?=$idcat?>);" class="myButton3">ACTUALIZAR REGISTRO</a>&nbsp;
                    <? }else{?>
                    <a href="javascript:registrar(<?=$id0?>,<?=$idcl?>,<?=$idcat?>);" class="myButton3">GUARDAR REGISTRO</a>&nbsp;
                    <? }?>
                 </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="20"></td>
                <td></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>
              <tr bgcolor="#989898">
                <td colspan="3" height="1"></td>
              </tr>
            </form>
          </table></td>
      </tr>

    </table>
	
		</td>
	</tr>
	<tr>
	<td height="10"></td>
	</tr>
	<tr>
	<td height="2" bgcolor="#3b587a"></td>
	</tr>
	<tr>
	<td height="30" bgcolor="#b7b7b7">&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.websconsulting.com/" target="_blank" class="pie">Desarrollado por WSConsulting</a></td>
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