<?php
$mysqli=new mysqli("localhost","lagranja_cupon","F&t7h-4+C;WC","lagranja_cupon");
$salida="";
$query="SELECT * FROM tbl_cliente order by id_cliente";

if(isset($_POST['consulta'])){
	$q=$mysqli->real_escape_string($_POST['consulta']);
	$query="SELECT id_cliente, txt_nombre, txt_nombre2, txt_nombre4, txt_email, int_stado from tbl_cliente where txt_nombre LIKE '%".$q."%'";
}

$resultado=$mysqli->query($query);
if($resultado->num_rows>0){
	$salida.="<table class='tabla_datos'>
	<thead>
	<tr>
	<td>ID</td>
	<td>Empresa</td>
	<td>Num Cupones</td>
	<td>Fecha Vencimiento</td>
	<td>Ver Cupones</td>
	<td>Cupon</td>
	<td>Estado Cliente</td>
	<td>Opciones</td>
	</tr>
	</thead>
	<tbody>";
	while($fila=$resultado->fetch_assoc()){
		$salida.="<tr>
		<td>".$fila['id_cliente']."</td>
		<td>".$fila['txt_nombre']."</td>
         <td>".$fila['txt_nombre2']."</td>
         <td>".$fila['txt_nombre4']."</td>  
		<td>".$fila['txt_email']."</td>
					  
                      </tr>";
           }
           $salida.="</tbody></table>";
           
} else {
	$salida.="No hay dato:(";
}
echo $salida;
$mysqli->close();
       
?>

	

