<? 
include("../../inc.var.php");
$post = Administrador::first(); 
$post->varadministradortitulo=$_POST[titulo];
$post->varadministradorusuario=$_POST[usuario];
$post->varadministradorpsw=$_POST[contrasena];
$post->save();
?>

<script>
location.href="../../index.php?mod=<?=$_POST[mod]?>&page=form"
</script>