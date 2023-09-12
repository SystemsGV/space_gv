<?php

global $conexion;

/*------------------------------------------------------------------- */

function conn_abre ()

{

	global $conexion;

	$conexion=@mysql_pconnect(DB_SERVER, DB_USER, DB_PASS);

	@mysql_select_db(DB_NAME,$conexion)or die("Error de conexion de la base de datos : ".mysql_error());

}





/** @return void

*  @desc Cierra la conexión con el servidor mysql.*/

/*------------------------------------------------------------------- */

function conn_cierra ()

{

	global $conexion;

	@mysql_close($conexion);

}





/** @return array()

*  @param string $sql

*  @desc Ejecuta una consulta y devuelve el resultado. */

/*------------------------------------------------------------------- */

function conn_consulta ($sql)

{

	conn_abre();



	$rs = @mysql_query($sql);

	$fila = @mysql_fetch_array($rs);



	@mysql_free_result($rs);



	conn_cierra();



	return $fila;

}







/** @return void

*  @param string $sql

*  @desc Ejecuta un query en la base de datos. */

/*------------------------------------------------------------------- */

function conn_ejecuta ($sql)

{

	conn_abre();								//Abrimos la conexión



	@mysql_query($sql);							//Ejemcutamos query





	if (strpos($sql, "insert") !== false) {		//Devolvemos id insertado o filas afectadas.

	return (@mysql_insert_id());

	}

	else {

		return (@mysql_affected_rows());

	}

	conn_cierra();								//Cerramos la conexión

}



/*****************************/

function conn_array ($sql)

{

	conn_abre();

	$rs = mysql_query($sql) or die("MySQL Error:" . mysql_error() .  "<br><br>ERROR EN SQL: " . $sql);

	$matriz = array();												//Creamos el array

	while ($fila = mysql_fetch_array($rs)){

		$matriz[] = $fila;

	}

//	$fila = mysql_fetch_array($rs);

	conn_cierra();

	return $matriz;

}





/*****************************/

function conn_columna ($sql)

{

	conn_abre();

	$rs = mysql_query($sql) or die("MySQL Error:" . mysql_error() .  "<br><br>ERROR EN SQL: " . $sql);

	$matriz = array();												//Creamos el array

	while ($fila = mysql_fetch_array($rs)){

		$matriz[] = $fila[0];

	}

//	$fila = mysql_fetch_array($rs);

	conn_cierra();

	return $matriz;

}



/**------------------------------------------------------------------- */

/**

 * @return array()

 * @param string $tabla

 * @param string $columna

 * @desc Extra una columna entera de la tabla.

*/

function conn_extrae_columna($tabla, $columna, $orden = null, $direccion = "ASC")

{

	if (empty($orden)) 

		$orden = $columna;

		

	$sql = "SELECT * FROM ".$tabla." ORDER BY ".$orden." ".$direccion;

		

	conn_abre();



	$rs = mysql_query($sql);



	$matriz = array();

	$matriz2 = array();



	while ($fila = mysql_fetch_array($rs))

		$matriz[] = $fila[$columna];

	

	conn_cierra();

	return $matriz;

}



/**

* @return $campo

* @param string $tabla

* @param string $campo

* @param string $valor

* @desc Función para obtener un campo de un registro mediante su llave.



	$campos[0]="date_fecha";

	$campos[1]="2006-06-24";

	$campos[2]="txt_ciudad";

	$campos[3]="Moyobamba";		

	$valor=conn_obtiene_campo_condicion("tbl_diario", $campos, "pk_diario");

**/

/*------------------------------------------------------------------- */

function conn_obtiene_campo_condicion($tabla, $campos, $valor)

{



	$sql = "SELECT * FROM ".$tabla." WHERE ";	

	

	$k=0;

	$total_campos=(int)count($campos)/2;

	

	for($i=0;$i<$total_campos;$i++)

	{

	  $sql=$sql." ".$campos[$k]." = '".$campos[$k+1]."' ";	  

	  $k=$k+2;	

	  if(($total_campos-1)>$i)

	  {

	  	$sql=$sql." and ";

	  }

	  

	}

	

	conn_abre();



	$rs = mysql_query($sql);



	if(mysql_num_rows($rs) >= 1){

		while ($row = mysql_fetch_array($rs)) 

		{

			conn_cierra();

			return $row[$valor];

		}	

	}

	

	

	

}





//*****************************************************************************************************

//*********************************************FUNCIONES DE CADENAS************************************

//*****************************************************************************************************





/** @return string

*  @param string $p_cadena

*  @desc Convierte las primeras letras de un texto en Mayusculas 

*  Autor : Lloyd Dany Ruiz Inuma*/

/*------------------------------------------------------------------- */

function inc_completar_blancos($cant)

{

	$cad="";

	for($i=0;$i<$cant;$i++)

	{

			$cad=$cad."&nbsp;";

	}

	return $cad;

}



/** @return string

*  @param string $p_cadena

*  @desc Convierte las primeras letras de un texto en Mayusculas 

*  Autor : Lloyd Dany Ruiz Inuma*/

/*------------------------------------------------------------------- */

function inc_primer_parrafo_mayuscula($p_cadena)

{

	$cadena=trim($p_cadena);

	$cadena=strtolower($cadena);		

	$palabras = explode(" ", $cadena); //Partimos la cadena en palabras

	

	$primerparrafo=ucwords($palabras[0]);

	$texto="";

	for($i=1;$i<count($palabras);$i++)

	{

		$texto=$texto.$palabras[$i]." ";

	}

	

	$texto=$primerparrafo." ".$texto;

	return $texto;

}







/** @return string

*  @param string $p_cadena

*  @desc Convierte las primeras letras de un texto en Mayusculas 

*  Autor : Lloyd Dany Ruiz Inuma*/

/*------------------------------------------------------------------- */

function inc_primeras_letras_mayuscula($p_cadena)

{

	$cadena=trim($p_cadena);

	$cadena=strtolower($cadena);	

	$cadena=ucwords($cadena);

	return $cadena;

}

/** @return string

*  @param string $p_cadena

*  @desc Devuelve una cadena de caracteres en minusculas. 

*  Autor : Lloyd Dany Ruiz Inuma*/

