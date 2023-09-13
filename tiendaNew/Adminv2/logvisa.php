<?php
include("inc.var.php");
    $response = Logvisa::all();
?>
<table  style="border: solid 1px #000;">
    <thead>
        <th>Id Order</th>
        <th>E-ticket</th>
        <th>Fecha</th>
        <th>Mensaje</th>       
    </thead>
    <tbody>
        <?php foreach($response as $log):?>
        <tr>
            <td style="padding: 0 20px 0 20px;"><?php echo $log->idorder;?></td>
            <td style="padding: 0 20px 0 20px;"><?php echo $log->eticket;?></td>
            <td style="padding: 0 20px 0 20px;"><?php echo $log->fecha;?></td>
            <td style="padding: 0 20px 0 20px;"><?php echo $log->mensaje;?></td>
        </tr>
        <?php endforeach;?>        
    </tbody>
</table>