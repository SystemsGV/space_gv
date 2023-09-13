<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_productos.php");
	include("clases/cls_paginador_.php");

	
	if ($_POST["fk_categoria"]<>""){
		$fk_categoria = $_POST["fk_categoria"];
	}elseif ($_GET["fk_categoria"]<>""){
		$fk_categoria = $_GET["fk_categoria"];	
	}
	
	if ($_POST["txt_titulo"]<>""){
		$txt_criterio = $_POST["txt_titulo"];
	}elseif ($_GET["txt_titulo"]<>""){
		$txt_criterio = $_GET["txt_titulo"];	
	}	
	$cp=$_REQUEST['cp']
	
	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrador de Contenidos LAGRANJAVILLA</title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script>

function eliminar(id, file)

{
	var entrar = confirm("Esta seguro de eliminar este elemento?")

	if (entrar)
	{   
		location.href="proc_productos.php?op=3&id=" + id + "&file=" + file;
	}

}

</script>
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
					<td height="30" bgcolor="#F1EEE7" class="titus">&nbsp;&nbsp;DOCUMENTOS - <?php if($cp=="1"){?>CURSO DE FACULTAD<?php }else{?>BANCO DE INFORMACI&oacute;N</span><?php }?></td>
					<td height="30" bgcolor="#F1EEE7" align="right" valign="bottom"></td>
				  </tr>
				  <tr>
					<td height="10"></td>
				  </tr>
				</table>
				
				
                  <table width="600" border="0" cellspacing="0">
                    <form name="form1" method="post" action="inf_productos.php">
                      <tr>
                        <td colspan="6" height="8"></td>
                      </tr>
                      <tr>
                        <td width="100" class="menu1"></td>
                        <td width="100" class="texto_01">Titulo</td>
                        <td width="100" class="texto_01">
                          <input name="txt_titulo" type="text" class="input" id="txt_titulo" size="20" maxlength="20" value="<?=$txt_titulo?>">
                        </td>
                        <td width="100" align="center" class="texto_01">Categoria</td>
                        <td width="100" class="texto_01">
                            <select name="fk_categoria" class="textarea" id="fk_categoria">
                              <option  value="0">Todos</option>
								<?
								$sql="select * from  tbl_categoria where int_estado=1 and txt_cursofacultad='$cp' order by txt_nombre asc";
								$resultado=conn_array ($sql);
								$num_elementos=count($resultado);
								if ($num_elementos > 0)
								{
									$contador=0;
										while($contador < $num_elementos)
									{
																			
									?>
                              <option value="<?=$resultado[$contador][0]?>"<? if ($resultado[$contador][0]==$fk_categoria){?> selected <? } ?> ><?=$resultado[$contador][1]?></option>
								<?
								$contador++;
								}
							}
							?>
                            </select>
                        </td>
                        <td width="100" class="texto_01"><input name="Submit" type="image" src="iconos/buscar.gif" class="texto_01" id="button" value="Buscar" onClick="buscar();"><input type="hidden" name="cp" value="<?=$cp?>"></td>
                      </tr>
                      <tr>
                        <td colspan="6" height="8"></td>
                      </tr>
                    </form>
                  </table>
					
                  <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="67" height="25" valign="middle" bgcolor="#DEDAC8" class="titus_tablas" align="center">Nro&nbsp;</td>
              <td width="261" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Titulo</td>
              <td width="174" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Autor</td>
			  <td width="276" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Tema</td>
              <!--<td width="145" height="25" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Foto</td>-->
              <td width="103" align="left" valign="middle" bgcolor="#DEDAC8" class="titus_tablas">Opciones</td>
            </tr>
			<tr>
			  <td colspan="6" height="2"></td>
			</tr>
            <?
		if 	($fk_categoria<>0){
			$sql="select * from tbl_producto as p, tbl_categoria as c where  p.id_categoria=c.id_categoria and p.id_categoria='$fk_categoria' and c.txt_cursofacultad='$cp' and txt_titulo like '$txt_titulo%'";
		}else{		
			$sql="select * from tbl_producto as p, tbl_categoria as c where  p.id_categoria=c.id_categoria and c.txt_cursofacultad='$cp' and p.txt_titulo like '$txt_titulo%'";
		}	
//echo $fk_categoria;
	$resultado=conn_array ($sql);



	$paginador = new cls_tbl_paginar($resultado,6,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);

    $contador=$paginador->pos_inicial_pag;

//	echo "paginador->pos_final_pag : ".$paginador->pos_final_pag;

    while($contador < $paginador->pos_final_pag)

	{



			$registro=$paginador->resultado_pag[$contador-1];



			if(!empty($registro[0]))

			{

				$modulos= new cls_emp_productos($registro[0]);



				if($color=="#F2F0EB")

				{

				  $color="#F6F5F5";}

				else{

				  $color="#F2F0EB";

				}



  ?>
            <tr valign="middle" bgcolor="<? echo $color?>">
              <td height="26" bgcolor="<? echo $color?>" class="texto_02">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $contador?></td>
              <td align="left" bgcolor="<? echo $color?>" class="texto_02"><?=$modulos->get_txt_titulo()?></td>
              <td align="left" bgcolor="<? echo $color?>" class="texto_02"><?=$modulos->get_txt_autor()?></td>
			  <td align="left" bgcolor="<? echo $color?>" class="texto_02"><?=$modulos->get_txt_tema()?></td>
              <!--<td align="left" bgcolor="<? echo $color?>" class="texto_02"><img src="<?=$foto?>" width="100" height="80" border="0" style="border:#E19913 1px solid" /></td>-->
			  <?$file=UPLOAD_PRODUCTO.$modulos->get_txt_file(); ?>
              <td><a href="frm_productos.php?id_producto=<? echo $modulos->get_id_producto()?>&cp=<?=$cp?>"><img src="iconos/icon18_editdoc.gif" border="0" title="Editar registro" /></a>&nbsp;&nbsp; <a href="javascript:eliminar('<? echo $modulos->get_id_producto()?>','<? echo $file?>')"><img src="iconos/delete.gif" border="0" title="Eliminar registro" /></a></td>
            </tr>
            <?

  		}

  	$contador++;

   }?>
          </table>
          <table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="264" align="left" height="8"></td>
                <td width="617" align="right"></td>
              </tr>
              <tr>
                <?
     switch($tipo)
	 {
		 case 1: $titulo="Nueva Noticia &oacute; Novedad"; break;
		 case 2: $titulo="Nuevo Evento"; break;
		 case 3: $titulo="Nueva Nota de Cata"; break;
	 }
?>
                <td width="264" align="left"><a href="frm_productos.php?cp=<?=$cp?>"><img src="iconos/ico_nuevo.gif" border="0" alt="Agregar nuevo"></a></td>
                <td width="617" align="right"><?

		$param[0]="fk_categoria=".$fk_categoria;
		$param[1]="txt_criterio=".$txt_criterio;
		$param[2]="cp=".$cp;

		$paginador->inc_muestra_paginacion($estilos,$param,400);

		?>                </td>
              </tr>
            </table></td>
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
