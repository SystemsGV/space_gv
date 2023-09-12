<? 
include("../../inc.var.php");
//var_dump($_FILES["uploads"]);
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
		$post = new Maestro();		
		$post->varmaestronombres=$_POST[nombres];
		$post->varmaestroapellidos=$_POST[apellidos];
		$post->charmaestrodni=$_POST[dni];
		$post->varmaestroemail=$_POST[email];
		$post->intubigeoid=$_POST[dis];
		$post->varmaestrodireccion=$_POST[direc];
		$post->varmaestrotelefono=$_POST[tel];
		$post->datemaestrofnac=$_POST[fnac];
		$post->varmaestroimg=$newname;
		$post->varmaestroclave=$_POST[contrasena];
		$post->intmaestrost=$_POST[stado];
		$post->save();
		break;
	case 'upt':		
		$post = Maestro::find($_POST[idf]);		
		$post->varmaestronombres=$_POST[nombres];
		$post->varmaestroapellidos=$_POST[apellidos];
		$post->charmaestrodni=$_POST[dni];
		$post->varmaestroemail=$_POST[email];
		$post->intubigeoid=$_POST[dis];
		$post->varmaestrodireccion=$_POST[direc];
		$post->varmaestrotelefono=$_POST[tel];
		$post->datemaestrofnac=$_POST[fnac];
		($newname?$post->varmaestroimg=$newname:$none);		
		$post->varmaestroclave=$_POST[contrasena];
		$post->intmaestrost=$_POST[stado];
		$post->save();
		break;
}
if($_GET[act]=="del"){
	$post = Maestro::find($_GET[idf]);	
	$post->delete();
}
if($_GET[cmd]){
	$result = array(); 
	if($_GET[cmd]=="pro"){
		$post = Ubigeo::find_by_sql("select DISTINCT charUbigeoIpro as id,varUbigeoTpro as texto from ubigeo where charUbigeoIdep='{$_GET[dep]}'");
	}elseif ($_GET[cmd]=="dis"){	
		$post = Ubigeo::find_by_sql("select intUbigeoId as id,charUbigeoIdis,varUbigeoTdis as texto from ubigeo where charUbigeoIdep='{$_GET[dep]}' and charUbigeoIpro='{$_GET[pro]}'");
	}
	foreach ($post as $p){array_push($result, $p->to_array());}
	echo json_encode($result);	
}

if(isset($_POST[act]) || isset($_GET[act]) ){
	header("Location:../../index.php?mod={$_REQUEST[mod]}&page=index");
}
?>
