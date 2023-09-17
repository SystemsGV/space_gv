<?php 
	require_once("../models/empresas.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new empresas();
		$r=$inst ->lista_empresas($valor);
		//print_r($r);
		echo json_encode($r);
	}
	
?>