<?php

include("../../inc.var.php");


$smod["clima"]="CL";

$smod["director"]="DI";

$smod["entrevista"]="EN";

$smod["noticia"]="NO";

$smod["programacion"]="PR";

$smod["transmision"]="TR";

$smod["ultimo"]="UL";



switch ($_POST["act"]) {

	case 'new':
		$post = new Nodisponible();	
		
		if($_POST['inicio']){
                    $post->days_disabled = $_POST["inicio"];
		}

		$post->st = $_POST["boleto"];

		$post->save();		

		break;

	case 'upt':		

		$post = Nodisponible::find($_POST["idf"]);

		if($_POST['inicio']){
			
			$post->days_disabled = $_POST["inicio"];

		}
		
		$post->save();

		break;

}

if($_GET["act"]=="del"){

	$post = Nodisponible::find($_GET["idf"]);

	$post->st = "0";

	$post->save();

}



//echo $post::connection()->last_query;

header("Location:../../index.php?mod={$_REQUEST["mod"]}&smod={$_REQUEST["smod"]}&page=index");

?>