/*------------------------------------------------------------------- */

function inc_convierte_minuscula($p_cadena)

{

	$cadena=trim($p_cadena);	

	$cadena=strtolower($cadena);

	return $cadena;

}



/** @return string

*  @param string $p_cadena

*  @desc Devuelve una cadena de caracteres en mayusculas. 

*  Autor : Lloyd Dany Ruiz Inuma*/

/*------------------------------------------------------------------- */

function inc_convierte_mayuscula($p_cadena)

{

	$cadena=trim($p_cadena);	

	$cadena=strtoupper($cadena);

	return $cadena;

}



/** @return string

*  @param string $p_mensaje

*  @desc reeemplaza caracteres especiales tildes, ñ, etc y los reemplaza por el contenido estandar

*  Autor : Lloyd Dany Ruiz Inuma */

/*------------------------------------------------------------------- */

function inc_renombra_imagen($p_mensaje)

{

	$p_mensaje=str_replace(" ","",$p_mensaje);		

		$p_mensaje=str_replace("/","_",$p_mensaje);		

	return $p_mensaje;	

}





/** @return string

*  @param string $p_mensaje

*  @desc reeemplaza caracteres especiales tildes, ñ, etc y los reemplaza por el contenido estandar

*  Autor : Lloyd Dany Ruiz Inuma */

/*------------------------------------------------------------------- */

function inc_caracteres_especiales($p_mensaje)

{

	$p_mensaje=str_replace("á","&aacute;",$p_mensaje);	

	$p_mensaje=str_replace("Á","&Aacute;",$p_mensaje);			

	$p_mensaje=str_replace("é","&eacute;",$p_mensaje);	

	$p_mensaje=str_replace("É","&Eacute;",$p_mensaje);			

	$p_mensaje=str_replace("í","&iacute;",$p_mensaje);	

	$p_mensaje=str_replace("Í","&Iacute;",$p_mensaje);			

	$p_mensaje=str_replace("ó","&oacute;",$p_mensaje);	

	$p_mensaje=str_replace("Ó","&Oacute;",$p_mensaje);			

	$p_mensaje=str_replace("ú","&uacute;",$p_mensaje);	

	$p_mensaje=str_replace("Ú","&Uacute;",$p_mensaje);		

	$p_mensaje=str_replace("Ñ","&Ntilde;",$p_mensaje);			

	$p_mensaje=str_replace("ñ","&ntilde;",$p_mensaje);			

	$p_mensaje=str_replace("¿","&iquest;",$p_mensaje);				

	$p_mensaje=str_replace('\"',"&ldquo;",$p_mensaje);					

	$p_mensaje=str_replace('\'',"&#8217;",$p_mensaje);		

	

	return $p_mensaje;	

}





/** @return string

*  @param string $p_cadena

*  @desc reeemplaza caracteres especiales y los escapa. 

*  Autor : Lloyd Dany Ruiz Inuma */

/*------------------------------------------------------------------- */

function inc_escapar_caracteres($p_mensaje)

{	

//	$p_mensaje=addslashes($p_mensaje);

	$p_mensaje=str_replace("'","\'",$p_mensaje);

//	$p_mensaje=str_replace('"','\"',$p_mensaje);

	return $p_mensaje;	

}





/**

* @return $string

* @param string $archivo

* @desc Función para extraer la extensión del archivo.

*/

/*------------------------------------------------------------------- */

function inc_saca_extension($archivo) {

	$punto = strrpos($archivo, ".") + 1;

	$extension = substr($archivo, $punto);

	return $extension;

}  





/**

* @return void

* @desc Función para extrar una cantidad determinadas de palabras.

*/

/*------------------------------------------------------------------- */

function inc_saca_descripcion($cadena, $cantidad) {

	$palabras = explode(" ", $cadena); //Partimos la cadena en palabras

	$resultado = "";



	if (count($palabras) < $cantidad) {		//Verificamos que la cantidad de palabras pedidas no sea mayor

		$cantidad = count($palabras) - 1;	//a las que vienen en la cadena, si es así lo corregimos.

	}



	for ($i = 0; $i <= $cantidad; $i++) { //Concatenamos la cantidad de palabras deseadas

		$resultado = $resultado . $palabras[$i] . " ";

	}



	return $resultado;	//Devolvemos la cadena formada

}



/**

* @return string

* @desc Función que formatea saltos de un formato de texto a formato html

*/

/*------------------------------------------------------------------- */

function inc_quita_spacio($texto) {

	$texto = str_replace(" ", "_", $texto);

	return $texto;

}



/**

* @return string

* @desc Función que formatea saltos de un formato de texto a formato html

*/

/*------------------------------------------------------------------- */

function inc_formatea_saltos2($texto) {

	$texto = str_replace("<br />", "\n", $texto);

	return $texto;

}

/**

* @return void

* @desc Función para quitar tags htmls de un texto

*/

/*------------------------------------------------------------------- */

function inc_quitahtml($texto) {

	$texto = strip_tags($texto);

	return $texto;

}



/**

* @return void

* @desc Función que verifica si un texto es numerico

*/

/*------------------------------------------------------------------- */

function inc_esnumerico($p_numero)

{

	$bol=true;

	for($i=0;$i<strlen($p_numero);$i++)

	{

			if(!(ord($p_numero[$i])<=57 && ord($p_numero[$i])>=48))

			{ $bol=false; 

			  break;

			}

	}	

	return $bol;

}



/**

* @return void

* @desc Función que devuelve un estado de 1 ó 0 a Si ó no

*/

/*------------------------------------------------------------------- */

function inc_devuelve_estado($p_estado)

{

	if($p_estado==1)

	{ return "Publicado"; }

	else{

	  return "No Publicado";

	}

}

/*function inc_devuelve_tipocupon($p_tipocup)

{

	if($p_tipocup==1)

	{ return "Familias"; }

	else{

	  return "Jovenes";

	}

}*/

function inc_devuelve_tipocat($p_tipocat)

{

	if($p_tipocat==1)

	{ return "Curso de Facultad"; }

	else{

	  return "Banco de Informaci&oacute;n";

	}

}



//*****************************************************************************************************

