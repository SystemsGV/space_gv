<?
include("inc.var.php");
if($_GET[out]=="true"){
	unset($_SESSION["sess_admin"]);
	header("Location:index.php");
}else{	
	$post = Administrador::first();
	if($post->varadministradorusuario==$_POST[usuario] && $post->varadministradorpsw==$_POST[password]){
		$_SESSION["sess_admin"][titulo]=$post->varadministradortitulo;
		$_SESSION["sess_admin"][id]=$post->intadministradorid;
		header("Location:index.php?mod=boletos&page=index");
	}else{
		header("Location:login.php");
	}	
}


?>