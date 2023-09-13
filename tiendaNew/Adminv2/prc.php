<?
include("inc.var.php");
if($_GET[out]=="true"){
	unset($_SESSION["sess_admin"]);
	header("Location:index.php");
}else{
	
	$Usuario = $_POST['usuario'];
	$Pass = $_POST['password'];
	
	$post = Administrador::find_by_sql('select * from administrador WHERE varAdministradorUsuario = "'.$_POST['usuario'].'"');
	
	
	if(count($post)){
		if($post[0]->varadministradorpsw == $Pass){
		$_SESSION["sess_admin"]['titulo']=$post[0]->varadministradortitulo;
		$_SESSION["sess_admin"]['id']=$post[0]->intadministradorid;
		$_SESSION["sess_admin"]['tipo']=$post[0]->tipo;
		if($post[0]->tipo==1){
			header("Location:index.php?mod=boletos&page=index");
		}else{
			header("Location:index.php?mod=cart&page=index");
		}
	}else{
	header("Location:login.php");
	}
	}else{
		header("Location:login.php");
	}	
}


?>