//*********************************************FUNCIONES DE MANEJO DE ARCHIVOS Y CARPETAS**************

//*****************************************************************************************************



/** @return void

*  @param string $file , string ruta, string $pag, array $extensiones_

*  @desc Adjunta un archivo al sistema

*  Autor : Lloyd Dany Ruiz Inuma

*/

/*------------------------------------------------------------------- */
function inc_cargar_cupon($file,$ruta,$pag="",$extensiones_,$id)

{	
$extensiones=$extensiones_;

	if (isset($_FILES[$file]['name']))
	{ 	// si estoy subiendo el archivo 
		$mensaje ="";
		$nombre=$_FILES[$file]['name'];			
		$var = explode(".",$nombre);
		$num = count($extensiones);
		$valor = $num-1;
		//$admitido=false;     //  para validar imagenes valor=false
		$admitido=true;

		for($i=0; $i<=$valor; $i++) {
			if($extensiones[$i] == $var[1]) {   
				$admitido=true;//es una extension valida
				break;
									}
		}

		$error=0;	

		if ($admitido)
			   {			   
					$nom1=str_replace(" ","",str_replace('.',"","cupon".$id));

//					$nombre=str_replace(" ","",inc_convierte_minuscula($nombre));					
//					$nombre = $nom. "." . inc_convierte_minuscula(inc_saca_extension($nombre));		   
					$ext=inc_convierte_minuscula(inc_saca_extension($nombre));		 
//					echo $ext;
					$nombre = $nom1.".".$ext;		
//					echo $nombre;					
//					die();  					
					$ruta=$ruta.$nombre; 								   
							if (is_uploaded_file($_FILES[$file]['tmp_name']))
							 {	  
									inc_borrar_archivo($ruta); //borra el archivo en caso exista
//graduarImagenes($wi,$he,$tamWCh,$tamHCh,$tamWGr,$tamHGr)
									copy($_FILES[$file]['tmp_name'], "$ruta");

									$archivo = file($ruta);

									return $nombre;
							 }

							else 

							{      $txtmensaje= "Error al subir el archivo. el tamaño del archivo puede ser muy grande"; 		

									header ("location: $pag?mensaje=$txtmensaje"); 
									die();
							}	
				}
			else 
				{ 
					$txtmensaje= "El archivo no tiene el formato necesario "; 
					header ("location: $pag?mensaje=$txtmensaje"); 				
					die();
				}	
	}			

	else

	{

		$txtmensaje = "No se ha podido copiar el archivo al servidor" ; 

		header ("location: $pag?mensaje=$txtmensaje"); 		

		die();

	}

	



}
function inc_cargar_datos($file,$ruta,$pag="",$extensiones_)

{	
$extensiones=$extensiones_;

	if (isset($_FILES[$file]['name']))
	{ 	// si estoy subiendo el archivo 
		$mensaje ="";
		$nombre=$_FILES[$file]['name'];			
		$var = explode(".",$nombre);
		$num = count($extensiones);
		$valor = $num-1;
		//$admitido=false;     //  para validar imagenes valor=false
		$admitido=true;

		for($i=0; $i<=$valor; $i++) {
			if($extensiones[$i] == $var[1]) {   
				$admitido=true;//es una extension valida
				break;
									}
		}

		$error=0;	

		if ($admitido)
			   {			   
					$nom1=str_replace(" ","",str_replace('.',"",microtime()));

//					$nombre=str_replace(" ","",inc_convierte_minuscula($nombre));					
//					$nombre = $nom. "." . inc_convierte_minuscula(inc_saca_extension($nombre));		   
					$ext=inc_convierte_minuscula(inc_saca_extension($nombre));		 
//					echo $ext;
					$nombre = $nom1.".".$ext;		
//					echo $nombre;					
//					die();  					
					$ruta=$ruta.$nombre; 								   
							if (is_uploaded_file($_FILES[$file]['tmp_name']))
							 {	  
									inc_borrar_archivo($ruta); //borra el archivo en caso exista
//graduarImagenes($wi,$he,$tamWCh,$tamHCh,$tamWGr,$tamHGr)
									copy($_FILES[$file]['tmp_name'], "$ruta");

									$archivo = file($ruta);

									return $nombre;
							 }

							else 

							{      $txtmensaje= "Error al subir el archivo. el tamaño del archivo puede ser muy grande"; 		

									header ("location: $pag?mensaje=$txtmensaje"); 
									die();
							}	
				}
			else 
				{ 
					$txtmensaje= "El archivo no tiene el formato necesario "; 
					header ("location: $pag?mensaje=$txtmensaje"); 				
					die();
				}	
	}			

	else

	{

		$txtmensaje = "No se ha podido copiar el archivo al servidor" ; 

		header ("location: $pag?mensaje=$txtmensaje"); 		

		die();

	}

	



}



function inc_cargar_datos_productos($file,$ruta,$pag="",$extensiones_)

{	
$extensiones=$extensiones_;

	if (isset($_FILES[$file]['name']))
	{ 	// si estoy subiendo el archivo 
		$mensaje ="";
		$nombre=$_FILES[$file]['name'];			
		$var = explode(".",$nombre);
		$num = count($extensiones);
		$valor = $num-1;
		$admitido=false;

		for($i=0; $i<=$valor; $i++) {
			if($extensiones[$i] == $var[1]) {   
				$admitido=true;//es una extension valida
				break;
									}
		}

		$error=0;	

		if ($admitido)
			   {			   
					$nom1=str_replace(" ","",str_replace('.',"",microtime()));

//					$nombre=str_replace(" ","",inc_convierte_minuscula($nombre));					
//					$nombre = $nom. "." . inc_convierte_minuscula(inc_saca_extension($nombre));		   
					$ext=inc_convierte_minuscula(inc_saca_extension($nombre));		 
//					echo $ext;
				//	$nombre = $nom1.".".$ext;		
//					echo $nombre;					
//					die();  					
					$ruta=$ruta.$nombre; 								   
							if (is_uploaded_file($_FILES[$file]['tmp_name']))
							 {	  
									inc_borrar_archivo($ruta); //borra el archivo en caso exista
//graduarImagenes($wi,$he,$tamWCh,$tamHCh,$tamWGr,$tamHGr)
									copy($_FILES[$file]['tmp_name'], "$ruta");

									$archivo = file($ruta);

									return $nombre;
							 }

							else 

							{      $txtmensaje= "Error al subir el archivo. el tamaño del archivo puede ser muy grande"; 		

									header ("location: $pag?mensaje=$txtmensaje"); 
									die();
							}	
				}
			else 
				{ 
					$txtmensaje= "El archivo no tiene el formato necesario "; 
					header ("location: $pag?mensaje=$txtmensaje"); 				
					die();
				}	
	}			

	else

	{

		$txtmensaje = "No se ha podido copiar el archivo al servidor" ; 

		header ("location: $pag?mensaje=$txtmensaje"); 		

		die();

	}

	



}


