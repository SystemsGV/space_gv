<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_categoria_det.php");

$id= $_GET['id'];
$op= $_GET['op'];
$id_detalle = $_GET['id_detalle'];

$modulos = new cls_emp_categoria_det();
$modulos->set_id_cate_det($id);
$modulos->set_id_categoria($_POST['hid_id_categoria']);
$modulos->set_txt_nombre($_POST['txt_content']);
$modulos->set_int_estado($_POST['id_estado']);

switch($op)
{
	case 1:	//guardar
			$modulos->guarda();
			$id=$modulos->get_id_cate_det();
	break;

	case 2://Actualizar	
//			$modulos->set_id_noticas($id);	
			$modulos->actualiza();
	break;

	case 3://Eliminar	
			unlink($img);
			$modulos = new cls_emp_categoria_det($id);
			$modulos->elimina();							

	break;


}

//fin del switch


if(($op==1) || ($op==2) || ($op==3))
{	
	header ("location: inf_categoria_det.php?id_detalle=".$id_detalle); 

}else{
	header ("location: frm_login.php?error=1"); 
}

?>