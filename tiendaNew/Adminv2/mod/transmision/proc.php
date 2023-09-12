<? 
include("../../inc.var.php");
$post = Setup::first('all',array('conditions'=>'varSetupCodigo = "transmision"'));
$post->txtsetupdescrip=$_POST["cktransmision"];
$post->datesetupfreg=date("Y-m-d H:i:s");
$post->save();
?>

<script>
location.href="../../index.php?mod=<?=$_POST[mod]?>&page=form"
</script>