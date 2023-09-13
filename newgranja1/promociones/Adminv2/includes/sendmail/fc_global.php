<?php 
include "sendmail/class.phpmailer.php";
function video_info($url) {
 
// Handle Youtube
if (strpos($url, "youtube.com")) {
    $url = parse_url($url);
    $vid = parse_str($url['query'], $output);
    $video_id = $output['v'];
    $data['video_type'] = 'youtube';
    $data['video_id'] = $video_id;
    $xml = simplexml_load_file("http://gdata.youtube.com/feeds/api/videos?q=$video_id");
 
    foreach ($xml->entry as $entry) {
        // get nodes in media: namespace
        $media = $entry->children('http://search.yahoo.com/mrss/');
        
        // get video player URL
        $attrs = $media->group->player->attributes();
        $watch = $attrs['url']; 
        
        // get video thumbnail
        $data['thumb_1'] = $media->group->thumbnail[0]->attributes(); // Thumbnail 1
        $data['thumb_2'] = $media->group->thumbnail[1]->attributes(); // Thumbnail 2
        $data['thumb_3'] = $media->group->thumbnail[2]->attributes(); // Thumbnail 3
        $data['thumb_large'] = $media->group->thumbnail[3]->attributes(); // Large thumbnail
        $data['tags'] = $media->group->keywords; // Video Tags
        $data['cat'] = $media->group->category; // Video category
        $attrs = $media->group->thumbnail[0]->attributes();
        $thumbnail = $attrs['url']; 
        
        // get <yt:duration> node for video length
        $yt = $media->children('http://gdata.youtube.com/schemas/2007');
        $attrs = $yt->duration->attributes();
        $data['duration'] = $attrs['seconds'];
        
        // get <yt:stats> node for viewer statistics
        $yt = $entry->children('http://gdata.youtube.com/schemas/2007');
        $attrs = $yt->statistics->attributes();
        $data['views'] = $viewCount = $attrs['viewCount']; 
        $data['title']=$entry->title;
        $data['info']=$entry->content;
        
        // get <gd:rating> node for video ratings
        $gd = $entry->children('http://schemas.google.com/g/2005'); 
        if ($gd->rating) {
            $attrs = $gd->rating->attributes();
            $data['rating'] = $attrs['average']; 
        } else { $data['rating'] = 0;}
    } // End foreach
} // End Youtube
 
// Handle Vimeo
else if (strpos($url, "vimeo.com")) {
    $video_id=explode('vimeo.com/', $url);
    $video_id=$video_id[1];
    $data['video_type'] = 'vimeo';
    $data['video_id'] = $video_id;
    $xml = simplexml_load_file("http://vimeo.com/api/v2/video/$video_id.xml");
        
    foreach ($xml->video as $video) {
        $data['id']=$video->id;
        $data['title']=$video->title;
        $data['info']=$video->description;
        $data['url']=$video->url;
        $data['upload_date']=$video->upload_date;
        $data['mobile_url']=$video->mobile_url;
        $data['thumb_small']=$video->thumbnail_small;
        $data['thumb_medium']=$video->thumbnail_medium;
        $data['thumb_large']=$video->thumbnail_large;
        $data['user_name']=$video->user_name;
        $data['urer_url']=$video->urer_url;
        $data['user_thumb_small']=$video->user_portrait_small;
        $data['user_thumb_medium']=$video->user_portrait_medium;
        $data['user_thumb_large']=$video->user_portrait_large;
        $data['user_thumb_huge']=$video->user_portrait_huge;
        $data['likes']=$video->stats_number_of_likes;
        $data['views']=$video->stats_number_of_plays;
        $data['comments']=$video->stats_number_of_comments;
        $data['duration']=$video->duration;
        $data['width']=$video->width;
        $data['height']=$video->height;
        $data['tags']=$video->tags;
    } // End foreach
} // End Vimeo
 
// Set false if invalid URL
else { $data = false; }
 
return $data;
 
}
function cortarTexto($cadena,$limite)
{
	// Inicializamos las variables 
	$tamano = $limite; // tamaño máximo 
	$contador = 0; 
	$texto = $cadena; 

	// Cortamos la cadena por los espacios 
	$arrayTexto = split(' ',$texto); 
	$texto = ''; 

	// Reconstruimos la cadena 
	while($tamano >= strlen($texto) + strlen($arrayTexto[$contador])){ 
    	$texto .= ' '.$arrayTexto[$contador]; 
	    $contador++; 
	} 
	if (strlen($cadena)>$limite) return $texto." ..."; 
	else return $texto;
}
function youtubeUrlToHTML($url,$width=480,$height=360) { 
	parse_str( parse_url( $url, PHP_URL_QUERY ) ); 
	$key = !empty( $v ) ? $v : $url; 
	$object= '<object width="'.$width.'" height="'.$height.'"><param name="movie" value="http://www.youtube.com/v/'.$key.'&hl=es&fs=1"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/'.$key.'&hl=es&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" width="'.$width.'" height="'.$height.'"></embed></object>'; 
	$data["key"]=$key;
	$data["object"]=$object;
	return $data;
	
} 
function send_email($path,$host,$from,$name,$to,$subject,$body,$cc) {
	/************* php mailer ***************/
	  $mail = new phpmailer();
	  $mail->PluginDir = $path;
	  $mail->Mailer = "mail";
	  $mail->Host = $host;
	  $mail->From = $from;
	  $mail->FromName = $name;
	  $mail->Sender = $from;
	  $mail->Timeout = 30;
	  $mail->AddAddress($to);
	  $mail->Subject = $subject;
	  $mail->IsHTML(true);
	  $mail->Body = $body;
	  $mail->AddBCC($cc);
	  $exito = $mail->Send();
	  $intentos=1;
	  while ((!$exito) && ($intentos < 2)) {
		sleep(5);
			$exito = $mail->Send();
			$intentos=$intentos+1;	
	   }
	   if (!$exito)
	   {
		   return 0;
	   } else {
		   return 1;
	   }
	/************* fin php mailer **************/
}

