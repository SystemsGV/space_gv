<?
include("inc.var.php");
if($_GET[out]=="true"){
	unset($_SESSION["sess_admin"]);
	header("Location:index.php");
}else{
	$post = Administrador::find_by_sql('select intAdministradorId, varAdministradorTitulo, tipo from administrador WHERE varAdministradorUsuario = "'.$_POST['usuario'].'" AND varAdministradorPsw = "'.$_POST['password'].'"');
	
	
	if(count($post)){
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
}


?>