<?php
include("inc.var.php");
$arr = array();
if($_POST["dnival"]){
	if(!isset($_SESSION["sess_user"])){
		if(strlen($_POST["dnival"])>=8){
			$post = Cliente::find_by_sql("select charClienteDni from CLIENTE where charClienteDni='{$_POST["dnival"]}'");		
			if($post[0]->charclientedni){
				$valid=false;
				$available=false;
				$msg="El DNI no se encuentra disponible";
			}else{
				$valid=true;
				$available=true;
				$msg="El DNI es valido";
			}

		}else{
			$valid=false;
			$available=false;
			$msg="El DNI no es valido";
		}
	}else{
		$valid=true;
		$available=true;
		$msg="El DNI es valido";
	}

}elseif($_POST["emailval"]){
	if(!isset($_SESSION["sess_user"])){
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
		if (preg_match($regex, $_POST["emailval"])) {
		 	$post = Cliente::find_by_sql("select sClieMail from CLIENTE where sClieMail='{$_POST["emailval"]}'");		
			if($post[0]->scliemail){
				$valid=false;
				$available=false;
				$msg="El Email no se encuentra disponible";
			}else{
				$valid=true;
				$available=true;
				$msg="El Email es valido";
			}
		} else { 
		 	$valid=false;
			$available=false;
			$msg="El Email no es valido";
		}
	}else{
		$valid=true;
		$available=true;
		$msg="El Email es valido";
	}
		
}
	$arr=array("valid"=>$valid,"message"=>$msg,"available"=>$available);
	echo json_encode($arr);


?>