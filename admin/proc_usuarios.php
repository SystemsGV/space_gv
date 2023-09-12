<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("includes/fc_global.php");
include("clases/cls_emp_usuarios.php");



$id= $_GET['id'];
$op= $_GET['op'];
$img= $_GET['img'];
$tot=$_REQUEST['tot'];


$usuarios = new cls_emp_usuarios();
$usuarios->set_txt_nombre($_POST['txt_nombre']);
$usuarios->set_txt_apellido($_POST['txt_apellido']);
$usuarios->set_txt_fecnac($_POST['txt_fecnac']);
$usuarios->set_txt_telefono($_POST['txt_telefono']);
$usuarios->set_txt_direccion($_POST['txt_direccion']);
$usuarios->set_txt_distrito($_POST['txt_distrito']);
$usuarios->set_txt_email($_POST['txt_email']);
$usuarios->set_txt_usuario($_POST['txt_usuario']);
$usuarios->set_txt_password($_POST['txt_password']);
$usuarios->set_id_opc($_POST['id_opc']);

// Subir fotos

switch($op)

{

	case 1:	//guardar
			$usuarios->guarda();	
			$id=$usuarios->get_id_usuarios();
	break;



	case 2://Actualizar			
				$usuarios->set_id_usuarios($id);
				$usuarios->actualiza();
	break;



	case 3://Eliminar	
		unlink($img);
		$usuarios = new cls_emp_usuarios($id);
		$usuarios->elimina();							
	break;


}

//fin del switch



if(($op==1) || ($op==2) || ($op==3))
{	
	if ($xvalidacion=="0") {
		$_SESSION['validacion']=1;
		header ("location: frm_usuarios.php"); 
	}else{
		header ("location: inf_usuarios.php"); 
		$_SESSION['validacion']="";
	}

}else{

	header ("location: frm_login.php?error=1"); 

}

?>