<?

// Si va todo bien sacamos todo de la base de datos 
    while ( $row = mysql_fetch_array($result) ) { 
      $correo = $row["txt_email"]; 
      $contrasena = $row ["txt_password"]; 
      $nombres = $row ["txt_nombre"]; 
      $apellidos = $row ["txt_apellido"]; 
      $usuario = $row ["txt_usuario"]; 
} 

// creamos el email  
$denombre="Administrador del Sistema"; 
$deemail="sistemas@lagranjavilla.com"; 
$sfrom="sistemas@lagranjavilla.com"; //cuenta que envia 
$sBCC="sistemas@lagranjavilla.com"; //me envio una copia oculta 
$sdestinatario="$correo"; //cuenta destino 
$ssubject="Datos de su cuenta en el Sistema"; //subject 
$shtml="Estimado $nombres $apellidos la presente es para comunicarle su Login y Password para ingresar al Sistema después de haber extraviado el método de acceso:<br><p>Ud esta registrado en nuestro sistema con los siguientes datos:<p>Nombres: $nombres<br>Apellidos: $apellidos<br>  Email: $correo</p><p>El login y password para entrar correctamente al sistema son los siguientes:<p>Login: $usuario<br>Password: $contrasena<br></p><p>Recuerde guardar este correo en un lugar seguro dentro de sus archivos personales.</p><p>Para ingresar al Sistema lo puede hacer por los momentos en:</p><p><a href='http://www.lagranjavilla.com'>[url]http://www.lagranjavilla.com[/url]</a></p>Atte:<br></p><p>Andministrador de la Granja Villa<br><a href='mailto:sistemas@lagranjavilla.com'>sistemas@lagranjavilla.com</a><br>Webmaster del Sistema</p>"; 
$encabezados  = "MIME-Version: 1.0\n"; 
$encabezados .= "Content-type: text/html; charset=iso-8859-1\n"; 
$encabezados .= "From: $denombre <$deemail>\n"; 
$encabezados .= "X-Sender: <$sfrom>\n"; 
$encabezados .= "BCC: <$sBCC>\n"; 
$encabezados .= "X-Mailer: PHP\n"; 
$encabezados .= "X-Priority: 1\n";  
$encabezados .= "Return-Path: <$sfrom>\n"; 
mail($sdestinatario,$ssubject,$shtml,$encabezados); 

//le decimos al usuario que fue enviado su password  
//y que vaya rapido a revisar su correo electronico 

echo  ("<table width='467'><tr><td class='texto'>El Login y password de tu cuenta ha sido enviado al siguiente correo: $email</a></td><tr></table>"); 

?> 
<p><br><p><br><p><br><p><center><a href='javascript:window.close();'><IMG SRC='images/cerrar.gif' BORDER='0' ALT='CERRAR'></a></center><p></table> 
<? 

?>