function fcCombo($sql,$valor,$item,$compara){
	conn_abre();
	global $conexion;
	if(MOTOR_BD=="MYSQL"){	 
	 	$rs=mysql_query($sql)or die("Error select".mysql_error());
		while($row=mysql_fetch_array($rs)){			
			echo "<option ";
				if ($compara==$row[$valor]){
					echo " selected ";
					$a=1;
				}
			echo "value='$row[$valor]'>".$row[$item];
		}
 	}elseif(MOTOR_BD=="SQLSRV"){	  
	  $r = sqlsrv_query($conexion, $sql);
	  if( $r === false ) {
			 die( print_r( sqlsrv_errors(), true));
	  }
	  while($row=sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)){
		  echo "<option ";
				if ($compara==$row[$valor]){
					echo " selected ";
					$a=1;
				}
			echo "value='$row[$valor]'>".$row[$item];
	  }
	  sqlsrv_free_stmt( $r);
 	}
}

function cboComplejo($nombreCombo,$estilo,$sql,$campoValor,$campoItem,$datoCompara,$title,$Ctop=0,$xSel=0,$jvSel=0){
	conn_abre ();
	if($jvSel==1){$jvEvent="onChange='pedirDatos($Ctop)'";};
	echo "<select name='$nombreCombo' id='$nombreCombo' class='$estilo' title='$title' $jvEvent>";
	$a=0;
	
		$res_cboComplejo=mysql_query($sql)or die("Error select".mysql_error());
		if($xSel==1){echo "<option value='0' selected>Seleccione</option>";};
		while($row_cboComplejo=mysql_fetch_array($res_cboComplejo)){
			
			echo "<option ";
				if ($datoCompara==$row_cboComplejo[$campoValor]){
					echo " selected ";
					$a=1;
				}
			echo "value='$row_cboComplejo[$campoValor]'>".ucwords (strtolower($row_cboComplejo[$campoItem]));
		}
	echo "</select>";
}
function cboSBsimple($cboNom,$estilo,$title,$cboVal,$compara,$swcbo=0){
echo "<select name='$cboNom' class='$estilo' title='$title' $jvEvent>";
foreach ($cboVal as $key=>$valor) {
		if($swcbo){$dato=$key;}else{$dato=$valor;}		
		if($dato == $compara){ $selec ="selected";}else{$selec ="";}
	    echo "<option value='$dato' $selec>$valor</option>";	
}
echo "</select>";
}
function TblIdioma(){
$sql="select * from tbl_idioma order by txt_idioma";
$arNivel=array("Basico","Intermedio", "Avanzado");
$result=mysql_query($sql)or die("Error : ".mysql_error());
echo "<table width=\"100%\">";
	while($rs=mysql_fetch_array($result)){
	echo "<tr><td align=left><input type='checkbox' value='$rs[id_idioma]'/>$rs[txt_idioma] </td><td><input type='radio' value='1' name='cbo_nivel$rs[id_idioma]'/>Basico<input type='radio' value='2' name='cbo_nivel$rs[id_idioma]'/>Intermedio<input type='radio' value='3' name='cbo_nivel$rs[id_idioma]'/>Avanzado</td></tr>";		
	}
echo "</table>";
}
function alerta($mensaje,$pagina,$parametros){
	echo "<script language='Javascript'>";
	if($mensaje!=""){
		echo "alert('".$mensaje."');";
	}
	if($parametros==""){	
		echo "location.href='".$pagina."';";		
	}else{
		echo "location.href='".$pagina."?".$parametros."';";		
	}
	echo "</script>";
}

