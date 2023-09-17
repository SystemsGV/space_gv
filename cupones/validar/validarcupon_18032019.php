<?php
 $link =  mysql_connect("localhost","lagranja_cupon", "*g?N{enxyM*(") or die("<h2>No se encuentra Servidor</h2>");
        $db = mysql_select_db ("lagranja_cupon", $link) or die("<h2>Error de Conexion</h2>");

       $codigo = $_POST["codigocupon"];

        $resultado = mysql_query("SELECT f.id_categoria, f.txt_foto,f.txt_email,f.int_stado,f.int_retoque, cl.txt_nombre4 
                        from tbl_foto2 as f 
                        inner join tbl_cliente as cl on f.id_cliente = cl.id_cliente
                        WHERE f.int_retoque ='".$codigo."'", $link);
        $resultadoFinal = mysql_fetch_array($resultado);


?>
<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <title>.: Validar Cupones de la Granja Villa</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="cupones de la Granja Villa">
       

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

 

    </head>

    <body>

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="logo span4">
                        <h1><a href="">Validar Cupones<span class="red">.</span></a></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="register-container container">
            <div class="row">
                <center>
                <div class="register" style="width: 570px;">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" name="buscarcupon" method="post">
                        <h2><span class="red"><strong>CODIGO CUPON</strong></span></h2>
                        <label for="Mensaje" id="Mensaje"></label>
                        
                        <input type="text" id="codigocupon" name="codigocupon" style="width: 95%;height: 30px;" placeholder="Teclea Codigo Cupon..." required>
                       
                        <button type="submit" name="buscarcupon">VALIDAR CUPON</button>
                    </form>
                </div>
                </center>
            </div>
        </div>

        <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <tr>
        
                     <td width="200" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra">EMPRESA / CLIENTE</td>
                      <td width="200" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra">FECHA VENC</td>                     
                      <td width="190" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra">FECHA USADA</td>
                      	<td width="190" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra">NUMERO DE CUPON</td>
                       <td width="190" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra">CODIGO DE CUPON</td>	
                      <td width="226" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra" align="left">STATUS</div></td>

                      <!--<td width="235" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">VER CUPONES</div></td>
                      <td width="166" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">CUPON</div></td>
                      <td width="217" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">ESTADO CLIENTE</div></td>-->
       
            <tr valign="middle" bgcolor="<?=$color?>" class="bg_fila">
                      

                     <?php 
                     echo ("<td>" .$resultadoFinal["id_categoria"]."</td>"); 
                     echo ("<td>" .$resultadoFinal["txt_nombre4"]."</td>"); 
					echo ("<td>" .$resultadoFinal["txt_foto"]."</td>"); 
					echo ("<td>" .$resultadoFinal["int_retoque"]."</td>"); 
                     echo ("<td>" .$resultadoFinal["int_stado"]."</td>"); 
                     
                     echo "<td>";
          					if($resultadoFinal['int_stado'] == 1){
            				echo '<span class="label label-warning">CUPON USADO</span>';
         			 }
                       		 else{
            				echo '<span class="label label-success">CUPON VIGENTE</span>';
          			}                 
 					echo "</td>";

                 ?>
                   
       </tr>
        <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <tr>
        
                     <td width="200" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra">EMPRESA / CLIENTE</td>
                      <td width="200" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra">FECHA VENC</td>                     
                      <td width="190" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra">FECHA USADA</td>
                      	<td width="190" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra">NUMERO DE CUPON</td>
                       <td width="190" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra">CODIGO DE CUPON</td>	
                      <td width="226" align="left" valign="middle" bgcolor="#262626" class="tablafront"><div class="titulobarra" align="left">STATUS</div></td>

                      <!--<td width="235" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">VER CUPONES</div></td>
                      <td width="166" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">CUPON</div></td>
                      <td width="217" align="center" valign="middle" bgcolor="#949494" class="titus_tablas"><div align="center">ESTADO CLIENTE</div></td>-->
       
            <tr valign="middle" bgcolor="<?=$color?>" class="bg_fila">
                      

                     <?php 
                     echo ("<td>" .$resultadoFinal["id_categoria"]."</td>"); 
                     echo ("<td>" .$resultadoFinal["txt_nombre4"]."</td>"); 
					echo ("<td>" .$resultadoFinal["txt_foto"]."</td>"); 
					echo ("<td>" .$resultadoFinal["int_retoque"]."</td>"); 
                     echo ("<td>" .$resultadoFinal["int_stado"]."</td>"); 
                     
                     echo "<td>";
          					if($resultadoFinal['int_stado'] == 1){
            				echo '<span class="label label-warning">CUPON USADO</span>';
         			 }
                       		 else{
            				echo '<span class="label label-success">CUPON VIGENTE</span>';
          			}                 
 					echo "</td>";

                 ?>
                   
       </tr>
        <tr>
            
            
           
        </tr>
    </table>

        <!-- Javascript -->
        <script src="../assets/js/jquery-1.8.2.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/scripts.js"></script>

    </body>

</html>

