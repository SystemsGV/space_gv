<?php
include '../admin/includes/inc_header.php';
include '../admin/includes/constantes.php';
include '../admin/includes/funciones.php';
include '../admin/clases/cls_emp_cliente.php';
if($_POST){
    $cliente =  new cls_emp_cliente();
    $user = $cliente->set_txt_usuario($_POST['user']);
    $pass = $cliente->set_txt_password($_POST['password']);    
    $id = $cliente->valida_socio();
    if(!empty($id)){
        $op = 1;
        $_SESSION['session_cliente'] = $id;
        echo "OK";
    }        
}else{
    echo "FAIL";
}



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

