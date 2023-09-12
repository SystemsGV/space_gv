<?php

                    include_once ('modelo/database.php');

                    $nombres = $_POST['nombres'];
                    $apellidos = $_POST['apellidos'];
                    $fecha = htmlentities($_POST['fechanac']);
                    $fono = $_POST['fono'];
                    $direccion = $_POST['direcc'];
                    $distrito = $_POST['distrito'];
                    $email = $_POST['email'];
                    $dni = $_POST['dni'];
                    $usuario = $_POST['user'];
                    $contra = $_POST['passw'];
                    $rd_promo = $_POST['rd_promo'];

                    $fecha_nac = date("d/m/Y", strtotime($fecha));
?>