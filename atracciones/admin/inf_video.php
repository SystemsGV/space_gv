<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");
	include("includes/constantes.php");
	include("includes/funciones.php");
	include("clases/cls_emp_video.php");
	include("clases/cls_emp_cliente.php");
	include("clases/cls_paginador_.php");
	include("clases/class.video.php");
	
	$idcat=$_GET['idcat'];
	$cliente= new cls_emp_cliente($_GET['idcl']);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$TITULO_ADMIN?></title>
<link rel="stylesheet"  href="styles/estilos.css"type="text/css">
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script>

function eliminar(id,idcl,idcat)

{
	var entrar = confirm("Esta seguro de eliminar este elemento?")

	if (entrar)
	{   
		location.href="proc_video.php?op=3&idcl="+idcl+"&id="+id+"&idcat="+idcat;
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
		<td width="881" height="4">
        	<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			<td colspan="4" height="5"></td>
			</tr>
			<tr>
            <td width="32"><img src="iconos/ic_inf.png" alt="" border="0" /></td>
			<td height="30" class="titu_secc">&nbsp;VIDEO - <?=strtoupper($cliente->get_txt_nombre())?></td>
			<td height="30" align="right" valign="bottom"></td>
			<td height="30" align="right" valign="bottom"><a href="inf_clientes.php?idcat=<?=$idcat?>"><img src="iconos/volver.gif" alt="Volver" border="0"></a></td>
			</tr>
			<tr>
			<td colspan="4" height="10"></td>
			</tr>
			</table>
            
          	<table width="881" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
            <td width="46" height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center">NRO</td>
            <td width="272" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="left">TITULO DEL VIDEO</div></td>
			<td width="354" align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="left">URL DEL VIDEO</div></td>
            <td width="111" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">CAPTURA</div></td>
            <td width="98" align="center" valign="middle" bgcolor="#949494" class="titus_tablas">OPCIONES</td>
            </tr>
			<tr>
			<td colspan="5" height="2"></td>
			</tr>
            <?
	$sql="select * from tbl_video where id_cliente=".$_GET['idcl'];
	$resultado=conn_array ($sql);
	$paginador = new cls_tbl_paginar($resultado,14,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
    $contador=$paginador->pos_inicial_pag;
    while($contador < $paginador->pos_final_pag)
	{
		$registro=$paginador->resultado_pag[$contador-1];
			if(!empty($registro[0]))
			{
				$sorteo= new cls_emp_video($registro[0]);
				if($color=="#e8e8e8"){$color="#F6F5F5";}else{$color="#e8e8e8";}				
				$link[]="No Publicado";
				$link[]="Publicado";
				$imgyoutube = new YouTube();
				$imgRand=rand(1,2);
				$ulrPuro=explode("&",$sorteo->get_txt_url());
				$idYoutube=explode("=",$ulrPuro[0]);
  ?>
            <tr class="bg_fila" valign="middle" bgcolor="<?=$color?>">
            <td height="90" class="texto_02" align="center"><?=$contador?></td>
            <td align="left" class="texto_02"><div align="left"><?=$sorteo->get_txt_titulo()?></div></td>
			<td align="left" class="texto_02"><div align="left" style="padding-left:5px; padding-right:5px;"><?=$sorteo->get_txt_url()?></div></td>
            <td class="texto_02" align="center"><div style="border:#333333 1px solid; width:80px; height:60px;"><?=$imgyoutube->ShowImg($idYoutube[1],2,$sorteo->get_txt_titulo(),80,60)?></div></td>
            <td align="center"><a href="frm_video.php?id=<?=$sorteo->get_id_video()?>&idcl=<?=$_GET['idcl']?>&idcat=<?=$idcat?>"><img src="iconos/ic_edit.png" border="0" title="Editar registro" /></a>&nbsp;&nbsp;<a href="javascript:eliminar('<?=$sorteo->get_id_video()?>','<?=$_GET['idcl']?>','<?=$idcat?>')"><img src="iconos/ic_delete.png" border="0" title="Eliminar registro" /></a></td>
            </tr>
            <tr>
            <td colspan="5" height="1" bgcolor="#CCCCCC"></td>
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
            <td width="264" align="left"><a href="frm_video.php?idcat=<?=$idcat?>&idcl=<?=$_GET['idcl']?>"><img src="iconos/ico_nuevo.gif" border="0" alt="Agregar nuevo"></a></td>
            <td width="617" align="right"><?

		$param[0]="tipo=".$tipo;
		$param[1]="";

		$paginador->inc_muestra_paginacion($estilos,$param,400);

		?>  </td>
            </tr>
            </table>
        </td>
        </tr>
        </table>
    </td>
    </tr>
    <tr>
    <td height="30"></td>
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