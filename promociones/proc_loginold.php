<?
include("inc.var.php");
if($_GET['op']=="cerrar"){
	session_unregister("session_socio");
	header("location:index.php");	
}else{
	$usu = new cls_emp_usuarios();
	$usu->set_txt_usuario($_POST["usuario"]);
	$usu->set_txt_password($_POST["clave"]);
	$id=$usu->valida_socio();
	if($id!=0){
		$_SESSION['session_socio']=$id;
		$_SESSION['id_opc']=getVal("tbl_usuarios","id_opc","where id_usuarios='$_SESSION[session_socio]'");
		
		//$gusu = new cls_emp_usuarios($id);
		header("location:cupones.php");
	}else{
		header("location:".$_SERVER['HTTP_REFERER']);
	}
}
?>