/**

 * @return void

 * @param void

 * @desc Elimina un archivo deseado

*/

/*------------------------------------------------------------------- */

function inc_borrar_archivo ($ruta)
{
	if($ruta != "")
	{
		if(file_exists($ruta))
		{
			unlink($ruta);
		}
	}
}


function rmdirtree($dirname) { 
   if (is_dir($dirname)) {    //Operate on dirs only 
       $result=array(); 
       if (substr($dirname,-1)!='/') {$dirname.='/';}    //Append slash if necessary 
       $handle = opendir($dirname); 
       while (false !== ($file = readdir($handle))) { 
           if ($file!='.' && $file!= '..') {    //Ignore . and .. 
               $path = $dirname.$file; 
               if (is_dir($path)) {    //Recurse if subdir, Delete if file 
                   $result=array_merge($result,rmdirtree($path)); 
               }else{ 
                   unlink($path); 
                   $result[].=$path; 
               } 
           } 
       } 
       closedir($handle); 
       rmdir($dirname);    //Remove dir 
       $result[].=$dirname; 
       return $result;    //Return array of deleted items 
   }else{ 
       return false;    //Return false if attempting to operate on a file 
   } 
}


/**

 * @return void

 * @param void

 * @desc crea una carpeta

*/

/*------------------------------------------------------------------- */

function inc_crea_carpeta($p_nombre,$p_ruta)						

{	

    if (!file_exists($p_ruta.$p_nombre))

	{	$creo = mkdir($p_ruta.$p_nombre,0777);

		return $creo;	}

	else

	{	return 0 ;}

}





//*****************************************************************************************************

//*********************************************FUNCIONES DE MANEJO DE FECHAS***************************

//*****************************************************************************************************



/**

 * @return texto

 * @param dia, mes, anio

 * @desc funcion que escribe los dias en un combo

*/

/*------------------------------------------------------------------- */

function inc_muestra_dia($p_dia="",$p_mes="",$p_anio="",$titulo="",$idioma="")

{



 if($titulo==0){

	 if($p_dia==""){ $p_dia=date("d");}

 }else{

 	if($idioma==1){

	 	 echo "<option value='' >Day</option>";					   	

	  }else{

		 echo "<option value='' >Dia</option>";					   		  

	  }

 }







 if($p_mes!="" && $p_anio!="" && $p_mes!="00" && $p_anio!="0000")

 {	

	   for($i=1;$i<=inc_retorna_dias($p_mes,$p_anio);$i++)

	   {

			$value=$i; $selected="";

			if($i<10) { $value="0".$i;}

			if($p_dia==$i){ $selected="selected";}							

			echo "<option value='".$value."' ".$selected.">".$i."</option>";					  

	   }

  }else{

  

	   for($i=1;$i<32;$i++)

	   {

			$value=$i; $selected="";

			if($i<10) { $value="0".$i;}		

			if($p_dia==$i){ $selected="selected";}										

			echo "<option value='".$value."' ".$selected.">".$i."</option>";					  

	   }

  

  }

  

}



/**

 * @return texto

 * @param dia, mes, anio

 * @desc funcion que escribe los meses en un combo

*/

/*------------------------------------------------------------------- */



function inc_muestra_mes($p_mes="",$p_formato="",$titulo="")

{



 if($titulo==0){

	if($p_mes==""){ $p_mes=date("m"); }

 }else{

 	if($p_formato>2){

	 	 echo "<option value='' >Month</option>";					   	

	  }else{

		 echo "<option value='' >Mes</option>";					   		  

	  }

 }





 for($i=1;$i<=12;$i++)

   {

    	$value=$i; $selected="";

		if($i<10) { $value="0".$i;}

		if($p_mes==$i){ $selected="selected";}							

        echo "<option value='".$value."' ".$selected.">".inc_nombre_mes($i,$p_formato)."</option>";					  

//        echo "<br>option value='".$value."' ".$selected."".inc_nombre_mes($i,$p_formato)."";					  		

   }

}



/**

 * @return texto

 * @param dia, mes, anio

 * @desc funcion que escribe los años en un combo

*/

/*------------------------------------------------------------------- */



function inc_muestra_anio($p_anio,$p_ini,$p_final,$titulo,$idioma)

{



 if($titulo==0){

	if($p_anio==""){ $p_anio=date("Y"); }

 }else{

 	if($idioma==1){

	 	 echo "<option value='' >Year</option>";					   	

	  }else{

		 echo "<option value='' >Año</option>";					   		  

	  }

 }

  

 for($i=$p_ini;$i<=$p_final;$i++)

   {

	    $selected="";

		if($p_anio==$i){ $selected="selected";}							

        echo "<option value='".$i."' ".$selected.">".$i."</option>";					  

   }

   

}



/**

 * @return texto

 * @param dia, mes, anio

 * @desc funcion que retorna los nombres de un mes segun el idioma

*/

/*------------------------------------------------------------------- */

function inc_nombre_mes($p_mes,$p_formato)

