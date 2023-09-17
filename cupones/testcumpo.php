<?php
require_once("dompdf/dompdf_config.inc.php");
include '../admin/clases/cls_emp_foto2.php'; /*This table Cupon*/

$idCustomer = $_SESSION['session_cliente']; /*Id de cliente logeado*/
$cupon = new cls_emp_foto();

$day = date('d/m/Y');
$days = explode('/', $day);
$code = "CP".$days[0].$days[1].$days[2];
$nroCode = $cupon->getCountCode($idCustomer, $code);
$totalCupon = $nroCode + 1;

for($i=1; $i<= 1; $i++){
    $imagenDos = '<img src="http://generator.barcodetools.com/barcode.png?gen=0&data='.$code.$i.'&bcolor=FFFFFF&fcolor=000000&tcolor=000000&fh=14&bred=0&w2n=2.5&xdim=2&w=100&h=320&debug=1&btype=7&angle=90&quiet=1&balign=2&talign=0&guarg=1&text=1&tdown=1&stst=1&schk=0&cchk=1&ntxt=1&c128=0">';

    $head ='
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="utf-8" />
    <title>La Granja Villa</title>
    <style>
    body {font-family:Verdana, Arial, Helvetica, sans-serif;background-color:#fff;}
    table {width:100%; height:360px;}
    p{
        width: auto;
        height: auto;
        -ms-transform: rotate(270deg);
        -webkit-transform: rotate(270deg);
        transform: rotate(270deg);    
    }
    </style>
    </head> 
    <body>
    <table style="background: url(\'assets/img/bg_cupon01.png\');">
        <tr>
            <td style="width:25px;">&nbsp;</td>
            <td style="text-align:left;">'.$imagenDos.' 
            </td>
        </tr>
    </table>
    ';
    $contraportada='';
    $footer=' </body>
    </html>';
    $margarita=$head.$contraportada.$footer;
    $dompdf=new DOMPDF();
    $dompdf->load_html($margarita);
    
    $dompdf->render();
    $output = $dompdf->output();
    file_put_contents("download/$code"."$i.pdf", $output);
    ini_set("memory_limit","128M");
    set_time_limit ( 0 );
}


    
   
//$code = 

