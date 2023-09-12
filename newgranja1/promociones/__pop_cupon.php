<?include("inc.var.php");
$cp = new cls_emp_cuponsel();
$cp->set_id_usuarios($_SESSION["session_socio"]);
$cp->set_id_fotocupon($_GET["idcp"]);
$id=$cp->guarda();?>
<?if(!isset($_SESSION["session_socio"])){header("location:index.php");}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>La Granja Villa - Imprime tu cupon</title>
</head>
<?$cp=getVal("tbl_fotocupon","txt_foto","where id_fotocupon='$_GET[idcp]'") ?>
<body topmargin="0" leftmargin="0">
<img src="<?=UPLOAD_FOTOS_PUB.$cp?>" border=""  width="520" height="240"/>
<script language="JavaScript" type="text/javascript">
window.print();
</script>

<script language="JavaScript" type="text/javascript">

var pagina="pop_cerrar.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 10);

</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-3340021-9");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
