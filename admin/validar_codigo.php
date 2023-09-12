<?
	include("includes/inc_header.php");
	include("includes/inc_login.php");		
	include("includes/constantes.php");
	include("includes/funciones.php");	
//	include("clases/cls_emp_productos.php");
//	include("fckeditor/fckeditor.php") ;

	$codigo=$_POST['codigo'];	
	
	$sql="select * from  tbl_producto where txt_codigo='".$codigo."'";

if ($codigo<>""){
	$resultado=conn_array ($sql);
}

	$num_elementos=count($resultado);
	if ($num_elementos > 0)
	{
//	echo $resultado[0][7]
	echo "El Codigo que ingreso ya existe.";
	?>
	<script>
	document.getElementById("txt_codigo")[0].value='';
	</script>
	<?
	}else{
	//echo "El Código no existe.";
	}
	?>


