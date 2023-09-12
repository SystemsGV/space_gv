<? 
include("../../inc.var.php");
//echo "opt:".$_POST[opt]."<br>";
if($_POST[opt]=="img"){
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
}elseif ($_POST[opt]=="vdo"){
		$newname=htmlspecialchars(addslashes($_POST["txtmultimedia"]), ENT_QUOTES);
}

switch ($_POST[act]) {
	case 'new':
		$post = new File();
		$post->intfiletipo="1";	
		$post->varfiletitulo=$_POST[titulo];
		($newname?$post->txtfilesrc=$newname:$none);					
		($_POST[stado]?$post->intfilest=$_POST[stado]:$none);
		$post->datefilefreg=date("d-m-Y");		
		$post->save();
		break;
	case 'upt':		
		$post = File::find($_POST[idf]);
		$post->intfiletipo="1";
		$post->varfiletitulo=$_POST[titulo];
		($newname?$post->txtfilesrc=$newname:$none);	
		$post->intfilest=$_POST[stado]?$_POST[stado]:$none;
		$post->datefilefreg=date("d-m-Y");	
		$post->save();
		break;
}
if($_GET[act]=="del"){
	$post = File::find($_GET[idf]);	
	$post->delete();
}

if(isset($_POST[act]) || isset($_GET[act]) ){
	header("Location:../../index.php?mod={$_REQUEST[mod]}&page=index");
}
?>
