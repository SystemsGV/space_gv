<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("includes/fc_global.php");
	include("clases/cls_emp_administrador.php");
	include("clases/cls_emp_hotel.php");
	include("clases/cls_paginador_.php");
	
	$objcat0 = new cls_administrador($_SESSION['session_administrator']);
	
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

<script>
function eliminar(id)
{
	var entrar = confirm("Esta seguro de eliminar este elemento?")
	if (entrar)
	{   
		location.href="proc_administrador.php?op=3&id=" + id;
	}
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
				<td height="4">
				<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
                  	<td width="32"><img src="iconos/ic_inf.png" alt="" border="0" /></td>
                    <?
                    if($objcat0->getTipo()==0){
						$tip0="CONTABILIDAD";
					}
					if($objcat0->getTipo()==1){
						$tip0="AGENTE";
					}
					?>
					<td height="30" class="titu_secc"> &nbsp;&nbsp;Bienvenido: <?=strtoupper($objcat0->getNombres());?><br><span style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;Perfil: <?=$tip0;?></span></td>
				  </tr>
                  <tr>
                  <td colspan="2" height="10"></td>
                  </tr>
				</table>
                <br><br>
                <table width="98%" border="0" style="border:#CCC 1px solid;" align="center" cellpadding="0" cellspacing="0">
                <tr>
                
                <!--<td align="center" style="padding-top:20px; padding-bottom:20px;">
                    <table>
                    <tr>
                    <td width="80" align="center"><img src="iconos/ic_busca.png" alt="" border="0" /></td>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td class="titu_secc11"><strong>BUSCAR POR NRO DE FILE</strong></td>
                        </tr>
                        <tr>
                        <td height="15"></td>
                        </tr>
                        <form action="inf_query.php?idcat=1" method="post" name="form1" id="form1">
                        <tr>
                        <td><input class="textbox" name="txt_criterio" type="text" placeholder="Nro. Paquete"><br><br>
                        <a href="#" onClick="document.forms['form1'].submit(); return false;" class="myButton">BUSCAR</a></td>
                        </tr>
                        </form>
                        </table>
                    </td>
                    </tr>
                    </table>
                </td>
                <td width="50" class="titu_secc11" align="center">ó</td>-->
                <td align="center" style="padding-top:20px; padding-bottom:20px;">
                	<table>
                    <tr>
                    <td width="80" align="center"><img src="iconos/ic_busca.png" alt="" border="0" /></td>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td class="titu_secc11"><strong>REQUERIMIENTO PAGOS REGISTADOS:</strong></td>
                        </tr>
                        <tr>
                        <td height="15"></td>
                        </tr>
                        <form action="inf_query4.php?idcat=1" method="post" name="form2" id="form1">
                        <tr>
                        <td>                        
                        <table><tr><td><input name="txt_criterio1" id="txt_criterio1" class="textbox" style="width:230px; padding-left:9px; font-size:13px; " type="text" placeholder="Desde..." readonly /></td><td><input id="lanzador" type="image" src="calendario.png" />
				<script type="text/javascript">
					Calendar.setup({
					inputField     :    "txt_criterio1",      // id del campo de texto
					ifFormat       :    "%Y-%m-%d",       // formato de la fecha, cuando se escriba en el campo de texto
					button         :    "lanzador"   // el id del bot?n que lanzar? el calendario
					});
				</script></td></tr></table>
                		<br>
                        <table><tr><td><input name="txt_criterio2" id="txt_criterio2" class="textbox" style="width:230px; padding-left:9px; font-size:13px; " type="text" placeholder="Hasta..." readonly /></td><td><input id="lanzador2" type="image" src="calendario.png" />
				<script type="text/javascript">
					Calendar.setup({
					inputField     :    "txt_criterio2",      // id del campo de texto
					ifFormat       :    "%Y-%m-%d",       // formato de la fecha, cuando se escriba en el campo de texto
					button         :    "lanzador2"   // el id del bot?n que lanzar? el calendario
					});
				</script></td></tr></table>
                            <br>
                                <a href="#" onClick="document.forms['form2'].submit(); return false;" class="myButton">BUSCAR</a>

                        </td>
                        </tr>
                        </form>
                        </table>
                    </td>
                    </tr>
                    </table>
                </td>
                <!--<td width="50" class="titu_secc11" align="center">ó</td>
                <td align="center" style="padding-top:20px; padding-bottom:20px;">
                	<table>
                    <tr>
                    <td width="80" align="center"><img src="iconos/ic_busca.png" alt="" border="0" /></td>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td class="titu_secc11"><strong>BUSCAR POR NOMBRE PASAJERO</strong></td>
                        </tr>
                        <tr>
                        <td height="15"></td>
                        </tr>
                        <form action="inf_query3.php?idcat=1" method="post" name="form3" id="form3">
                        <tr>
                        <td>
                            <input class="textbox" name="txt_criterio" type="text" placeholder="Nombre de pasajero"><br><br>
                        <a href="#" onClick="document.forms['form3'].submit(); return false;" class="myButton">BUSCAR</a>
                        </td>
                        </tr>
                        </form>
                        </table>
                    </td>
                    </tr>
                    </table>
                </td>-->
                </tr>
                </table>
                <br><br>
				

	</td>
	</tr>
	<tr>
	<td height="30"></td>
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
