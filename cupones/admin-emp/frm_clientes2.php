<?

	include("includes/inc_header.php");

//	include("includes/inc_login.php");

	include("includes/constantes.php");

	include("includes/funciones.php");

	include("clases/cls_emp_cliente2.php");

	

	$idcat=$_GET['idcat'];

	$id=$_GET['id'];	

	$socio = new cls_emp_cliente($id);

	$trozos = explode(".", $socio->get_txt_email());

	$nombre=$trozos[0]."_t.".$trozos[1];

	$foto=UPLOAD_FOTOS.$nombre;

	$objCat = explode(" ",$socio->get_id_categoria());

	//var_dump($objCat);

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title><?=$TITULO_ADMIN?></title>

<link rel="stylesheet"  href="styles/estilos.css"type="text/css">

<link href="calendar.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>

<script language="javascript" src="calendar.js"></script>

<script language="javascript" src="calendar-es.js"></script>

<script language="javascript" src="calendar-setup.js"></script>



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

		document.form1.action="proc_clientes2.php?op=1&idcat="+idcat;

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

		document.form1.action="proc_clientes2.php?op=2&idcat="+idcat+"&id="+id;

		document.form1.submit();

	}

}



function nuevo()

{

	document.form1.action="frm_socios2.php";

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

			<td height="30" class="titu_secc">&nbsp;&nbsp;MODULO ARTICULOS</td>

			<td height="30" align="right"><a href="inf_clientes2.php?idcat=<?=$idcat?>"><img src="iconos/volver.gif" alt="Volver" border="0"></a></td>

		  </tr>

		  <tr>

			<td height="10"></td>

		  </tr>

		</table>

          <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">

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

                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Categorias:&nbsp;&nbsp;</td>

                <td align="left" bgcolor="#f5f5f5">

                <div style="height:150px; width:450px; overflow:auto">

                <ul style="list-style-type:none">

                <?

				conn_abre();

                $sql = "select * from  tbl_categoria2 order by txt_nombre";

				$row = mysql_query($sql) or die(mysql_error());

				while($rs=mysql_fetch_array($row)){

					if(in_array($rs[id_categoria].trim(strtolower(preg_replace('([^A-Za-z0-9])', '',$rs[txt_nombre]))),$objCat)){$select="checked";}else{$select=$none;}

				

				?>

                <li><input type="checkbox" name="rckcat[]" value="<?=$rs[id_categoria].trim(strtolower(preg_replace('([^A-Za-z0-9])', '',$rs[txt_nombre])))?>" <?=$select?> >&nbsp;<span class="texto_02"><b><?=$rs[txt_nombre]?></b></span></li>

                <? } ?>

                <span class="titus_tablas">*</span>

                </ul>

                </div>

                </td>

              </tr>             
				<tr bgcolor="#f5f5f5">
                <td height="15"></td>
                <td align="left" bgcolor="#f5f5f5"></td>
              </tr>
              <tr bgcolor="#f5f5f5">

                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Código del Articulo:&nbsp;&nbsp;</td>

                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="proyecto" type="text" class="input" id="proyecto" size="50" value="<?=$socio->get_txt_proyecto()?>" />

                    <span class="titus_tablas">*</span> </td>

              </tr>     
              <tr bgcolor="#f5f5f5">

                <td height="15"></td>

                <td align="left" bgcolor="#f5f5f5"></td>

              </tr>

              <tr bgcolor="#f5f5f5">

                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Nombre del Artículo (personaje):&nbsp;&nbsp;</td>

                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="nombres" type="text" class="input" id="nombres" size="50" value="<?=$socio->get_txt_nombre()?>" />

                    <span class="titus_tablas">*</span> </td>

              </tr>             

              <tr bgcolor="#f5f5f5">

                <td height="15"></td>

                <td align="left" bgcolor="#f5f5f5"></td>

              </tr>

              <tr bgcolor="#f5f5f5">

                <td height="26" align="right" class="texto_campos" valign="top">Descripción del articulo:</td>

                <td align="left">&nbsp;&nbsp;<textarea name="direccion" cols="40" class="input" style="width:441px; height:200px; padding:5px 5px 5px 5px;"><?=$socio->get_txt_direccion()?></textarea></td>

              </tr>	 

              <tr bgcolor="#f5f5f5">

                <td width="290" height="15" valign="top"></td>

                <td width="591" align="left" bgcolor="#f5f5f5"></td>

              </tr>			  

              <tr bgcolor="#f5f5f5">

                <td height="26" align="right" bgcolor="#f5f5f5" class="texto_campos">Precio Soles:<br>Formato (0.00)</td>

                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="telefono" type="text" class="input" id="telefono" size="50" value="<?=$socio->get_txt_telefono()?>" />

                    <span class="titus_tablas">*</span> </td>

              </tr>             

              <tr bgcolor="#f5f5f5">

                <td height="15"></td>

                <td align="left" bgcolor="#f5f5f5"></td>

              </tr>

              <tr bgcolor="#f5f5f5">

                <td height="26" align="right" class="texto_campos" valign="top">Mas Detalles:<br>(Fechas y Porcentajes)</td>

                <td align="left">&nbsp;&nbsp;<textarea name="celular" cols="40" class="input" style="width:441px; height:200px; padding:5px 5px 5px 5px;"><?=$socio->get_txt_celular()?></textarea></td>

              </tr>	      

              <tr bgcolor="#f5f5f5">

                <td colspan="3" height="10"></td>

              </tr>	  		  

              <tr bgcolor="#f5f5f5">

                <td height="26" align="right" class="texto_campos">Foto Portada:</td>

                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<input name="txt_imagen" type="file" class="input" id="txt_imagen" size="30" /></td>

              </tr>

              <? if($socio->get_txt_email()!="") {?>

              <tr bgcolor="#f5f5f5">

                <td colspan="3" height="10"></td>

              </tr>	 

              <tr bgcolor="#f5f5f5">

                <td height="26" align="right" class="texto_campos"><div align="right">Foto de Portada actual</div></td>

                <td align="left" bgcolor="#f5f5f5"><table width="255" border="0" cellspacing="0" cellpadding="0">

                    <tr>

                      <td width="135">&nbsp;&nbsp;&nbsp;<img src="<?=$foto?>" width="80" height="95" style="border:#333333 1px solid" /></td>

                      <td width="35" class="texto_campos">&nbsp;Quitar </td>

                      <td width="85"><input name="chk_quitar" type="checkbox" id="chk_quitar" value="1" />

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
                <td height="26" align="right" class="texto_campos">Articulo en Stock:</td>
                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<select name="departamento" class="select">
                    <option value="0" <? if($socio->get_txt_departamento()==0){ echo "selected"; }?> ><? echo NO?></option>
                    <option value="1" <? if($socio->get_txt_departamento()==1){ echo "selected"; }?> ><? echo SI?></option>
                  </select>                </td>
              </tr>				
              <tr bgcolor="#f5f5f5">

                <td height="10"></td>

                <td align="left" bgcolor="#f5f5f5"></td>

              </tr>

              <tr bgcolor="#f5f5f5">

                <td height="26" align="right" class="texto_campos">Destacar en Categoría:</td>

                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<select name="usuario" class="select">

                    <option value="0" <? if($socio->get_txt_usuario()==0){ echo "selected"; }?> ><? echo NO?></option>

                    <option value="1" <? if($socio->get_txt_usuario()==1){ echo "selected"; }?> ><? echo SI?></option>

                  </select>                </td>

              </tr>  

              <tr bgcolor="#f5f5f5">

                <td height="10"></td>

                <td align="left" bgcolor="#f5f5f5"></td>

              </tr>

              <tr bgcolor="#f5f5f5">

                <td height="26" align="right" class="texto_campos">Mostrar en Home:</td>

                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<select name="clave" class="select">

                    <option value="0" <? if($socio->get_txt_password()==0){ echo "selected"; }?> ><? echo NO?></option>

                    <option value="1" <? if($socio->get_txt_password()==1){ echo "selected"; }?> ><? echo SI?></option>

                  </select>                </td>

              </tr>

              <tr bgcolor="#f5f5f5">

                <td height="10"></td>

                <td align="left" bgcolor="#f5f5f5"></td>

              </tr>

              <tr bgcolor="#f5f5f5">

                <td height="26" align="right" class="texto_campos">Publicado</td>

                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<select name="int_stado" class="select">

                    <option value="0" <? if($socio->get_int_stado()==0){ echo "selected"; }?> ><? echo NO?></option>

                    <option value="1" <? if($socio->get_int_stado()==1){ echo "selected"; }?> ><? echo SI?></option>

                  </select>                </td>

              </tr>

              <tr bgcolor="#f5f5f5">

                <td height="18"></td>

                <td align="left" bgcolor="#f5f5f5"></td>

              </tr>                           

              <tr bgcolor="#f5f5f5">

                <td>&nbsp;</td>

                <td align="left" bgcolor="#f5f5f5">&nbsp;&nbsp;<? if($id!="") { ?>

                   <a href="javascript:editar(<? echo $idcat.",".$id?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;

                    <? }else{?>

                   <a href="javascript:registrar(<?=$idcat?>);"><img src="iconos/guardar.gif" alt="Guardar cambios" border="0"></a>&nbsp;

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

