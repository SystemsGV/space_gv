<?php
include("../../inc.var.php");

switch ($_POST[act]) {
	case 'new':
		$post = new Administrador();		
		$post->tipo = $_POST['tipo'];		
		$post->varadministradortitulo = $_POST['titulo'];
		$post->varadministradorusuario = $_POST['usuario'];
		$post->varadministradorpsw = $_POST['contrasena'];
		$post->save();		
		break;
	case 'upt':		
		$post = Administrador::find($_POST[idf]);
		$post->tipo = $_POST['tipo'];		
		$post->varadministradortitulo = $_POST['titulo'];
		$post->varadministradorusuario = $_POST['usuario'];
		$post->varadministradorpsw = $_POST['contrasena'];
		$post->save();
		break;
}
if($_GET[act]=="del"){
	$post = Administrador::find($_GET[idf]);	
	$post->delete();
}

?>

<script>
location.href="../../index.php?mod=<?php echo $_REQUEST['mod']; ?>&page=index"
</script>