{



   switch ($p_mes)

	 	{			case 1 : $mes_esp = "Enero" ; $mes_esp_a="Ene"; $mes_eng="January"; $mes_eng_a="Jan"; break;

					case 2 : $mes_esp = "Febrero" ; $mes_esp_a="Feb"; $mes_eng="February"; $mes_eng_a="Feb"; break;

					case 3 : $mes_esp = "Marzo" ; $mes_esp_a="Mar"; $mes_eng="March"; $mes_eng_a="Mar"; break;

					case 4 : $mes_esp = "Abril" ; $mes_esp_a="Abr"; $mes_eng="April"; $mes_eng_a="Apr"; break;

					case 5 : $mes_esp = "Mayo" ; $mes_esp_a="May"; $mes_eng="May"; $mes_eng_a="May"; break;

					case 6 : $mes_esp = "Junio" ; $mes_esp_a="Jun"; $mes_eng="June"; $mes_eng_a="Jun"; break;

					case 7 : $mes_esp = "Julio" ; $mes_esp_a="Jul"; $mes_eng="July"; $mes_eng_a="Jul"; break;

					case 8 : $mes_esp = "Agosto" ; $mes_esp_a="Ago"; $mes_eng="August"; $mes_eng_a="Aug"; break;															

					case 9 : $mes_esp = "Septiembre" ; $mes_esp_a="Sep"; $mes_eng="September"; $mes_eng_a="Sep"; break;															

					case 10 : $mes_esp = "Octubre" ; $mes_esp_a="Oct"; $mes_eng="October"; $mes_eng_a="Oct"; break;															

					case 11 : $mes_esp = "Noviembre" ; $mes_esp_a="Nov"; $mes_eng="November"; $mes_eng_a="Nov"; break;															

					case 12 : $mes_esp = "Diciembre" ; $mes_esp_a="Dic"; $mes_eng="December"; $mes_eng_a="Dec"; break;															

															

		}

		

	switch($p_formato)

	{

	         case 1 : $mes=$mes_esp; break;//Enero

	         case 2 : $mes=$mes_esp_a; break;//Ene

	         case 3 : $mes=$mes_eng; break;//January

	         case 4 : $mes=$mes_eng_a;	break;//Jan		  			 			 

	}	

		

		return $mes;

}





/**

 * @return texto

 * @param dia, mes, anio

 * @desc funcion que retorna los nombres de los dias

*/

/*------------------------------------------------------------------- */

function inc_nombre_dia($p_dia,$p_formato)

{



   switch ($p_dia)

	 	{	

					case 0 : $dia_esp = "Domingo" ; $dia_esp_a="Dom"; $dia_eng="Sunday"; $dia_eng_a="Sun"; break;

					case 1 : $dia_esp = "Lunes" ; $dia_esp_a="Lun"; $dia_eng="Monday"; $dia_eng_a="Mon"; break;

					case 2 : $dia_esp = "Martes" ; $dia_esp_a="Mar"; $dia_eng="Tuesday"; $dia_eng_a="Tue"; break;

					case 3 : $dia_esp = "Miercoles" ; $dia_esp_a="Mie"; $dia_eng="Wednesday"; $dia_eng_a="Wed"; break;

					case 4 : $dia_esp = "Jueves" ; $dia_esp_a="Jue"; $dia_eng="Thursday"; $dia_eng_a="Thu"; break;

					case 5 : $dia_esp = "Viernes" ; $dia_esp_a="Vie"; $dia_eng="Friday"; $dia_eng_a="Fri"; break;

					case 6 : $dia_esp = "Sabado" ; $dia_esp_a="Sab"; $dia_eng="Saturday"; $dia_eng_a="Sat"; break;



															

		}

		

	switch($p_formato)

	{

	         case 1 : $dia=$dia_esp; break;//Enero

	         case 2 : $dia=$dia_esp_a; break;//Ene

	         case 3 : $dia=$dia_eng; break;//January

	         case 4 : $dia=$dia_eng_a;	break;//Jan		  			 			 

	}	

		

		return $dia;

}





/**

 * @return numero de dias

 * @param mes, anio

 * @desc funcion que retorna el numero de dias del mes, dependiendo del año 

*/

/*------------------------------------------------------------------- */

function inc_retorna_dias($p_mes,$p_anio)

{

	switch($p_mes)

	{

		case "1" :  $mes=31;   break;

		case "2" :  

					if(($p_anio%4==0) || ($p_anio%400==0 && $p_anio%100==0))

					{

						$mes=29;   

					}

					else

					{

						$mes=28;   

					}

					break;

					

		case "3" :  $mes=31;   break;

		case "4" :  $mes=30;   break;

		case "5" :  $mes=31;   break;

		case "6" :  $mes=30;   break;

		case "7" :  $mes=31;   break;

		case "8" :  $mes=31;   break;

		case "9" :  $mes=30;   break;

		case "10" : $mes=31;   break;

		case "11" :	$mes=30;   break;

		case "12" :	$mes=31;   break;

	}

	return $mes;

}



/**

 * @return numero de dias

 * @param fecha1, fecha2

 * @desc obtiene la diferencia de en dias entre dos fechas

*/

/*------------------------------------------------------------------- */

function inc_resta_fechas($fecha1,$fecha2)

{

      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha1))

          list($anio1,$mes1,$dia1)=split("-",$fecha1);     	  

           

      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha2))

          list($anio2,$mes2,$dia2)=split("-",$fecha2);	  

     

	    $dif = mktime(0,0,0,$mes1,$dia1,$anio1) - mktime(0,0,0,$mes2,$dia2,$anio2);

        $ndias=abs(floor($dif/(24*60*60)));

        return($ndias);             

}



/**------------------------------------------------------------------- */

/**

 * @return string

 * @param string $fecha

 * @desc Obtiene el dia de la semana

*/

function inc_obtiene_dia_semana($fecha,$formato){



	$anno = substr($fecha, 0, 4);

	$mes = substr($fecha, 5, 2);

	$dia =  substr($fecha, 8, 2);



	$n_dia = date('w', mktime(0,0,0,$mes,$dia,$anno));

		

	$dia=inc_nombre_dia($n_dia,$formato);	

	return $dia;	

}



/*

* @return int

* @desc Obtiene el número de años dada una fecha.

*/

/*------------------------------------------------------------------- */	

function inc_obtiene_edad($fecha)