function rplimg($id){


}
function sacar($TheStr, $sLeft, $sRight){
        $pleft = strpos($TheStr, $sLeft, 0);
        if ($pleft !== false){
                $pright = strpos($TheStr, $sRight, $pleft + strlen($sLeft));
                If ($pright !== false) {
                        return (substr($TheStr, $pleft + strlen($sLeft), ($pright - ($pleft + strlen($sLeft)))));
                }
        }
        return '';
}


function codeimg($msg){
    $msg = str_replace("[img]", "<img src=\"", $msg);
    $msg = str_replace("[/img]", "\" id=\"link\" name=\"link\" />", $msg);
	$msg = str_replace("[IMG]", "<img src=\"", $msg);
    $msg = str_replace("[/IMG]", "\" id=\"link\" name=\"link\" />", $msg);
	$msg = str_replace("[/URL]", "</a>", $msg);
	$msg = str_replace("[/url]", "</a>", $msg);
	$msg = str_replace("[url=", "<a href=\"", $msg);
	$msg = str_replace("[URL=", "<a href=\"", $msg);
	$msg = str_replace("]", "\" />", $msg);
    return ($msg);
}
function fcCboGetData($nombreCombo,$estilo,$sql,$campoValor,$campoItem,$datoCompara,$title,$xSel=0,$jvEvent=""){
	conn_abre ();
	echo "<select name='$nombreCombo' class='$estilo' title='$title' $jvEvent>";
	$a=0;
		$res_cboComplejo=mysql_query($sql)or die("Error select".mysql_error());
		if($xSel==1){echo "<option value='0' selected>Seleccione</option>";};
		while($row_cboComplejo=mysql_fetch_array($res_cboComplejo)){
			
			echo "<option ";
				if ($datoCompara==$row_cboComplejo[$campoValor]){
					echo " selected ";
					$a=1;
				}
			echo "value='$row_cboComplejo[$campoValor]'>".ucwords (strtolower($row_cboComplejo[$campoItem]));
		}
	echo "</select>";
}
function fcRunQry($sql) {
	conn_abre ();
	global $conexion;
	if(MOTOR_BD=="MYSQL"){		
		$qry = mysql_query($sql);
		if (strpos($sql, "insert") !== false) {
			return (@mysql_insert_id());	
		}else{	
			return (@mysql_affected_rows());	
		}
	}elseif(MOTOR_BD=="MSSQL"){
		$qry = mssql_query($sql);
		if (strpos($sql, "insert") !== false) {
			return (@mysql_insert_id());	
		}else{	
			return (@mssql_rows_affected());	
		}
	}elseif(MOTOR_BD=="SQLSRV"){
		$params = array();
	 	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );  
	  	$r = sqlsrv_query($conexion, $sql,$params,$options);
		if( $stmt === false ) {
			 die( print_r( sqlsrv_errors(), true));
		}else{
			return sqlsrv_rows_affected();
		}

	}
}
function fcGetAllQry($sql){
 conn_abre();
 global $conexion;
 if(MOTOR_BD=="MYSQL"){	 
	 $r=@mysql_query($sql);
	 if($err=mysql_errno())return $err;
	 if(@mysql_num_rows($r))
	  while($row=mysql_fetch_array($r))$result[]=$row;	
 }elseif(MOTOR_BD=="MSSQL"){
	 $r=@mssql_query($sql);
	 if(@mssql_num_rows($r))
	  while($row=mssql_fetch_array($r))$result[]=$row;
 }elseif(MOTOR_BD=="SQLSRV"){	
  $params = array();
	 $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );  
	  $r = sqlsrv_query($conexion, $sql,$params,$options);
	  if( $r === false ) {
			 die( print_r( sqlsrv_errors(), true));
	  }		  
	  while($row=sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)){$result[]=$row;}
	  sqlsrv_free_stmt( $r);
 }
  return $result;
}
function fcGetOneQry($query){
 conn_abre();
 global $conexion;
 
 if(MOTOR_BD=="MYSQL"){
	 $r=@mysql_query($query);
	 if($err=mysql_error())return $err;
	 if(@mysql_num_rows($r))
	 return mysql_fetch_array($r);
 }elseif(MOTOR_BD=="MSSQL"){
	 $r=@mssql_query($query);
	 if(@mssql_num_rows($r))
	 return mssql_fetch_array($r);
 }elseif(MOTOR_BD=="SQLSRV"){
	 $params = array();
	 $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

	 $r=sqlsrv_query($conexion,$query,$params,$options);
	 //echo var_dump($r);
	 //die( print_r( sqlsrv_errors(), true));
	//echo sqlsrv_num_rows($r);
	if( $r === false ) {
			 die( print_r( sqlsrv_errors(), true));
	}
	if(sqlsrv_num_rows($r))
		 return sqlsrv_fetch_array($r);
		 sqlsrv_free_stmt( $r);
 	}
	
 
}



