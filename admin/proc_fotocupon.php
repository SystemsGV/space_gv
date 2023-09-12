<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_fotocupon.php");
include_once("clases/imageresize.class.php");
$id= $_GET['id'];
$op= $_GET['op'];
$img= $_GET['img'];
$imgbig= $_GET['imgbig'];


$fotocupon = new cls_emp_fotocupon();
$fotocupon->set_id_opc($_POST['id_opc']);
$fotocupon->set_txt_titulo($_POST['txt_titulo']);
$fotocupon->set_txt_foto($_POST['txt_imagen']);
$fotocupon->set_int_stado($_POST['int_stado']);

////////////////////////////////////////////// Foto Chica //////////////////////////////////////////////

	$hid_foto=$_POST['hid_txt_imagen'];
		if($_POST['chk_quitar']==1)
		{
			$hid_foto="";
		}
		
		if ($_FILES['txt_imagen']['name']==NULL)
		{	$fotocupon->set_txt_foto($hid_foto);	}
		else
		{
			$archivo = inc_cargar_datos("txt_imagen",UPLOAD_FOTOS,"proc_fotocupon.php",$extensiones_imagenes);						
			$oResize = new ImageResize(UPLOAD_FOTOS.$archivo);
			$oResize->resizeWidthHeight("185", "85");
			$trozos = explode(".", $archivo);
			$nombre=$trozos[0]."_t.".$trozos[1];
			$oResize->save(UPLOAD_FOTOS.$nombre);
			$fotocupon->set_txt_foto($archivo);		
		}	

// fin 

switch($op)

{

	case 1:	//guardar
		//$varName=explode(".",$_FILES['txt_imagen']['name']);
		//$fotocupon->set_txt_titulo($varName[0]);
		$fotocupon->guarda();	
		$id=$fotocupon->get_id_fotocupon();
	break;



	case 2://Actualizar
		$fotocupon->set_txt_titulo($_POST['txt_titulo']);
		$fotocupon->set_id_fotocupon($id);
		$fotocupon->actualiza();
	break;



	case 3://Eliminar	
		unlink($img);
		unlink($imgbig);
		$fotocupon = new cls_emp_fotocupon($id);
		$fotocupon->elimina();							
	break;


}

//fin del switch


if(($op==1) || ($op==2) || ($op==3))
{	

	if ($xvalidacion=="0") {
		$_SESSION['validacion']=1;
		header ("location: frm_cupones.php"); 
	}else{
		header ("location: inf_cupones.php"); 
		$_SESSION['validacion']="";
	}

}else{

	header ("location: frm_login.php?error=1"); 

}
?>