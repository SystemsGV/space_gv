<?php
include("inc.var.php");
//$arr = array();
if($_POST["dni"]){
		if(strlen($_POST["dni"])>=8){
			$sql = "select clientdni from tbl_usuarios where clientdni='".$_POST['dni']."'";
			$post = conn_consulta($sql);		
			if($post){
				$valid=0;
				//$available='0';
				//$msg="El DNI no se encuentra disponible";
			}else{
				$valid=1;
				//$available='1';
				//$msg="El DNI es valido";
			}

		}else{
			$valid=0;
			//$available='0';
			//$msg="El DNI no es valido";
		}

}elseif($_POST["email"]){
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
		if (preg_match($regex, $_POST["email"])) {
			$sql = "select txt_email from tbl_usuarios where txt_email='".$_POST['email']."'";
		 	$post = conn_consulta($sql);	
			if($post){
				$valid=0;
				//$available='0';
				//$msg="El Email no se encuentra disponible";
			}else{
				$valid=1;
				//$available='1';
				//$msg="El Email es valido";
			}
		} else { 
		 	$valid=0;
			//$available='0';
			//$msg="El Email no es valido";
		}
		
}elseif($_POST["user"]){
			$sql = "select txt_usuario from tbl_usuarios where txt_usuario='".$_POST['user']."'";
			$post = conn_consulta($sql);	
			if($post){
				$valid=0;
				//$available='0';
				//$msg="El nombre de Usuario no se encuentra disponible";
			}else{
				$valid=1;
				//$available='1';
				//$msg="El nombre de Usuario es valido";
			}
}
	echo $valid;


?>