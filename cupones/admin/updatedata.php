<?php 
 
include_once ('Models/updatedata.php');

$insertar = "INSERT INTO tbl_promocion (id_cliente, status_cupon, tipo_promo, fecha_venc) SELECT DISTINCT tc.id_cliente, 0, tc.txt_nombre7, tc.txt_nombre4 FROM tbl_cliente AS tc WHERE NOT EXISTS (SELECT 1 FROM tbl_promocion AS tb WHERE (tc.id_cliente = tb.id_cliente));";

$resultado = mysqli_query($db, $insertar);

if (!$resultado) {
  echo 'Error al Actualizar';
}else{
  echo 'Actualización Exitosa';
}

?>