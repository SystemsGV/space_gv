<? 
include("../../inc.var.php");

switch ($_POST[act]) {
	case 'new':
		$post = new Distribuidor();		
		$post->txtdistribuidortitulo =htmlspecialchars(addslashes($_POST[titulo]), ENT_QUOTES);				
		$post->txtdistribuidorsrc = htmlspecialchars(addslashes($_POST[mapa]), ENT_QUOTES);
		$post->txtdistribuidordescrip = htmlspecialchars(addslashes($_POST[descripcion]), ENT_QUOTES);
		$post->datedistribuidorfreg = date("Y-m-d H:i:s");		
		$post->save();
		break;
	case 'upt':		
		$post = Distribuidor::find($_POST[idf]);
		$post->txtdistribuidortitulo =htmlspecialchars(addslashes($_POST[titulo]), ENT_QUOTES);				
		$post->txtdistribuidorsrc = htmlspecialchars(addslashes($_POST[mapa]), ENT_QUOTES);
		$post->txtdistribuidordescrip = htmlspecialchars(addslashes($_POST[descripcion]), ENT_QUOTES);		
		$post->save();
		break;
}
if($_GET[act]=="del"){
	$post = Distribuidor::find($_GET[idf]);	
	$post->delete();
}
header("Location:../../index.php?mod={$_REQUEST[mod]}&page=index")
?>






