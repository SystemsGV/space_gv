<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");	
//	include("clases/cls_emp_productos.php");
//	include("fckeditor/fckeditor.php") ;

	$id_producto=$_POST['id_cate'];	

?>

				<select name="txt_detalle" id="txt_detalle" class="select" style="width:163px">
				<option value="0" selected>Seleccione...</option>
				<?
				
				$sql="select * from tbl_categoria_det where id_categoria=$id_producto and int_estado=1 order by txt_nombre asc";
				$resultado=conn_array ($sql);
				$num_elementos=count($resultado);
				if ($num_elementos > 0)
				{
					$contador=0;
						while($contador < $num_elementos)
					{
															
					?>
					<option value="<?=$resultado[$contador][0]?>"><?=$resultado[$contador][2]?></option>
					<?
					$contador++;
					}
				}
				?>
				</select>
