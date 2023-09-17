<?php
include '../admin/includes/inc_header.php';
include '../admin/includes/constantes.php';
include '../admin/includes/funciones.php';
if(session_start()){
    session_destroy();    
    header('location: ../index.php');
}else{
    header('location: ../index.php');
}