{

	//Datos fecha actual

	$anno_actual = date('Y');

	$mes_actual = date('m');

	$dia_actual = date('d');

		

	//Datos fecha dada

	$anno = substr($fecha, 0, 4);

	$mes = substr($fecha, 5, 2);

	$dia =  substr($fecha, 8, 2);



	//Obtiene la edad

	if($anno_actual > $anno)  

	{

		if($mes_actual >= $mes)

		{

			if($dia_actual >= $dia)

				$edad = $anno_actual - $anno;

			else

				$edad = ($anno_actual - $anno) - 1;

		}

		else 	

			$edad = ($anno_actual - $anno) - 1;

	}

	else

		$edad = 0;

		

	return $edad;

}





/* Obtiene las horas:minutos:segundos entre dos horas dadas */

/*************************************************/

function inc_diferencia_horas($hora1, $hora2){



	if($hora1<$hora2)

	{

		$hora3=$hora2;

		$hora2=$hora1;

		$hora1=$hora3;

	

	}

	//Extrae los datos (horas:minutos:segundos) de hora1

	$h1 = substr($hora1, 0, 2); 

	$m1 = substr($hora1, 3, 2); 

	$s1 = substr($hora1, 6, 2); 

	//Extrae los datos (horas:minutos:segundos) de hora2

	$h2 = substr($hora2, 0, 2); 

	$m2 = substr($hora2, 3, 2); 

	$s2 = substr($hora2, 6, 2); 

	if($s1>=$s2) {

		$s3 = $s1 - $s2;

		if($m1>=$m2) {

			$m3 = $m1 - $m2;

			$h3 = $h1 -  $h2;

		}

		else { 	

			$m3 = $m1 + (60-$m2);

			$h3 = $h1 -  $h2 - 1;

		}

	}

	else {

		$s3 = $s1 + (60-$s2);

		if($m1>=$m2) {

			$m3 = $m1 - $m2 - 1;

			$h3 = $h1 -  $h2;

		}

		else { 	

			$m3 = ($m1 + (60-$m2)) - 1;

			$h3 = $h1 -  $h2 - 1;

		}

	}

	if(strlen($h3)==1)

		$h3 = "0".$h3;

	if(strlen($m3)==1)

		$m3 = "0".$m3;

	if(strlen($s3)==1)

		$s3 = "0".$s3;

	

	$hora3 = $h3.":".$m3.":".$s3;

	

	return $hora3;

}



/*

* @return int

* @desc da formato a las fechas para mostrar al usuario o para los procesos del sistema

*/

function inc_invertir_fecha($fecha,$caso)

{	

	if($caso==1)

	{   //tipo de 01-12-2005 a 2005-04-10

		$fecha_invertida = substr($fecha,6,4) ."-". substr($fecha,3,2) ."-".substr($fecha,0,2);

	}elseif($caso==2)

	{  //tipo de 2006-12-04 a 10-04--2005

		$fecha_invertida = substr($fecha,8,2) ."-". substr($fecha,5,2) ."-".substr($fecha,0,4);

	}

	

	if($fecha_invertida=="--"){ $fecha_invertida=""; }

	return $fecha_invertida;

	

}



/*

* @return int

* @desc resta o suma n dias de una fecha dada y da la fecha encontrada

*/

function inc_obtenerfecha_con_dias($p_dia, $date,$operador) {



if (isset($date)) { $date = time(); }

list($hora, $min, $seg, $dia, $mes, $anno) = explode( " ", date( "H i s d m Y"));



if($operador=="-"){

	$d = $dia - $p_dia;

}elseif($operador=="+"){

	$d = $dia + $p_dia;

}



$fecha = date("Y-m-d", mktime($hora, $min, $seg, $mes, $d, $anno));



return $fecha;



}



/*

* @return int

* @desc resta o suma n dias de una fecha dada y da la fecha encontrada

*/



function inc_formato_fecha($p_fecha,$formato)

{  

	$timestamp=strtotime($p_fecha);

	

	$dia_semana=inc_nombre_dia(date('w',$timestamp),$formato);

	$mes=inc_nombre_mes(date('n',$timestamp),$formato);

	

	$dia  =	date('d',$timestamp);

	$anio = date('Y',$timestamp);

	$ampm = date('a',$timestamp);

	$hora = date('h',$timestamp);

	$min  =	date('i',$timestamp);

	$seg  =	date('s',$timestamp);	

	

	if($formato<3){

	   	$fecha = $dia_semana." ".$dia." de ".$mes." del ".$anio."<br>hora: ".$hora.":".$min.":".$seg." ".$ampm;

	}else{

	   	$fecha = $dia_semana." - ".$mes." ".$dia."  ".$anio."<br>Time: ".$hora.":".$min.":".$seg." ".$ampm;	

	}

 return $fecha;

 

}





/*

* @return int

* @desc funcion que compara dos fechas y retorna si la primera es mayor que la segunda

*/

function inc_compara_fechas($fecha1,$fecha2="")

{



if($fecha2=="")// en caso no se envia la segunda fecha, la obtenemos del sistema

{

	$dia2=date("d");

	$mes2=date("m");

	$ano2=date("Y");												

}else

{

	$dia2=substr($fecha2,6,2);

	$mes2=substr($fecha2,3,2);

	$ano2=substr($fecha2,0,4);

}



	$dia1=substr($fecha1,8,2);

	$mes1=substr($fecha1,5,2);

	$ano1=substr($fecha1,0,4);

	



	$dif = mktime(0,0,0,$mes1,$dia1,$ano1) - mktime(0,0,0, $mes2,$dia2,$ano2);



	if($dif>0)

	{	

	//	echo "<br>fecha1 es mayor que fecha2";	t

		return 1;

	}else

	{	

		if($dif==0){

	//		echo "<br>fecha2 es igual que fecha 1";	

			return 0; 		

		}else{

	//		echo "<br>fecha2 es mayor que fecha 1";

			return -1; 		

		}

	}

}





//*****************************************************************************************************

//*********************************************FUNCIONES DE MANEJO DE NAVEGADOR************************

//*****************************************************************************************************





/*

* @return int

* @desc Esta función se encarga de obtener la dirección IP de la máquina

*/

/*******************************************************************/

function inc_obtiene_ip()

{

	if ($_SERVER["HTTP_X_FORWARDED_FOR"]) 

		$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];

	else

		$realip = $_SERVER["REMOTE_ADDR"];

	

	return $realip;

}











//*****************************************************************************************************

