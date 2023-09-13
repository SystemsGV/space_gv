<? 
$ver200=explode("_",$_SERVER['PHP_SELF']);
$compara=explode(".",$ver200[1]);
if($_SESSION['session_opt']==2){$mAdmin=2;if($compara[0]=="precios" || $compara[0]=="administrador"){header("location:inf_clientes.php");}}
if($_SESSION['session_opt']==3){$mAdmin=3;if($compara[0]<>"sfotos"){header("location:inf_sfotos.php");}}
?>
<tr>
	<td align="center"><script type="text/javascript" language="JavaScript1.2" src="menu_admin<?=$mAdmin?>.js"></script></td>
	</tr>