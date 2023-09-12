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
$smod["opinion"]="OP";
$smod["director"]="DI";
$smod["entrevista"]="EN";
$smod["noticia"]="NO";
$smod["programacion"]="PR";

switch ($_POST[act]) {
	case 'new':
		$post = new Noticia();		
		$post->varnoticiatitulo =htmlspecialchars(addslashes($_POST["cktitulo"]), ENT_QUOTES);		
		($newname?$post->varnoticiaurl=$newname:$none);
		$post->txtnoticiasumilla = htmlspecialchars(addslashes($_POST["cksumilla"]), ENT_QUOTES);
		$post->txtnoticiadescrip = htmlspecialchars(addslashes($_POST["ckdescripcion"]), ENT_QUOTES);
		$post->datenoticiafreg = date("Y-m-d H:i:s");
		$post->charnoticiasec=$_POST[seccion];
		$post->charnoticiatipo=$_POST[tipo];
		$post->charnoticiagrupo=$smod[$_POST[smod]];
		($_POST[destacado]?$post->intnoticiadestacado=$_POST[destacado]:$none);
		$post->intnoticiast=$_POST["public"];
		$post->save();
		break;
	case 'upt':		
		$post = Noticia::find($_POST[idf]);
		$post->varnoticiatitulo =htmlspecialchars(addslashes($_POST["cktitulo"]), ENT_QUOTES);
		($newname?$post->varnoticiaurl=$newname:$none);
		$post->txtnoticiasumilla = htmlspecialchars(addslashes($_POST["cksumilla"]), ENT_QUOTES);
		$post->txtnoticiadescrip = htmlspecialchars(addslashes($_POST["ckdescripcion"]), ENT_QUOTES);		
		$post->charnoticiasec=$_POST[seccion];
		$post->charnoticiatipo=$_POST[tipo];
		$post->charnoticiagrupo=$smod[$_POST[smod]];
		($_POST[destacado]?$post->intnoticiadestacado=$_POST[destacado]:$none);
		$post->intnoticiast=$_POST["public"];
		$post->save();
		break;
}
if($_GET[act]=="del"){
	$post = Noticia::find($_GET[idf]);	
	$post->delete();
}

//echo $post::connection()->last_query;
header("Location:../../index.php?mod={$_REQUEST[mod]}&smod={$_REQUEST[smod]}&page=index")
?>






