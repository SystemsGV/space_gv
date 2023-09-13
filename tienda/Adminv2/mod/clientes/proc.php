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
		$post = new Cliente();		
		$post->sclieapepat = $_POST['sclieapepat'];		
		$post->sclieapemat = $_POST['sclieapemat'];
		$post->sclieapel = $_POST['sclieapepat']." ".$_POST['sclieapemat'];
		$post->scliename = $_POST['scliename'];
		$post->charclientedni = $_POST['charclientedni'];
		$post->scliemail = $_POST['scliemail'];
		$post->sclietelf = $_POST['sclietelf'];
		if($_POST['dnacmdate']){
			$dnacmdate = explode("/",$_POST['dnacmdate']);
			$post->dnacmdate = $dnacmdate[2]."-".$dnacmdate[1]."-".$dnacmdate[0];
		}
		$post->sclieaddr = $_POST['sclieaddr'];
		$post->save();		
		break;
	case 'upt':		
		$post = Cliente::find($_POST[idf]);
		$post->sclieapepat = $_POST['sclieapepat'];		
		$post->sclieapemat = $_POST['sclieapemat'];
		$post->sclieapel = $_POST['sclieapepat']." ".$_POST['sclieapemat'];
		$post->scliename = $_POST['scliename'];
		$post->charclientedni = $_POST['charclientedni'];
		$post->scliemail = $_POST['scliemail'];
		$post->sclietelf = $_POST['sclietelf'];
		if($_POST['dnacmdate']){
			$dnacmdate = explode("/",$_POST['dnacmdate']);
			$post->dnacmdate = $dnacmdate[2]."-".$dnacmdate[1]."-".$dnacmdate[0];
		}
		$post->sclieaddr = $_POST['sclieaddr'];
		$post->save();
		break;
}
if($_GET[act]=="del"){
	$post = Cliente::find($_GET[idf]);	
	//$post->delete();
}

//echo $post::connection()->last_query;
header("Location:../../index.php?mod={$_REQUEST[mod]}&smod={$_REQUEST[smod]}&page=index")
?>






