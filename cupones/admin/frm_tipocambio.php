<?
	include("includes/inc_header.php");
	//include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_mantenimiento.php");

	$id=$_GET['id'];
	$msg=$_GET['msg'];
	$mantenimiento = new cls_mantenimiento($id);

	if($msg=="ok")
	{
	echo "<script type=\"text/javascript\">alert(\"Los cambios se grabaron exitosamente\");</script>";
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script type="text/javascript">
function registrar()
{
	var i;
	i=0;
	if(document.form1.tipoca.value=="")
	{
			alert("Por favor, ingrese tipo de cambio");
			document.form1.tipoca.focus();
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_mantenimiento.php?op=1";
		document.form1.submit();
	}
}

function editar(id)
{
	var i;
	i=0;
	if(document.form1.tipoca.value=="")
	{
			alert("Por favor, ingresa el tipo de cambio");
			document.form1.tipoca.focus();
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_mantenimiento.php?op=2&id="+id;
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_mantenimiento.php";
	document.form1.submit();
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
			<td height="30" class="titu_secc">&nbsp;&nbsp;STOCK: CATEGORIAS</td>
			<td height="30" align="right"><a href="inf_categoria.php"><img src="iconos/volver.gif" alt="Volver" border="0"></a></td>
		  </tr>
		  <tr>
			<td height="10"></td>
		  </tr>
		</table>
          <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" name="form1" id="form1">
             <tr bgcolor="#989898">
                <td colspan="2" height="1"></td>
              </tr>
             <tr bgcolor="#ffffff">
                <td colspan="2" height="1"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td width="290" height="25" valign="top"></td>
                <td width="591" align="left" bgcolor="#f5f5f5"></td>
              </tr>			  
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Tipo de Cambio:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="tipoca" type="text" class="input" id="tipoca" size="30" value="<? echo $mantenimiento->gettipoca()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="18"></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>                           
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<a href="javascript:editar(<? echo $id; ?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;
                   </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;</td>
              </tr>
              <tr bgcolor="#989898">
                <td colspan="2" height="1"></td>
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
