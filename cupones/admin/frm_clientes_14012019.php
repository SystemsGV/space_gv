<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_cliente.php");
	include("includes/fc_global.php");
	include("clases/cls_emp_administrador.php");
	include("clases/cls_emp_categoria.php");
	
	$objcat0 = new cls_administrador($_SESSION['session_administrator']);
	
	$idcat=$_GET['idcat'];
	$id=$_GET['id'];	
	$socio = new cls_emp_cliente($id);
	$trozos = explode(".", $socio->get_txt_email());
	$nombre=$trozos[0]."_t.".$trozos[1];
	$foto=UPLOAD_FOTOS.$nombre;
	$objcat = new cls_emp_categoria($_GET['idcat']);
	
	$enoteca_modulos = new cls_administrador($socio->get_txt_telefono());
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
<script src="ckeditor/ckeditor.js"></script>

<script type="text/javascript">
function registrar(idcat)
{
	var i;
	i=0;
	if(document.form1.nombres.value=="")
	{
			alert("Por favor, ingrese nombres");
			document.form1.nombres.focus();
			i=i+1;
	}	
	if(i==0){
		document.form1.action="proc_clientes.php?op=1&idcat="+idcat;
		document.form1.submit();
	}
}

function editar(idcat, id)
{
	var i;
	i=0;
	if(document.form1.nombres.value=="")
	{
			alert("Por favor, ingresa los nombres");
			document.form1.nombres.focus();
			i=i+1;
	}
	if(i==0){
		document.form1.action="proc_clientes.php?op=2&idcat="+idcat+"&id="+id;
		document.form1.submit();
	}
}

function nuevo()
{
	document.form1.action="frm_socios.php";
	document.form1.submit();
}
</script>

<style> 
  .textbox { 
    border: 1px solid #c4c4c4; 
    height: 35px; 
    width: 275px; 
    font-size: 14px; 
    padding: 4px 4px 4px 10px; 
    border-radius: 4px; 
    -moz-border-radius: 4px; 
    -webkit-border-radius: 4px; 
    box-shadow: 0px 0px 5px #d9d9d9; 
    -moz-box-shadow: 0px 0px 5px #d9d9d9; 
    -webkit-box-shadow: 0px 0px 5px #d9d9d9; 
} 
 
