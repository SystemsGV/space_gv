<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("includes/fc_global.php");
include("clases/cls_emp_noticia_tc.php");



$id= $_GET['id'];
$op= $_GET['op'];
$img= $_GET['img'];
$tot=$_REQUEST['tot'];


$noticia_tc = new cls_emp_noticia_tc();
$noticia_tc->set_txt_titulo($_POST['txt_titulo']);
$noticia_tc->set_txt_fecha($_POST['txt_fecha']);
$noticia_tc->set_txt_resumen($_POST['txt_resumen']);
$noticia_tc->set_txt_descripcion($_POST['txt_descripcion']);
$noticia_tc->set_txt_foto($_POST['txt_imagen']);
$noticia_tc->set_int_estado($_POST['int_estado']);

// Subir fotos

////////////////////////////////////////////// Foto Chica //////////////////////////////////////////////

	$hid_foto=$_POST['hid_txt_imagen'];
		if($_POST['chk_quitar']==1)
		{
			$hid_foto="";
		}
		
		if ($_FILES['txt_imagen']['name']==NULL)
		{	$noticia_tc->set_txt_foto($hid_foto);	}
		else
		{
			$archivo = inc_cargar_datos("txt_imagen",UPLOAD_NOTICIA_TC,"proc_noticia_tc.php",$extensiones_imagenes);	// cargar los datos de la primera tabla							
			$noticia_tc->set_txt_foto($archivo);		
		}	

// fin 

switch($op)

{

	case 1:	//guardar
			$noticia_tc->guarda();	
			$id=$noticia_tc->get_id_noticia_tc();
	break;



	case 2://Actualizar			
				$noticia_tc->set_id_noticia_tc($id);
				$noticia_tc->actualiza();
	break;



	case 3://Eliminar	
		unlink($img);
		$noticia_tc = new cls_emp_noticia_tc($id);
		$noticia_tc->elimina();							
	break;


}

//fin del switch



if(($op==1) || ($op==2) || ($op==3))
{	
	if ($xvalidacion=="0") {
		$_SESSION['validacion']=1;
		header ("location: frm_noticia_tc.php"); 
	}else{
		header ("location: inf_noticia_tc.php"); 
		$_SESSION['validacion']="";
	}

}else{

	header ("location: frm_login.php?error=1"); 

}

?>