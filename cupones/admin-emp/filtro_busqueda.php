<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="lagranja_cupon";
$contraseña="F&t7h-4+C;WC";
$base="lagranja_cupon";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where="";
$nombre=$_POST['txt_nombre'];

////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{

	

	if (empty($_POST['txt_nombre']))
	{
		$where="where nombre like '".$int_stado."%'";
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$empresas="SELECT txt_nombre, txt_nombre2, txt_nombre4, txt_email, int_stado FROM tbl_cliente $where $limit";
$resEmpresas=$conexion->query($empresas);

if(mysqli_num_rows($resEmpresas)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

	<head>
		<title>Filtro de Búsqueda PHP</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	</head>
	<body>
		<header>
        
        	

			<div class="alert alert-info">
            <?include("cabecera.php")?>
			<h2>MODULO CUPONES</h2>
			</div>
		</header>
		<section>
			<form method="post">
				<input type="text" placeholder="Nombre..." name="xnombre"/>
							
				<button name="buscar" type="submit">Buscar</button>
			</form>
			<table class="table">
				<tr>
					<td width="104" height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center">NRO</td>
					  <td width="304" align="left" valign="middle" bgcolor="#949494" class="titus_tablas">EMPRESA / CLIENTE</td>	                
                      <td width="190" align="center" valign="middle" bgcolor="#949494" class="titus_tablas">NUM. CUPONES</td>
                      <td width="226" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">FECHA VENCIMIENTO</div></td>
                      <td width="235" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">VER CUPONES</div></td>
                      <td width="166" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">CUPON</div></td>
                      <td width="217" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">ESTADO CLIENTE</div></td>
					  <td width="201" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">OPCIONES</div></td>
				</tr>
                <?
										
						if($_POST['txt_criterio11']!=""){$campo1="and txt_password like '%$txt_criterio11%'";}else{$campo1="";}	
						if($_POST['txt_criterio12']!=""){$campo2="and int_stado like '%$txt_criterio12%'";}else{$campo2="";}	
						if($_POST['txt_criterio13']!=""){$campo3="and txt_telefono='{$_SESSION[session_administrator]}'";}else{$campo0="";}
							
						//echo "<strong>CRIT: </strong>".$txt_criterio10;	
						$sql="select id_cliente from tbl_cliente where id_categoria='{$_GET[idcat]}' $campo1 $campo2 $campo3 order by id_cliente desc";
						
						$resultado=conn_array ($sql);
						$paginador = new cls_tbl_paginar($resultado,FILASXPAGINA,$_GET['pagina_pag'],$_GET['bloque_actual_pag']);
						$contador=$paginador->pos_inicial_pag;
						while($contador < $paginador->pos_final_pag){
								$registro=$paginador->resultado_pag[$contador-1];
								if(!empty($registro[0])){
									$cliente= new cls_emp_cliente($registro[0]);
									if($color=="#e8e8e8"){$color="#F6F5F5";}else{$color="#e8e8e8";}
									$enoteca_modulos = new cls_administrador($cliente->get_txt_telefono());
									
									
									$client00 = $cliente->get_id_cliente();
									$sql000 = 'SELECT * FROM tbl_hotel WHERE id_cliente='.$client00.' and int_stado=0'; 
									$result00 = conn_array($sql000);
									
									
									
									

					  ?>

<tr valign="middle" bgcolor="<?=$color?>" class="bg_fila">
					  <td height="100" class="texto_02" align="center"><? echo $contador?></td>                      
					  <td align="left" class="texto_02"><b><?=strtoupper($cliente->get_txt_nombre())?></b></td>
                      <td align="left" class="texto_02" style="color:#d4750e"><div align="center"><b><?=$cliente->get_txt_nombre2()?></b></div></td>
                      <td align="left" class="texto_02" style="color:#d4750e"><div align="center"><b><?=$cliente->get_txt_nombre4()?></b></div></td>   
                       <td align="left" class="texto_02"><div align="center"><a href="inf_fotos2.php?idcat=1&idcl=<?=$cliente->get_id_cliente()?>"><img src="iconos/verfile.png" height="48" border="0" alt="Editar Archivos" /></a></div></td>                   
                     	  <?
							$foto=$cliente->get_txt_email();
							if (empty($foto))
							{
							$foto=UPLOAD_FOTOS."img_galeria_sf.jpg";
							}else
							{
							$trozos = explode(".", $cliente->get_txt_email());
							$nombre=$trozos[0]."_t.".$trozos[1];
							$foto=UPLOAD_FOTOS.$nombre;
							}
						  ?>                      
					  <td align="left" class="texto_02"><div align="center"><img src="<?=$foto;?>" height="80" style="border:#fff 3px solid;" border="0" alt="" /></div></td>
                     
                      	
					  
					  <?
                      if($cliente->get_int_stado()==0){
					  $imgpublicado="<img src='iconos/si.png' alt='' border=''>";
					  }else{
					  $imgpublicado="<img src='iconos/no.png' alt='' border=''>";
					  }
					  ?>
                      <td align="left" class="texto_02"><div align="center"><?=$imgpublicado?></div></td>
					  <td align="center"><div align="center"><a href="frm_clientes.php?idcat=<?=$idcat?>&id=<?=$cliente->get_id_cliente()?>"><img src="iconos/ic_edit.png" border="0" alt="Editar registro" title="Editar registro" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<? if($objcat0->getTipo()==0){?><a href="javascript:eliminar(<?=$cliente->get_id_cliente()?>,<?=$idcat?>)"><img src="iconos/ic_delete.png" border="0" alt="Eliminar registro" title="Eliminar registro" /></a><?}?> </div></td>
					</tr>
                    <tr>
                    <td colspan="8" height="1" bgcolor="#CCCCCC"></td>
                    </tr>
					<?
			
						}
						$contador++;
						}
			
					?>
                    
                    
                    
                    
                    
                    
                    <tr>
					  <td height="32" valign="middle" bgcolor="#949494" class="titus_tablas" align="center"></td>
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"></td>	                      
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>                      
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
                      <td align="left" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					  <td align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center"></div></td>
					</tr>
				  </table>
                  
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="205" align="left" height="8"></td>
						<td width="465" align="right"></td>
					  </tr>
					  <tr>
						<td width="205" align="left"><a href="frm_clientes.php?idcat=<?=$idcat?>" class="myButton2">AGREGAR REGISTRO</a></td>
						<td width="465" align="right"><?
							$param[0]="";$css[1]="txt_gris10";$css[2]="txt_gris10";
							$param[1]="";
							$paginador->inc_muestra_paginacion($css,$param,400);
							?>
						</td>
					  </tr>
				  </table>
				  
				  </td>
			  </tr>			
			</table>
	</div>
	</td>
	</tr>
	<tr>
	<td height="30"></td>
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

				<?php

				while ($registroEmpresas = $resEmpresas->fetch_array(MYSQLI_BOTH))
				{

					echo'<tr>
						 <td>'.$registroEmpresas['id_cliente'].'</td>
						 <td>'.$registroEmpresas['txt_nombre'].'</td>
						 <td>'.$registroEmpresas['txt_nombre2'].'</td>
						 <td>'.$registroEmpresas['txt_nombre4'].'</td>
 						 <td>'.$registroEmpresas['txt_txt_nombre5'].'</td>
 						 <td>'.$registroEmpresas['txt_email'].'</td>
						 </tr>';
				}
				?>
			</table>

			<?
				echo $mensaje;
			?>
		</section>
	</body>
</html>