.textbox:focus { 
    outline: none; 
    border: 1px solid #d0d0d0; 
    box-shadow: 0px 0px 5px #81b908; 
    -moz-box-shadow: 0px 0px 5px #81b908; 
    -webkit-box-shadow: 0px 0px 5px #81b908; 
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
	padding:9px 34px;
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
  <td bgcolor="#8f9fb4" colspan="3" width="910" height="1"></td>
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
				<td  height="4"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td height="5"></td>
		  </tr>
		  <tr>
          	<td width="32"><img src="iconos/ic_frm.png" alt="" border="0" /></td>
			<td height="30" class="titu_secc">&nbsp;&nbsp;Registrar Empresas</td>
			<td height="30" align="right"><a href="inf_clientes.php?idcat=<?=$idcat?>" class="myButton4">< REGRESAR</a></td>
		  </tr>
		  <tr>
			<td height="10"></td>
		  </tr>
		</table>
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
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
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">NOMBRE EMPRESA:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="nombres" type="text" class="input" style="width:550px; text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();" id="nombres" size="50" value="<?=$socio->get_txt_nombre()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>
			  <tr bgcolor="#f5f5f5">
                <td height="10"></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>
              
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">TIPO DE CONVENIO:</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<select name="nombres6" class="input">
                    <option value="1" <? if($socio->get_txt_nombre6()=='1'){ echo "selected"; }?> ><? echo 'Venta de Pulseras';?></option>
					<option value="2" <? if($socio->get_txt_nombre6()=='2'){ echo "selected"; }?> ><? echo 'Devoluciones';?></option>
					<option value="3" <? if($socio->get_txt_nombre6()=='3'){ echo "selected"; }?> ><? echo 'CANJE';?></option><!--Canjes: 4x3/3x2-->
					<option value="4" <? if($socio->get_txt_nombre6()=='4'){ echo "selected"; }?> ><? echo 'Convenios';?></option>
					<option value="5" <? if($socio->get_txt_nombre6()=='5'){ echo "selected"; }?> ><? echo 'Cortes&iacute;as';?></option>
					<option value="6" <? if($socio->get_txt_nombre6()=='6'){ echo "selected"; }?> ><? echo 'Festival GV';?></option>
					<option value="7" <? if($socio->get_txt_nombre6()=='7'){ echo "selected"; }?> ><? echo 'Colegios';?></option>
					<option value="8" <? if($socio->get_txt_nombre6()=='8'){ echo "selected"; }?> ><? echo 'Cumplea&ntilde;os';?></option>
					<option value="0" <? if($socio->get_txt_nombre6()=='0'){ echo "selected"; }?> ><? echo 'Ninguna Promoci&oacute;n';?></option>
                  </select>                </td>
              </tr> 
              <tr bgcolor="#f5f5f5">
                <td height="15"></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>	
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">NRO. CUPONES:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="nombres2" type="text" class="input" style="width:200px;" id="nombres2" size="50" value="<?=$socio->get_txt_nombre2()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr>             
              <tr bgcolor="#f5f5f5">
                <td height="15"></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>	
              
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">USUARIO:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="usuario" type="text" class="input" style="width:550px;" id="usuario" size="50" value="<?=$socio->get_txt_usuario()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr> 	  
              <tr bgcolor="#f5f5f5">
                <td width="290" height="15" valign="top"></td>
                <td width="591" align="left" bgcolor="#f5f5f5"></td>
              </tr>		
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">CONTRASEÑA:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="password" type="text" class="input" style="width:550px;" id="password" size="50" value="<?=$socio->get_txt_password()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr> 
              
              <tr bgcolor="#f5f5f5">
                <td width="290" height="15" valign="top"></td>
                <td width="591" align="left" bgcolor="#f5f5f5"></td>
              </tr>			  
              
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">CORREO ELECTRONICO:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="nombres5" type="text" class="input" style="width:550px;" id="nombres5" size="50" value="<?=$socio->get_txt_nombre5()?>" />
                    <span class="titus_tablas">*</span> </td>
              </tr> 
              
              <tr bgcolor="#f5f5f5">
                <td width="290" height="15" valign="top"></td>
                <td width="591" align="left" bgcolor="#f5f5f5"></td>
              </tr>
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">FECHA DE VENCIMIENTO:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">         
                <table><tr><td>&nbsp;<input name="nombres4" id="nombres4" class="input" style="width:200px; background-color:#FFF; padding-left:9px; font-size: 13px; height:28px;" type="text"  value="<?=$socio->get_txt_nombre4()?>" readonly /></td><td><input id="lanzador2" type="image" src="calendario.png" />
				<script type="text/javascript">
					Calendar.setup({
					inputField     :    "nombres4",      // id del campo de texto
					ifFormat       :    "%Y-%m-%d",       // formato de la fecha, cuando se escriba en el campo de texto
					button         :    "lanzador2"   // el id del bot?n que lanzar? el calendario
					});
				</script></td></tr></table>
                </td>
              </tr>             
              <tr bgcolor="#f5f5f5">
                <td height="15"></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>	
              
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">IMAGEN CUPON:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="txt_imagen" type="file" class="input" style="width:550px;" id="txt_imagen" size="30" /></td>
              </tr>
              <? if($socio->get_txt_email()!="") {?>
              <tr bgcolor="#f5f5f5">
                <td colspan="3" height="10"></td>
              </tr>	 
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">CUPON ACTUAL:&nbsp;&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5"><table width="319" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="140"><img src="<?=$foto?>" width="120" hspace="9" style="border:#333333 1px solid" /></td>
                      <td width="53" class="texto_campos">&nbsp;Quitar </td>
                      <td width="126"><input name="chk_quitar" type="checkbox" id="chk_quitar" value="1" />
                          <input name="hid_txt_imagen" type="hidden" value="<? echo $socio->get_txt_email()?>" /></td>
                    </tr>
                </table></td>
              </tr>
			  <? }?>
              
              <tr bgcolor="#f5f5f5">
                <td height="10"></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>
              
              <tr bgcolor="#f5f5f5">
                <td height="26" align="right" class="texto_campos">ESTADO DEL CLIENTE</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<select name="int_stado" class="input">
                    <option value="0" <? if($socio->get_int_stado()==0){ echo "selected"; }?> ><? echo 'ACTIVO';?></option>
                    <option value="1" <? if($socio->get_int_stado()==1){ echo "selected"; }?> ><? echo 'INACTIVO';?></option>
                  </select>                </td>
              </tr>                  
              
              <tr bgcolor="#f5f5f5">
                <td height="18"></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>                           
              <tr bgcolor="#f5f5f5">
                <td>&nbsp;</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<? if($id!="") { ?>
                   <a href="javascript:editar(<? echo $idcat.",".$id?>);" class="myButton3">ACTUALIZAR REGISTRO</a>&nbsp;
                    <? }else{?>
                   <a href="javascript:registrar(<?=$idcat?>);" class="myButton3">GUARDAR REGISTRO</a>&nbsp;
                    <? }?>
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
