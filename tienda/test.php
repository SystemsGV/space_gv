<?
function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE){
    //$source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            //mt_srand(microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
    return $rstr;
}
echo "Randon : ".RandomString(6,TRUE,TRUE,FALSE)."<br>";
$caracteres="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$maximo = strlen($caracteres);
for ($i=1; $i<=6; $i++){
    $generar_codigo = mt_rand(1, $maximo);
    $codigo.=$caracteres[$generar_codigo-1];
}
echo $codigo;

?>