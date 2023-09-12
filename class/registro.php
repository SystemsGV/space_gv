<?
Class Registro extends Connection
 {

var   $id;
var   $pregunta;
var   $fecha;
var   $linker;
var   $rs;       
      function Registro()
	{
		$conex=new Connection();
		$this->linker=$conex->Conect();	
	}

     function getRegistro($id="")
      {
	if(isset($id))
	{$sql="select * from registros";	}
	else
	{$sql="select * from registros";	}

	$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());

	while($rows=mysql_fetch_array($this->rs))	
		{
		$question[]=array('idreg'=>$rows['id'],
				'nombre'=>$rows[nombre],
				'apellido'=>$rows[apellido],
				'fecnac'=>$rows[fec_nac],
				'sexo'=>$rows[sexo],	
				'civil'=>$rows[estado_civil],
				'tipodoc'=>$rows[tipo_doc],
				'numdoc'=>$rows[numero_doc],
				'fono'=>$rows[fono],
				'celular'=>$rows[celular],
				'correo'=>$rows[correo],
				'musica'=>$rows[musica],
				'cerveza'=>$rows[chela],
				'licor'=>$rows[licor],
				'diastono'=>$rows[dias_tono],
				'lugartono'=>$rows[lugar_tono],
				'cigarro'=>$rows[cigarro],
				'promocion'=>$rows[promocion]);			
		}

	return $question;
     }
 function deleteRegistro($id)
	{
	$sql="delete from registros where id='$id'";
	$num=mysql_query($sql,$this->linker)or die(mysql_error());
	}
function setRegistro($nom,$ape,$fecnac,$sexo,$estadocivil,$tipodoc,$numero,$fono,$celular,$correo,$musica,$chela,$licor,$cigarro,$diasjuerga,$lugarjuerga,$promo)
	{
	$sql="insert into registros values('','$nom','$ape','$fecnac','$sexo','$estadocivil','$tipodoc','$numero','$fono','$celular','$correo','$musica','$chela','$licor','$cigarro','$diasjuerga','$lugarjuerga','$promo')";	
	$num=mysql_query($sql,$this->linker)or die(mysql_error());
	

	return $num;
	}
function updatedata($id,$correo,$promo)
	{
	$sql="update registros set promocion='$promo',correo='$correo' where id='$id' ";
	$num=mysql_query($sql,$this->linker)or die(mysql_error());
	return $num;
	}
function getCorreoPromocion()
{
$sql="select * from registros where promocion='SI' ";
$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());

	while($rows=mysql_fetch_array($this->rs))	
		{
		$question[]=array('idreg'=>$rows['id'],
				'nombre'=>$rows[nombre],
				'apellido'=>$rows[apellido],
				'fecnac'=>$rows[fec_nac],
				'sexo'=>$rows[sexo],	
				'civil'=>$rows[estado_civil],
				'tipodoc'=>$rows[tipo_doc],
				'numdoc'=>$rows[numero_doc],
				'fono'=>$rows[fono],
				'celular'=>$rows[celular],
				'correo'=>$rows[correo],
				'musica'=>$rows[musica],
				'cerveza'=>$rows[chela],
				'licor'=>$rows[licor],
				'diastono'=>$rows[dias_tono],
				'lugartono'=>$rows[lugar_tono],
				'cigarro'=>$rows[cigarro],
				'promocion'=>$rows[promocion]);			
		}
	return $question;
}
};
?>