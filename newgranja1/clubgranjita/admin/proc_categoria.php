<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_categoria.php");



$id= $_GET['id'];
$op= $_GET['op'];

$modulos = new cls_emp_categoria();
$modulos->set_id_categoria($id);
$modulos->set_txt_nombre($_POST['txt_titulo']);
$modulos->set_txt_cursofacultad($_POST['txt_cursofacultad']);
$modulos->set_int_estado($_POST['id_estado']);






// Dubir fotos

////////////////////////////////////////////// Foto Chica //////////////////////////////////////////////
/*
	$hid_foto=$_POST['hid_txt_imagen'];
		if($_POST['chk_quitar']==1)
		{
			$hid_foto="";
		}
		
		if ($_FILES['txt_imagen']['name']==NULL)
		{	$modulos->set_txt_foto($hid_foto);	}
		else
		{
			$archivo = inc_cargar_datos("txt_imagen",UPLOAD_GANADOR,"proc_modulos.php",$extensiones_imagenes);	// cargar los datos de la primera tabla							
			$modulos->set_txt_foto($archivo);	
		}	
*/		
////////////////////////////////////////////// Foto Grande //////////////////////////////////////////////
/*
	$hid_foto2=$_POST['hid_txt_imagen2'];
		if($_POST['chk_quitar2']==1)
		{
			$hid_foto2="";
		}
		
		if ($_FILES['txt_imagen2']['name']==NULL)
		{	$modulos->set_foto2($hid_foto2);	}
		else
		{
			$archivo = inc_cargar_datos("txt_imagen2",UPLOAD_GANADOR,"proc_modulos.php",$extensiones_imagenes);	// cargar los datos de la primera tabla							
			$modulos->set_foto2($archivo);	
		}	
*/		

// fin 




switch($op)

{

	case 1:	//guardar
			$modulos->guarda();
			$id=$modulos->get_id_categoria();
	break;



	case 2://Actualizar	
//			$modulos->set_id_noticas($id);	
			$modulos->actualiza();
	break;



	case 3://Eliminar	
	
			$modulos = new cls_emp_categoria($id);
			$modulos->elimina();							

	break;


}

//fin del switch



if(($op==1) || ($op==2) || ($op==3))

{	

	header ("location: inf_categoria.php"); 

}else{

	header ("location: frm_login.php?error=1"); 

}

?>