function fcGetRow($campo,$tabla,$swRs=""){
		conn_abre ();
		$sql="SELECT $campo FROM $tabla $swRs";
         $total = mysql_query($sql) or die(mysql_error());
        $total = mysql_fetch_array($total);
        return $total[0];
}
function fcGetSumRow($campo,$tabla,$swRs="") {
		conn_abre ();
		$sql="SELECT SUM($campo) FROM $tabla $swRs";
        $total = mysql_query($sql) or die(mysql_error());
        $total = mysql_fetch_array($total);
        return $total[0];
}

function fcGetCountRow($tabla,$swRs="") {
		conn_abre ();
		echo $sql="SELECT COUNT(*) FROM $tabla $swRs";
         $total = mysql_query($sql) or die(mysql_error());
        $total = mysql_fetch_array($total);
        return $total[0];
}
function fcGetCountDistintRow($distint,$tabla,$swRs="") {
		conn_abre ();
		$sql="SELECT COUNT(DISTINCT $distint) FROM $tabla $swRs";
        $total = mysql_query($sql) or die(mysql_error());
        $total = mysql_fetch_array($total);
        return $total[0];
}
function fcGetRowArray($campo,$tabla,$swRs="") {
		conn_abre ();
		$sql="SELECT $campo FROM $tabla $swRs";
        $rsl = mysql_query($sql) or die(mysql_error());
        while($rs =  mysql_fetch_array($rsl)){
			$return[]=$rs[$campo];
		}
        return $return;
		
}

