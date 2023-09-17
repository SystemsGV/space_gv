<? 
error_reporting(E_ALL);
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("clases/cls_emp_hotel.php");
include("clases/cls_emp_administrador.php");
include_once("clases/imageresize.class.php");
$idcat= $_GET['idcat'];
$id= $_GET['id'];
$op= $_GET['op'];
//$img= $_GET['img'];

$objcat = new cls_administrador($_SESSION['session_administrator']);

$foto = new cls_emp_foto0();
$foto->set_id_cliente($_POST['idcl']);
$foto->set_id_categoria(1);
$foto->set_txt_titulo($_POST['txt_titulo']);
$foto->set_txt_titulo2($_POST['txt_titulo2']);
$foto->set_txt_titulo3($_POST['txt_titulo3']);
$foto->set_txt_titulo4($_POST['txt_titulo4']);
$foto->set_txt_titulo44($_POST['txt_titulo44']);
$foto->set_txt_titulo5($_POST['txt_titulo5']);
$foto->set_txt_titulo6($_POST['txt_titulo6']);
$foto->set_txt_titulo7($_POST['txt_titulo7']);
$foto->set_txt_foto($_POST['txt_titulo2']);
$foto->set_int_stado($_POST['int_stado']);
$foto->set_int_stado0($_POST['int_stado0']);
$foto->set_int_retoque($objcat->getId_administrador());

////////////////////////////////////////////// Foto Chica //////////////////////////////////////////////

	

// fin 

switch($op)

{

	case 1:	//guardar		
		$foto->guarda();	
		$id=$foto->get_id_foto0();
	break;



	case 2://Actualizar
		$foto->set_id_foto0($id);
		$foto->actualiza();
	break;



	case 3://Eliminar	
		//unlink($img);
		$foto = new cls_emp_foto0($id);
		$foto->elimina();							
	break;


}

//fin del switch


if(($op==1) || ($op==2) || ($op==3))
{	

		header ("location: inf_reqpago.php?idcat=".$_REQUEST['idcat']."&idcl=".$_REQUEST['idcl']); 

}else{

	header ("location: frm_login.php?error=1"); 

}
?>