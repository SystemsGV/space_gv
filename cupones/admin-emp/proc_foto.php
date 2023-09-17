<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_foto.php");
include("clases/cls_emp_administrador.php");
include_once("clases/imageresize.class.php");
$idcat= $_GET['idcat'];
$id= $_GET['id'];
$idcl= $_GET['idcl'];
$id0= $_GET['id0'];
$op= $_GET['op'];
$img= $_GET['img'];

$objcat = new cls_administrador($_SESSION['session_administrator']);

$foto = new cls_emp_foto();
$foto->set_id_foto0($_GET['id0']);
$foto->set_id_cliente($_GET['idcl']);
$foto->set_id_categoria(1);
$foto->set_txt_titulo($_POST['txt_titulo']);
$foto->set_txt_titulo2($_POST['txt_titulo2']);
$foto->set_txt_titulo3($_POST['txt_titulo3']);
$foto->set_txt_foto($_POST['txt_imagen']);
$foto->set_int_stado($_POST['int_stado']);
$foto->set_int_stado0($_POST['int_stado0']);
$foto->set_int_retoque(strtoupper($objcat->getNombres()));


echo strtoupper($objcat->getNombres());
////////////////////////////////////////////// Foto Chica //////////////////////////////////////////////

	$hid_foto=$_POST['hid_txt_imagen'];
		if($_POST['chk_quitar']==1)
		{
			$hid_foto="";
		}
		
		if ($_FILES['txt_imagen']['name']==NULL)
		{	$foto->set_txt_foto($hid_foto);	}
		else
		{
			$archivo = inc_cargar_datos("txt_imagen",UPLOAD_FOTOS,"proc_foto.php",$extensiones_imagenes);						
			$oResize = new ImageResize(UPLOAD_FOTOS.$archivo);
			$oResize->resizeWidthHeight("78", "57");
			$trozos = explode(".", $archivo);
			$nombre=$trozos[0]."_t.".$trozos[1];
			$oResize->save(UPLOAD_FOTOS.$nombre);
			$foto->set_txt_foto($archivo);		
		}	

// fin 

switch($op)

{

	case 1:	//guardar		
		$foto->guarda();	
		$id=$foto->get_id_foto();
	break;



	case 2://Actualizar
		$foto->set_id_foto($id);
		$foto->actualiza();
	break;



	case 3://Eliminar	
		unlink($img);
		$foto = new cls_emp_foto($id);
		$foto->elimina();							
	break;


}

//fin del switch


if(($op==1) || ($op==2) || ($op==3))
{	

		header ("location: inf_fotos.php?idcat=1&idcl=".$_REQUEST['idcl']."&id0=".$_REQUEST['id0']); 

}else{

	header ("location: frm_login.php?error=1"); 

}
?>