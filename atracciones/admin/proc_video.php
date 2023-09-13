<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_video.php");
$idcat= $_GET['idcat'];
$id= $_GET['id'];
$op= $_GET['op'];

$modulos = new cls_emp_video();
$modulos->set_id_video($id);
$modulos->set_id_cliente($_POST['idcl']);
$modulos->set_txt_titulo($_POST['txt_titulo']);
$modulos->set_txt_url($_POST['txt_link']);
$modulos->set_txt_descripcion($_POST['txt_content']);
$modulos->set_int_stado($_POST['id_stado']);
	
switch($op)

{

	case 1:	//guardar
			$modulos->guarda();
			$id=$modulos->get_id_video();
	break;

	case 2://Actualizar	
//			$modulos->set_id_noticas($id);	
			$modulos->actualiza();
	break;

	case 3://Eliminar	
		//	unlink(UPLOAD_video.$img);
			$modulos = new cls_emp_video($id);
			$modulos->elimina();							

	break;


}

//fin del switch



if(($op==1) || ($op==2) || ($op==3))

{	

	header ("location: inf_video.php?idcat=".$_REQUEST['idcat']."&idcl=".$_REQUEST['idcl']); 

}else{

	header ("location: frm_login.php?error=1"); 

}

?>