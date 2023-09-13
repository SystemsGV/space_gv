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
if($_FILES["icon"]["name"]){

	$uploads_dir = '../../uploads';

	$name= $_FILES["icon"]["name"];

	$newname2 = str_replace(" ","",str_replace('.',"",microtime())).".".end(explode(".",$name));

	$type= $_FILES["icon"]["type"];

	$size= $_FILES["icon"]["size"];

	$temp= $_FILES["icon"]["tmp_name"];

	$error= $_FILES["icon"]["error"];

	if ($error > 0){

	    die("Error uploading file! code $error.");

	}else{    

	    move_uploaded_file($temp, "{$uploads_dir}/{$newname2}");    

	}

}

$smod["clima"]="CL";

$smod["director"]="DI";

$smod["entrevista"]="EN";

$smod["noticia"]="NO";

$smod["programacion"]="PR";

$smod["transmision"]="TR";

$smod["ultimo"]="UL";

$fini = explode("/",$_POST[start]);

$ffin = explode("/",$_POST[end]);

//echo $fini[2]."-".$fini[1]."-".$fini[0];

//echo "<br>";

//echo $ffin[2]."-".$ffin[1]."-".$ffin[0];

switch ($_POST[act]) {

	case 'new':

		$post = new Boleto();		

		$post->varboletonombre =htmlspecialchars(addslashes($_POST["cknombre"]), ENT_QUOTES);
		$post->varboletotitulo =htmlspecialchars(addslashes($_POST["cktitulo"]), ENT_QUOTES);		

		($newname?$post->varboletoimg=$newname:$none);
		($newname2?$post->varboletoicon=$newname2:$none);

		$post->txtboletodescrip = htmlspecialchars(addslashes($_POST["ckdescripcion"]), ENT_QUOTES);

		$post->decboletopu=$_POST[pu];

		$post->dateboletofini=$fini[2]."-".$fini[1]."-".$fini[0];

		$post->dateboletoffin=$ffin[2]."-".$ffin[1]."-".$ffin[0];

		$post->charboletocodigo=$_POST[codigo];
		$post->intboletost=$_POST["public"];

		$post->save();		

		break;

	case 'upt':		

		$post = Boleto::find($_POST[idf]);
		$post->varboletonombre =htmlspecialchars(addslashes($_POST["cknombre"]), ENT_QUOTES);
		$post->varboletotitulo =htmlspecialchars(addslashes($_POST["cktitulo"]), ENT_QUOTES);		

		($newname?$post->varboletoimg=$newname:$none);
		($newname2?$post->varboletoicon=$newname2:$none);

		$post->txtboletodescrip = htmlspecialchars(addslashes($_POST["ckdescripcion"]), ENT_QUOTES);

		$post->decboletopu=$_POST[pu];

		$post->dateboletofini=$fini[2]."-".$fini[1]."-".$fini[0];

		$post->dateboletoffin=$ffin[2]."-".$ffin[1]."-".$ffin[0];

		$post->intboletost=$_POST["public"];
		$post->charboletocodigo=$_POST[codigo];

		$post->save();

		break;

}

if($_GET[act]=="del"){

	$post = Boleto::find($_GET[idf]);	

	$post->delete();

}



//echo $post::connection()->last_query;

header("Location:../../index.php?mod={$_REQUEST[mod]}&smod={$_REQUEST[smod]}&page=index")

?>













