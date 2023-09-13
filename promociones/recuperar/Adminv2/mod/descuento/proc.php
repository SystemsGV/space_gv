<?php
include("../../inc.var.php");

$smod["clima"]="CL";
$smod["director"]="DI";
$smod["entrevista"]="EN";
$smod["noticia"]="NO";
$smod["programacion"]="PR";
$smod["transmision"]="TR";
$smod["ultimo"]="UL";

switch ($_POST[act]) {
	case 'new':
		$post = new Descuento();		
		$post->tipo = $_POST['tipo'];
		if($_POST['inicio']){
			$inicio = explode("/",$_POST['inicio']);
			$post->inicio = $inicio[2]."-".$inicio[1]."-".$inicio[0];
		}
		if($_POST['fin']){
			$fin = explode("/",$_POST['fin']);
			$post->fin = $fin[2]."-".$fin[1]."-".$fin[0];
		}		
		$post->codigo = $_POST['codigo'];
		$post->descuento = $_POST['descuento'];
		$post->fecha = date("Y-m-d H:i:s");
		$post->st = "1";
		$post->save();		
		break;
	case 'upt':		
		$post = Descuento::find($_POST[idf]);
		$post->tipo = $_POST['tipo'];
		if($_POST['inicio']){
			$inicio = explode("/",$_POST['inicio']);
			$post->inicio = $inicio[2]."-".$inicio[1]."-".$inicio[0];
		}
		if($_POST['fin']){
			$fin = explode("/",$_POST['fin']);
			$post->fin = $fin[2]."-".$fin[1]."-".$fin[0];
		}		
		$post->codigo = $_POST['codigo'];
		$post->descuento = $_POST['descuento'];
		$post->save();
		break;
}
if($_GET[act]=="del"){
	$post = Descuento::find($_GET[idf]);
	$post->st = "0";
	$post->save();
}

//echo $post::connection()->last_query;
header("Location:../../index.php?mod={$_REQUEST[mod]}&smod={$_REQUEST[smod]}&page=index")
?>






