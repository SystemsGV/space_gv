<?php
$link =  mysql_connect("localhost","lagranja_cupon", "*g?N{enxyM*(") or die("<h2>No se encuentra Servidor</h2>");;
$db = mysql_select_db ("lagranja_cupon", $link) or die("<h2>Error de Conexion</h2>");

$codigo = $_POST['codigocupon'];

mysql_query("select * from tbl_foto2 WHERE int_retoque = '' ")