//*********************************************FUNCIONES MANEJOR DE CORREOS ***************************

//*****************************************************************************************************





/*

* @return int

* @desc funcion que envia correos electronicos en formato html

*/

/*******************************************************************/

function inc_envio_mail($mail_destino,$asunto,$mensaje,$datos_remitente)

{

	//para el envío en formato HTML 

	$headers = "MIME-Version: 1.0\n"; 

	$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 

	$headers .= "From: $datos_remitente\n"; 

	//$headers .= "Reply-To: $responder_a\r\n"; 

	

	$resultado=mail($mail_destino,$asunto,$mensaje,$headers);

	return $resultado;

}











//*****************************************************************************************************

//*********************************************FUNCIONES PROPIAS DEL SISTEMA **************************

//*****************************************************************************************************





/************************************************************/

function inc_carga_empresa($p_combo)

{



  $sql="select id_empresa from emp_empresa order by nombre";

  $lista=conn_array ($sql);	

  $codigo = $lista[$i][0];  



  $i=0;				

	

  while($i<count($lista))  	  

	  {  	  

	  

	  	$empresa= new cls_emp_empresa($lista[$i][0]);

		

		$selected="";

		if($empresa->getId_empresa()==$p_combo)

		{	$selected="selected";     }

		

		   echo "<option value='".$empresa->getId_empresa()."' $selected > ".$empresa->getNombre()."</option>";		

	      $i=$i+1;

	    }

}



/************************************************************/

function inc_carga_categoria($p_combo)

{



  $sql="select id_categoria from emp_categoria order by id_categoria";

  $lista=conn_array ($sql);	

  $codigo = $lista[$i][0];  



  $i=0;				

	

  while($i<count($lista))  	  

	  {  	  

	  

	  	$categoria= new cls_emp_categoria($lista[$i][0]);

		

		$cat_idioma = $categoria->getArr_categoria_idioma();

		$nombre="";

		

		for($k=0;$k<count($cat_idioma);$k++)

		{

				$categoria_idioma =  new cls_emp_categoria_idioma($cat_idioma[$k]);

				$nombre = $nombre." - ".$categoria_idioma->getNombre();		

		}  

		

		$selected="";

		if($categoria->getId_categoria()==$p_combo)

		{	$selected="selected";     }

		

		//   echo "<br>".$categoria->getId_categoria()."' $selected ".$nombre."";		

		   echo "<option value='".$categoria->getId_categoria()."' $selected > ".$nombre."</option>";				   

	      $i=$i+1;

	    }

}



/************************************************************/

function inc_carga_moneda($p_combo)

{

  $sql="select id_moneda from emp_moneda order by nombre";

  $lista=conn_array ($sql);	

  $codigo = $lista[$i][0];  



  $i=0;				

	

  while($i<count($lista))  	  

	  {  	  

	  

	  	$moneda= new cls_emp_moneda($lista[$i][0]);

		

		$selected="";

		if($moneda->getId_moneda()==$p_combo)

		{	$selected="selected";     }

		

		   echo "<option value='".$moneda->getId_moneda()."' $selected > ".$moneda->getNombre()."</option>";		

	      $i=$i+1;

	    }

}





function inc_completar_espacios($texto,$cantidad)

{

	$longitud=strlen($texto);

	$tamanio=$cantidad-$longitud;

	if($tamanio>0)

	{

			for($i=0;$i<$tamanio;$i++)

			{

				$espacios="&nbsp;".$espacios;			

			}	

	}

	

	return $texto.$espacios;



}


   function Determinames($imes)

   {
     switch($imes)
	 {
	 case 1: $nmes="Enero"; break;
	 case 2: $nmes="Febrero"; break;
	 case 3: $nmes="Marzo"; break;
	 case 4: $nmes="Abril"; break;
	 case 5: $nmes="Mayo"; break;
	 case 6: $nmes="Junio"; break;
     case 7: $nmes="Julio"; break;
	 case 8: $nmes="Agosto"; break;
	 case 9: $nmes="Setiembre"; break;
     case 10: $nmes="Octubre"; break;
	 case 11: $nmes="Noviembre"; break;
	 case 12: $nmes="Diciembre"; break;		
	 }
	  return $nmes;

  }//fin de la funcion

////////////////////////////////////////////////////
//Convierte fecha de mysql a normal
////////////////////////////////////////////////////
function cambiaf_a_normal($fecha){
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
    return $lafecha;
}

////////////////////////////////////////////////////
//Convierte fecha de normal a mysql
////////////////////////////////////////////////////

function cambiaf_a_mysql($car_fecha){

    ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];

    return $lafecha;
}


