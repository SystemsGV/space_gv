<? 
include("includes/inc_header.php");
include("includes/constantes.php");
include("includes/funciones.php");
include("includes/fc_global.php");
include("clases/cls_emp_descripcion.php");

$id= $_REQUEST['idcl'];
$op= $_GET['op'];
$img= $_GET['img'];

$tot=getCountR("tbl_descripcion","where id_cliente='$id'");
$modulos = new cls_emp_descripcion();
$modulos->set_id_descripcion($id);
$modulos->set_id_cliente($_POST['idcl']);
$modulos->set_txt_descripcion($_POST['descripcion']);
$modulos->set_txt_info($_POST['info']);
$modulos->set_int_stado($_POST['id_stado']);
$op=1;
echo "tot : ".$tot;
if($tot==0){
	$modulos->guarda();
	$id=$modulos->get_id_descripcion();
}elseif($tot>0){
	$modulos->actualiza();
}





if(($op==1) || ($op==2) || ($op==3)){	

	header ("location: frm_descripcion.php?id=".$id."&idcl=".$_POST['idcl']."&msg=1"); 

}else{

	header ("location: frm_login.php?error=1"); 

}

?>