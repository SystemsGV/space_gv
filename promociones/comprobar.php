<?php
      $user = $_POST['b'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
            $con = mysql_connect('localhost','lagranja_gv', '150613$server');
            mysql_select_db('lagranja_gv', $con);
       
            $sql = mysql_query("SELECT * FROM tbl_usuarios WHERE txt_email = '".$b."'",$con);
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
            }else{
                  echo "<span style='font-weight:bold;color:red;'>El email de usuario ya existe.</span>";
            }
      }     
?>