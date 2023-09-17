<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_galeria.php");
include_once("clases/imageresize.class.php");
$id= $_GET['id'];
$op= $_GET['op'];
$img= $_GET['img'];


$noticia_tc = new cls_emp_galeria();
$noticia_tc->set_txt_titulo($_POST['txt_titulo']);
$noticia_tc->set_txt_titulo2($_POST['txt_titulo2']);
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
			$archivo = inc_cargar_datos("txt_imagen",UPLOAD_GALERIA,"proc_galeria.php",$extensiones_imagenes);						
			$oResize = new ImageResize(UPLOAD_GALERIA.$archivo);
			$oResize->resizeWidthHeight("240", "120");
			$trozos = explode(".", $archivo);
			$nombre=$trozos[0]."_t.".$trozos[1];
			$oResize->save(UPLOAD_GALERIA.$nombre);
			$noticia_tc->set_txt_foto($archivo);		
		}	

// fin 

switch($op)

{

	case 1:	//guardar
		$noticia_tc->guarda();	
		$id=$noticia_tc->get_id_galeria();
	break;



	case 2://Actualizar	
		$noticia_tc->set_id_galeria($id);
		$noticia_tc->actualiza();
	break;



	case 3://Eliminar	
		unlink($img);
		$noticia_tc = new cls_emp_galeria($id);
		$noticia_tc->elimina();							
	break;


}

//fin del switch



if(($op==1) || ($op==2) || ($op==3))
{	
	if ($xvalidacion=="0") {
		$_SESSION['validacion']=1;
		header ("location: frm_galeria.php"); 
	}else{
		header ("location: inf_galeria.php"); 
		$_SESSION['validacion']="";
	}

}else{

	header ("location: frm_login.php?error=1"); 

}

?>