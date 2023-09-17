<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");	
	include("clases/cls_emp_descripcion.php");
	include("clases/cls_emp_cliente.php");
	$id_modulos=$_GET['idcl'];

	$enoteca_modulos = new cls_emp_descripcion($id_modulos);
	$cliente= new cls_emp_cliente($_GET['idcl']);
?>

<?
$opc=$_GET['msg'];
if($opc==1){
	echo "<script>";
	echo "alert('Descripción actualizada correctamente.');";
	echo "</script>";
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script type="text/javascript" language="JavaScript1.2" src="../validaciones.js"></script>
<script language="javascript" src="calendar.js"></script>
<script language="javascript" src="calendar-es.js"></script>
<script language="javascript" src="calendar-setup.js"></script>

<script type="text/javascript">

function registrar()
{
	var i;
	i=0;
	if(document.form1.descripcion.value=="")
	{
			alert("Por favor, ingresa la descripcion");
			document.form1.descripcion.focus();
			return;
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_descripcion.php?op=1";
		document.form1.submit();
	}
}

function editar(id)
{
	var i;
	i=0;
	if(document.form1.descripcion.value==""){
			alert("Por favor, ingresa la descripcion");
			document.form1.descripcion.focus();
			return;
			i=i+1;
	}

	if(i==0){
		document.form1.action="proc_descripcion.php?op=2&id="+id ;
		document.form1.submit();
	}
}





</script>

</head>

<body>
<div align="center" width="100%">
<br>
<table bgcolor="#FFFFFF" width="910" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td bgcolor="#8f9fb4" colspan="3" width="910" height="1"></td>
  </tr>
  <tr>
  <td width="1" bgcolor="#8f9fb4"></td>
  <td width="908">
	<table width="908" border="0" cellpadding="0" cellspacing="0">
	<?include("cabecera.php")?>
	<tr>
	<td>
		<table width="881" border="0" cellpadding="0" cellspacing="0" align="center">
	    <tr>
		<td width="881" height="4"><table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td height="5"></td>
		  </tr>
		  <tr>
          	<td width="32"><img src="iconos/ic_frm.png" alt="" border="0" /></td>
			<td height="30" class="titu_secc">&nbsp;&nbsp;DESCRIPCI&Oacute;N - <?=strtoupper($cliente->get_txt_nombre())?></td>
			<td height="30" align="right" valign="bottom"><a href="inf_clientes.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a></td>
		  </tr>
		  <tr>
			<td height="10"></td>
		  </tr>
		</table>
		
		
          <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <tr bgcolor="#989898">
                <td colspan="3" height="1"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" align="center" bgcolor="#ffffff" class="azulbold"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td width="233" height="25"></td>
                <td width="10"></td>
                <td width="638" align="left" bgcolor="#f5f5f5"><input type="hidden" name="idcl" value="<?=$_GET['idcl']?>"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos" valign="top">Descripción del Show:</td>
                <td width="10" valign="top"></td>
                <td align="left"><textarea name="descripcion" cols="40" class="input" style="width:441px; height:300px; padding:5px 5px 5px 5px;"><?=$enoteca_modulos->get_txt_descripcion()?></textarea></td>
              </tr>	              
              <tr bgcolor="#f5f5f5">
                <td height="15" align="right" class="titus_tablas"></td>
                <td></td>
                <td align="left" bgcolor="#f5f5f5"><select style="display:none;" name="id_stado" class="select">
                    <option value="1" <? if($enoteca_modulos->get_int_stado()==1){ echo "selected"; }?> ><? echo SI?></option>
                  </select>                </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><? if($id_modulos!="") { ?>
                    &nbsp;<a href="javascript:editar(<?=$id_modulos?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }else{?>
                    &nbsp;<a href="javascript:registrar();"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                    <? }?>
                  &nbsp;&nbsp;&nbsp;<a href="javascript:nuevo();"></a>&nbsp;</td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;</td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="5"></td>
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

