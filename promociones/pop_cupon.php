<?
    include("inc.var.php");
	$cp = new cls_emp_cuponsel();
	$cp->set_id_usuarios($_SESSION["session_socio"]);
	$cp->set_id_fotocupon($_GET["idcp"]);
	$id=$cp->guarda();
?>
<?
    if(!isset($_SESSION["session_socio"])){
        header("location:index.php");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>La Granja Villa - Imprime tu cupon</title>
</head>
<?
    $cp=getVal("tbl_fotocupon","txt_foto","where id_fotocupon='$_GET[idcp]'");
?>
<body topmargin="0" leftmargin="0">
    <img src="<?=UPLOAD_FOTOS_PUB.$cp?>" border=""  width="1024" height="550"/>
    <p style="font-size:160%;">Nombre y Apellidos: 
        <span style="font-size:160%;"><?=getVal("tbl_usuarios","txt_nombre","where id_usuarios='$_SESSION[session_socio]'")?></span> 
        <span style="font-size:160%;"><?=getVal("tbl_usuarios","txt_apellido","where id_usuarios='$_SESSION[session_socio]'")?></span>
    </p>
    <p style="font-size:160%;">DNI: <span style="font-size:160%;"><?php echo $_SESSION['clientdni'] ?></span></p>
    <script language="JavaScript" type="text/javascript">
        window.print();
        var pagina="pop_cerrar.php"
        function redireccionar()
        {
            location.href=pagina
        }
        setTimeout ("redireccionar()", 1500000);
    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-30833338-1']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</body>
</html>