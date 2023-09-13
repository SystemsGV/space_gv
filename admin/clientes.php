<?
include("includes/constantes.php");
include("includes/funciones.php");
conn_abre();
mysql_select_db("lagranja_peru4",$conexion)or die("Error de conexion de la base de datos : ".mysql_error());
/*$sql="select * from Cliente";
$rsl=mysql_query($sql) or die(mysql_query());
echo "total rows : ".mysql_num_rows($rsl)."<br>";*/
//while($rs=mysql_fetch_array($rsl)){

//echo $rs['sClieCode']."/".$rs['sClieApel']."/".$rs['sClieName']."/".$rs['sClieAddr']."/".$rs['cDistCode']."/".$rs['cProvCode']."/".$rs['cDepaCode']."/".$rs['sClieTelf']."/".$rs['sClieMail']."/".$rs['dNacmDate']."/".$rs['dUltTDate']."/".$rs['cTranCode']."/".$rs['nPuntCant']."/".$rs['nTickCant']."/".$rs['sClieRout']."/".$rs['sDistDesc']."/".$rs['sProvDesc']."/".$rs['sDepaDesc']."/".$rs['iTipo int']."/".$rs['sCodigoOriginal']."/".$rs['nPuntosIni']."/".$rs['IdLocal']."/"."<br>";
//echo "cliente :".$rs['scliecode']."<br>";
//}
echo "hola mundo";
$sql="DESCRIBE Cliente";
echo $rs=mysql_query($sql);
?>