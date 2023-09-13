<? 
include("../../inc.var.php");
if($_FILES["uploads"]["name"]){
	$uploads_dir = '../../uploads';
	$name= $_FILES["uploads"]["name"];
	$newname = str_replace(" ","",str_replace('.',"",microtime())).".".end(explode(".",$name));
	$type= $_FILES["uploads"]["type"];
	$size= $_FILES["uploads"]["size"];
	$temp= $_FILES["uploads"]["tmp_name"];
	$error= $_FILES["uploads"]["error"];

	if ($error > 0){
	    die("Error uploading file! code $error.");
	}else{    
	    move_uploaded_file($temp, "{$uploads_dir}/{$newname}");    
	}
}
switch ($_POST[act]) {
	case 'new':
		$post = new producto();
		$post->charproductoseccion=$_POST[seccion];
		$post->varproductotitulo =htmlspecialchars(addslashes($_POST[titulo]), ENT_QUOTES);		
		($newname?$post->varproductofile=$newname:$none);		
		$post->txtproductodescrip = htmlspecialchars(addslashes($_POST[descripcion]), ENT_QUOTES);
		$post->dateproductofreg = date("Y-m-d H:i:s");
		$post->save();
		break;
	case 'upt':		
		$post = producto::find($_POST[idf]);
		$post->charproductoseccion=$_POST[seccion];
		$post->varproductotitulo =htmlspecialchars(addslashes($_POST[titulo]), ENT_QUOTES);		
		($newname?$post->varproductofile=$newname:$none);		
		$post->txtproductodescrip = htmlspecialchars(addslashes($_POST[descripcion]), ENT_QUOTES);
		//$post->dateproductofreg = date("Y-m-d H:i:s");
		$post->save();
		break;
}
if($_GET[act]=="del"){
	$post = producto::find($_GET[idf]);	
	$post->delete();
}
header("Location:../../index.php?mod={$_REQUEST[mod]}&page=index")
?>






