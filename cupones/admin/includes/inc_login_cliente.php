<?php
if (empty($_SESSION['session_cliente'])){	
    header ("location: ../../cupones/controller/prc_destroy.php");
}
