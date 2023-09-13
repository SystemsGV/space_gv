<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_productos.php");
ini_set("memory_limit","200M");


$id= $_GET['id'];
$op= $_GET['op'];
$codigo= $_GET['codigo'];
$file= $_GET['file'];
$cp=$_REQUEST['cp'];
$productos = new cls_emp_productos();
$productos->set_id_producto($id);
$productos->set_id_categoria($_POST['txt_id_categoria']);
$productos->set_id_cate_det($_POST['txt_id_cate_det']);
$productos->set_txt_titulo($_POST['txt_titulo']);
$productos->set_txt_autor($_POST['txt_autor']);
$productos->set_txt_tema($_POST['txt_tema']);
$productos->set_txt_editorial($_POST['txt_editorial']);
$productos->set_txt_edicion($_POST['txt_edicion']);
$productos->set_txt_idioma($_POST['cbo_idioma']);
$productos->set_txt_file($_POST['txt_file']);
$productos->set_txt_tipodoc($_POST['txt_tipodoc']);
$productos->set_txt_descripcion($_POST['txt_descripcion']);
$productos->set_txt_ciclo($_POST['txt_ciclo']);
$productos->set_fecha_public($_POST['txt_fecha']);
$productos->set_int_estado($_POST['id_estado']);
$productos->set_int_public($_POST['id_public']);

// Dubir fotos

////////////////////////////////////////////// Foto Chica //////////////////////////////////////////////

		$hid_foto=$_POST['hid_txt_imagen'];
		if($_POST['chk_quitar']==1)
		{
			$hid_foto="";
		}
		
		if ($_FILES['txt_file']['name']==NULL)
		{	$productos->set_txt_file($hid_foto);	}
		else
		{
			$archivo = inc_cargar_datos("txt_file",UPLOAD_PRODUCTO,"proc_productos.php?cp=$cp",$extensiones_imagenes);	// cargar los datos de la primera tabla							
			$productos->set_txt_file($archivo);		
		}	

// fin 




switch($op)

{

	case 1:	//guardar
//	echo "Dentro de la opcion 1";
//			$codigo_prod = new cls_emp_productos::validar($codigo);
			$productos->guarda();
		/*$sql="select * from  tbl_producto where txt_titulo='".$codigo."'";
		$resultado=conn_array ($sql);
		$num_elementos=count($resultado);

			if ($num_elementos>0){
			echo "no se ingreso el registro porque el titulo ya existe";
			$xvalidacion="0";
			}else{
			echo "No existe";
			$productos->guarda();
			}   */
//			die();
			

	break;



	case 2://Actualizar	
			//echo "Actualizando :";
//			$productos->set_id_noticas($id);	
			$productos->actualiza();
	break;



	case 3://Eliminar	
			unlink($file);
			$productos = new cls_emp_productos($id);
			$productos->elimina();							

	break;


}

//fin del switch



if(($op==1) || ($op==2) || ($op==3))
{	
	if ($xvalidacion=="0") {
		$_SESSION['validacion']=1;
		header ("location: frm_productos.php?cp=$cp"); 
	}else{
		header ("location: inf_productos.php?cp=$cp"); 
		$_SESSION['validacion']="";
	}
	
//	die("<br>q codigo: ".$xvalidacion);
	
//		header ("location: inf_productos.php"); 
}else{

	header ("location: frm_login.php?error=1"); 

}

?>