function graduarImagenes($wi,$he,$tamWCh,$tamHCh,$tamWGr,$tamHGr)
{	$cortaW=0;
	$cortaH=0;
	$wiReal=0;
	$heReal=0;
	if($wi<=$tamWCh)
	{	$wiC=$wi;
		$wiG=$wi;
		if($he<=$tamHCh)
		{	$heC=$he;
			$heG=$he;
		}
		if($he>$tamHCh)
		{	$heC=$tamHCh;
			$cortaH=1;
			$heReal=he;
			$heG=$he;
			if($he<=$tamHGr)
				$heG=$he;
			else
			{	$wi2=$wi*$tamHGr;
				$wi2=(((int)$wi2)/(int)$he);
				$wiG=round($wi2,0);
				$heG=$tamHGr;
			}
		}
	}
	else
	{	if($he<=tamHCh)
		{	$wiC=tamWCh;	
			$cortaW=1;
			$wiReal=$wi;
			$heC=$he;
			$heG=$he;
			if($wi>$tamWGr)
			{	$wi2=(int)$he*$tamWGr;
				$he2=(((int)$wi2)/(int)$wi);
				$heG=round($he2,0);
				$wiG=$tamWGr;
			}
			else
				$wiG=$wi;
			if($he>$tamHGr)
			{	$wi2=$wi*$tamHGr;
				$wi2=(((int)$wi2)/(int)$he);
				$wiG=round($wi2,0);
				$heG=$tamHGr;
			}
		}
		else
		{	//IMAGENES CHICAS
			if($wi>$he)
			{	$wi2=$wi*$tamHCh;
				$wi2=(((int)$wi2)/(int)$he);
				$wiC=round($wi2,0);
				$heC=$tamHCh;
				if($wiC>$tamWCh)
					$cortaW=1;
				if($wiC<$tamWCh)
				{	$wi2=(int)$he*$tamWCh;
					$he2=(((int)$wi2)/(int)$wi);
					$heC=round($he2,0);
					$wiC=$tamWCh;
					$cortaH=1;
				}
			}
			else
			{	$wi2=(int)$he*$tamWCh;
				$he2=(((int)$wi2)/(int)$wi);
				$heC=round($he2,0);
				$wiC=$tamWCh;
				if($heC>$tamHCh)
					$cortaH=1;
				if($heC<$tamHCh)
				{	$wi2=$wi*$tamHCh;
					$wi2=(((int)$wi2)/(int)$he);
					$wiC=round($wi2,0);
					$heC=$tamHCh;
					$cortaW=1;
				}
			}
			//IMAGENES GRANDES
			if((int)$wi<=$tamWGr)
			{	$wiG=$wi;
				$heG=$he;
			}
			else
			{	$wi2=(int)$he*$tamWGr;
				$he2=(((int)$wi2)/(int)$wi);
				$heG=round($he2,0);
				$wiG=$tamWGr;
			}
			if($he>$tamHGr)
			{	$wi2=$wi*$tamHGr;
				$wi2=(((int)$wi2)/(int)$he);
				$wiG=round($wi2,0);
				$heG=$tamHGr;
			}
		}
	}
	
	return $wiC.",".$heC.",".$wiG.",".$heG.",".$cortaW.",".$cortaH;
}
##Deluxe 12.05.09

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

##19.05.2009
function verCupon($idcupon,$socio,$cupon){
	conn_abre ();
	$campo="fecha_fimp".$idcupon;
	$sql="select $campo from tbl_imprimir where id_cupon='1' and id_socio='$socio' and $campo<>''";
	$row=mysql_query($sql) or die("Error : ".mysql_error());
	$imp=mysql_fetch_row($row);
	if($imp>0){
		$img="cupon0.jpg";
		return $img;
	}else{
		$img=$cupon;
		return $img;
	}
}
function FillSem($fecha){
$nFecha=strtotime($fecha) ;
$NumSem = date("W", $nFecha) - date("W",strtotime(date("Y-m-01"))) + 1;
return $NumSem;
}

function SemActual($sa,$socio){
	$sw=0;
	conn_abre();
	$sql="select * from tbl_imprimir where id_cupon='1' and id_socio='$socio'";
	$row=mysql_query($sql) or die("Error : ".mysql_error());
	while($rs=mysql_fetch_array($row)){
		if($rs['fecha_fimp1']!=""){
			$sbd1=FillSem($rs['fecha_fimp1']);
			if($sbd1==$sa){$sw=1;break;}
		}
		if($rs['fecha_fimp2']!=""){
			$sbd2=FillSem($rs['fecha_fimp2']);
			if($sbd2==$sa){$sw=1;break;}
		}
		if($rs['fecha_fimp3']!=""){
			$sbd3=FillSem($rs['fecha_fimp3']);
			if($sbd3==$sa){$sw=1;break;}
		}
		if($rs['fecha_fimp4']!=""){
			$sbd4=FillSem($rs['fecha_fimp4']);
			if($sbd4==$sa){$sw=1;break;}
		}
		if($rs['fecha_fimp5']!=""){
			$sbd5=FillSem($rs['fecha_fimp5']);
			if($sbd5==$sa){$sw=1;break;}
		}
	}
	return $sw;
}
function getVal($tabla,$campo,$condi){
	conn_abre();
	$sql="select $campo from $tabla $condi";
	$rs=mysql_query($sql) or die(mysql_error());
	$val = mysql_fetch_array($rs);
    return $val[$campo];
}
// #FUNCTIONS#######################################
function factors($n)
{

	$div = Array(1);

	for ($i=1; $i<= ($n/2); $i++)
		if ($n % $i == 0)
			$div[] = $i;

	$div[] = $n;

	return $div;
}
// #FUNCTIONS#######################################
function hasAconvenientDiv($div)
{
    $divs = Array(8,7,6,5,4);
    foreach ($divs as $k => $v)
	if (in_array($v,$div))
	    return $v;
    return 0;
}

function valServer($x=""){
conn_abre();
$sever=gethostbyaddr($_SERVER['REMOTE_ADDR']);
$ip=$_SERVER['REMOTE_ADDR'];
$ahora = date("Y-n-j H:i:s");
$sql="insert into tbl_log$x(txt_ip, txt_server, txt_time) values('$ip','$sever','$ahora')";
$rs=mysql_query($sql) or die(mysql_error());
}
function fillServer($x=""){
conn_abre();
$ip=$_SERVER['REMOTE_ADDR'];
$sql="select * from tbl_log$x where txt_ip='$ip'";
$rsl=mysql_query($sql) or die(mysql_error());
$rs=mysql_fetch_array($rsl);
//echo "<br>ip en la base de datos ".$rs['txt_ip'];
if($rs['txt_ip']!=""){
	$val = array( "ip" => $rs['txt_ip'],"server" => $rs['txt_server'],"time" => $rs['txt_time']);
	return $val;
}else{
	return 0;
}

}

function resetServer($x=""){
$ip=$_SERVER['REMOTE_ADDR'];
$sql="delete from tbl_log$x where txt_ip='$ip'";
mysql_query($sql) or die(mysql_error());
}
function sumTot($campo,$id){
conn_abre();
$query = "SELECT SUM($campo) as total FROM tbl_respuesta where id_encuesta='$id'"; 	 
$result = mysql_query($query);
$row = mysql_fetch_array($result);
return $row['total'];
}
function getCountReg($tabla,$swRs="") {
		conn_abre ();
		$sql="SELECT COUNT(*) FROM $tabla $swRs";
        $total = mysql_query($sql) or die(mysql_error());
        $total = mysql_fetch_array($total);
        return $total[0];
}
function is_chrome(){
	$key="chrome";
   return(preg_match('/'.$key.'/i', $_SERVER['HTTP_USER_AGENT']));
}
?>