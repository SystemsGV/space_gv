<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_administrador.php");
	
	$objcat0 = new cls_administrador($_SESSION['session_administrator']);

	$id=$_GET['id'];
	$administrador = new cls_administrador($id);
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
	if(document.form1.nombres.value=="")
	{
			alert("Por favor, ingrese nombres");
			document.form1.nombres.focus();
			i=i+1;
	}
	if(document.form1.correo.value=="" && i==0)
	{
			alert("Por favor, ingrese el email");
			document.form1.correo.focus();
			i=i+1;
	}
	if(document.form1.usuario.value==""  && i==0)
	{
			alert("Por favor, ingrese el usuario");
			document.form1.usuario.focus();
			i=i+1;
	}
	if(document.form1.clave.value==""  && i==0)
	{
			alert("Por favor, ingrese clave");
			document.form1.clave.focus();
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_administrador.php?op=1";
		document.form1.submit();
	}
}

function editar(id)
{
	var i;
	i=0;
	if(document.form1.nombres.value=="")
	{
			alert("Por favor, ingresa los nombres");
			document.form1.nombres.focus();
			i=i+1;
	}
	if(document.form1.correo.value=="" && i==0)
	{
			alert("Por favor, ingresa el email");
			document.form1.correo.focus();
			i=i+1;
	}
	if(document.form1.clave.value==""  && i==0)
	{
			alert("Por favor, ingresa la clave");
			document.form1.clave.focus();
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_administrador.php?op=2&id="+id;
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_administrador.php";
	document.form1.submit();
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
		<td width="100%" height="4"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td height="5"></td>
		  </tr>
		  <tr>
          	<td width="32"><img src="iconos/ic_frm.png" alt="" border="0" /></td>
			<td height="30" class="titu_secc">&nbsp;&nbsp;Modulo Administradores</td>
			<td height="30" align="right" valign="bottom"><a href="inf_administrador.php" class="myButton4">< REGRESAR</a></td>
		  </tr>
		  <tr>
			<td height="10"></td>
		  </tr>
		</table>
		
		
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" name="form1" id="form1">
             <tr bgcolor="#989898">
                <td colspan="2" height="1"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td width="333" height="10" valign="top"></td>
                <td width="548" align="left" bgcolor="#f5f5f5"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Nombres:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><input name="nombres" type="text" class="input" id="nombres" size="40" value="<? echo $administrador->getNombres()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td colspan="2" height="10"></td>
              </tr>	
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">E-mail:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><input name="correo" type="text" class="input" id="correo" size="40" value="<? echo $administrador->getCorreo()?>" onBlur="IsMail(this,2)" />
                    <span class="titus_tablas">*</span></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td colspan="2" height="10"></td>
              </tr>	
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Usuario:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><input name="usuario" type="text" class="input" id="usuario" size="40" value="<? echo $administrador->getUsuario()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td colspan="2" height="10"></td>
              </tr>	
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Clave:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><input name="clave" type="password" class="input" id="clave" size="40" value="<? echo $administrador->getClave()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td colspan="2" height="10"></td>
              </tr>	
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Tipo:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">
                	<select name="tipo" class="input">
                    <option value="0">PERFIL ADMINISTRADOR</option>
                    <option value="1">PERFIL PUNTO DE VENTA</option>
                    <option value="2">PERFIL CONSULTA</option>
                    </select>                
                    <span class="titus_tablas">*</span> </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="10"></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><? if($id!="") { ?>
                    <a href="javascript:editar(<? echo $id?>);" class="myButton3">ACTUALIZAR REGISTRO</a>&nbsp;
                    <? }else{?>
                    <a href="javascript:registrar();" class="myButton3">GUARDAR REGISTRO</a>&nbsp;
                    <? }?>
                  </td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;</td>
              </tr>
               <tr bgcolor="#989898">
                <td colspan="2" height="1"></td>
               </tr
            ></form>
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