function fcGetNavegador($user_agent) {
     $navegadores = array(
          'Opera' => 'Opera',
          'Mozilla Firefox'=> '(Firebird)|(Firefox)',
          'Galeon' => 'Galeon',
          'Mozilla'=>'Gecko',
          'MyIE'=>'MyIE',
          'Lynx' => 'Lynx',
          'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)',
          'Konqueror'=>'Konqueror',
		  'Internet Explorer 8' => '(MSIE 8\.[0-9]+)',
          'Internet Explorer 7' => '(MSIE 7\.[0-9]+)',
          'Internet Explorer 6' => '(MSIE 6\.[0-9]+)',
          'Internet Explorer 5' => '(MSIE 5\.[0-9]+)',
          'Internet Explorer 4' => '(MSIE 4\.[0-9]+)',
);
foreach($navegadores as $navegador=>$pattern){
       if (eregi($pattern, $user_agent))
       return $navegador;
    }
return 'Desconocido';
}

function generarPassword() {
	$numcar =  rand(5, 12);
	$password = "";
	$caracteres = "0123456789bcdfghjkmnpqrstvwxyzBCDFGHJKMNPQRSTVWXYZ#$";
	$i = 0;
	while ($i < $numcar) {
		$char = substr($caracteres, mt_rand(0, strlen($caracteres)-1), 1);
		if(!strstr($password,$char)) {
			$password .= $char;
			$i+=1;
		}
	}
	return $password;
}

function fcTextEncrypt($text){
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $key = "This is a very secret key";
    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv));
    
}

function fcTextDecrypt($text){

    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $key = "This is a very secret key";
  //I used trim to remove trailing spaces
return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($text), MCRYPT_MODE_ECB, $iv));
    
}


function encrypt($string, $key) {
  $result = '';
  for($i=0; $i<strlen($string); $i++) {
    $char = substr($string, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)+ord($keychar));
    $result.=$char;
  }

  return base64_encode($result);
}

function decrypt($string, $key) {
  $result = '';
  $string = base64_decode($string);

  for($i=0; $i<strlen($string); $i++) {
    $char = substr($string, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)-ord($keychar));
    $result.=$char;
  }

  return $result;
}
#Funcion que formatea una fecha, ej. 27/02/2006 a 2006-02-27 y viceversa
function formatDate($charCurrent,$charReplace,$date){
	$date=explode($charCurrent,$date);
	$newDate=$date[2].$charReplace.$date[1].$charReplace.$date[0];
	return $newDate;
}

#Funcion que formatea una fecha, ej. "2006-02-25 10:25:45" a "25/02/2006 10:25:45" y viceversa
function formatDateTime($charCurrent,$charReplace,$date,$no_show_hour=0){

		$date=explode($charCurrent,$date);
		//var_dump($date);
		$time=explode(" ",$date[2]);
		if($no_show_hour){
			$newDate=$time[0].$charReplace.$date[1].$charReplace.$date[0];
		}else{
			$newDate=$time[0].$charReplace.$date[1].$charReplace.$date[0]." ".$time[1];
		}

	return $newDate;
}
function fcFechaLetras($vfecha){
	$fecha = explode("/",$vfecha); 
	$nfecha=$fecha[1]."/".$fecha[0]."/".$fecha[2];
	setlocale(LC_TIME, "Spanish");
	return $fechatexto=utf8_encode(strftime('%A %d de %B del %Y', strtotime($nfecha))); 
}

?>
