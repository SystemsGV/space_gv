<?
Class Encuesta extends Conexion
{	var   $id;
	var   $pregunta;
	var   $fecha;
	var   $linker;
	var   $rs;       
	function Encuesta()
	{	$conex=new Conexion();
		$this->linker=$conex->Conectar();	
	}

    function getPregunta($id)
    {	$sql="select * from encuesta where id_encuesta='$id'";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num==1)
		{	$question=mysql_result($this->rs,0,"pregunta");	}
		else
		{	$question="-";	}	
		return $question;
    }

    function getTipo($id)
    {	$sql="select * from encuesta where id_encuesta='$id'";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num==1)
		{	$question=mysql_result($this->rs,0,"tipo");	}
		else
		{	$question="-";	}
		return $question;
	}
	
	function getAlternativaSingle($idA,$idB)
    {	$sql="select * from alternativa where id_encuesta='$idA' and id_alternativa='$idB'";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num==1)
		{	$question=mysql_result($this->rs,0,"alternativa");	}
		else
		{	$question="-";	}	
		return $question;
	}	 
	
	function setActualizarEncuesta($id_nencuesta)
	{	$sqlinsert="UPDATE nencuesta SET publicado= 0";
		mysql_query($sqlinsert)or die(mysql_error());
		$sqlinsert="UPDATE nencuesta SET publicado= 1 WHERE id_nencuesta=$id_nencuesta";
		mysql_query($sqlinsert)or die(mysql_error());
	}
	
	function setInsertNencuesta($nombre,$publicado)
	{	if($publicado=="1")
		{	$sql="UPDATE nencuesta SET publicado= 0";
			mysql_query($sql)or die(mysql_error());
		}
		$sql="select max(id_nencuesta)+1 as max from nencuesta";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$idNenc=mysql_result($this->rs,0,"max");
		if(empty($idNenc))
			$idNenc=1;
		$sql="INSERT INTO nencuesta VALUES ($idNenc, '$nombre', $publicado)";
		mysql_query($sql)or die(mysql_error());
	}
	
	function setUpdateNencuesta($id,$nombre,$publicado)
	{	if($publicado=="1")
		{	$sql="UPDATE nencuesta SET publicado= 0";
			mysql_query($sql)or die(mysql_error());
		}
		$sql="UPDATE nencuesta SET nombre= '$nombre', publicado=$publicado WHERE id_nencuesta=$id";
		mysql_query($sql)or die(mysql_error());
	}
	
	function setDeleteEncuesta($id)
	{	$sql="select id_encuesta from encuesta where id_nencuesta=$id";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num=="0")
		{	$sql="DELETE from nencuesta WHERE id_nencuesta=$id";
			mysql_query($sql)or die(mysql_error());
			$datos=1;
		}
		else
			$datos=0;
		return $datos;
	}
		
	function getNencuesta()
	{	$sql="select * from nencuesta order by publicado desc";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num>0)
		{
			while($rows=mysql_fetch_array($this->rs))
				 {$datos[]=array('id_nencuesta'=>$rows['id_nencuesta'],'nombre'=>$rows['nombre'],'publicado'=>$rows['publicado']);}	
		}		
		else
		{	$datos="-";	}
	
		return $datos;
	}
	
	function getSingleNencuesta($id)
	{	$sql="select * from nencuesta where id_nencuesta=$id";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num>0)
		{
			while($rows=mysql_fetch_array($this->rs))
				 {$datos[]=array('id_nencuesta'=>$rows['id_nencuesta'],'nombre'=>$rows['nombre'],'publicado'=>$rows['publicado']);}	
		}		
		else
		{	$datos="-";	}	
		return $datos;
	}
	
	function getPreguntas($id)
	{	$sql="select * from encuesta where id_nencuesta=$id";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num>0)
		{
			while($rows=mysql_fetch_array($this->rs))
				 {$datos[]=array('id_encuesta'=>$rows['id_encuesta'],'pregunta'=>$rows['pregunta'],'tipo'=>$rows['tipo']);}	
		}		
		else
		{	$datos="-";	}	
		return $datos;
	}
	
	function getSinglePreguntas($id)
	{	$sql="select * from encuesta where id_encuesta=$id";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num>0)
		{
			while($rows=mysql_fetch_array($this->rs))
				 {$datos[]=array('id_encuesta'=>$rows['id_encuesta'],'id_nencuesta'=>$rows['id_nencuesta'],'pregunta'=>$rows['pregunta'],'fecha'=>$rows['fecha'],'tipo'=>$rows['tipo']);}	
		}		
		else
		{	$datos="-";	}	
		return $datos;
	}
	
	function setInsertEncuesta($id_nencuesta,$pregunta,$fecha,$tipo)
	{	$sql="select max(id_encuesta)+1 as max from encuesta";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$idNenc=mysql_result($this->rs,0,"max");
		if(empty($idNenc))
			$idNenc=1;
		$sql="INSERT INTO encuesta VALUES ($idNenc, $id_nencuesta, '$pregunta', '$fecha', $tipo)";
		mysql_query($sql)or die(mysql_error());
	}
	
	function setUpdateEncuesta($id,$pregunta,$fecha)
	{	$sql="UPDATE encuesta SET pregunta= '$pregunta', fecha= '$fecha 'WHERE id_encuesta=$id";
		mysql_query($sql)or die(mysql_error());
	}
	
	function setDeletePregunta($id)
	{	$sql="DELETE FROM encuesta WHERE id_encuesta=$id";
		mysql_query($sql)or die(mysql_error());
	}
	
   	function getAlternativas($id)
	{	$sql="select * from alternativa where id_encuesta='$id' order by id_alternativa asc";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num>0)
		{	while($rows=mysql_fetch_array($this->rs))
 		    {	$options[]=array('id_alternativa'=>$rows['id_alternativa'],'alternativa'=>$rows['alternativa'],'puntos'=>$rows['puntos']);	}	
		}		
		else
		{	$options="-";	}	
		return $options;
	}

	function getSingleAlternativa($id)
	{	$sql="select * from alternativa where id_alternativa=$id";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num>0)
		{
			while($rows=mysql_fetch_array($this->rs))
				 {$datos[]=array('id_alternativa'=>$rows['id_alternativa'],'id_encuesta'=>$rows['id_encuesta'],'alternativa'=>$rows['alternativa'],'puntos'=>$rows['puntos']);}	
		}		
		else
		{	$datos="-";	}	
		return $datos;
	}
	
	function setInsertAlternativa($idEncuesta,$alternativa,$puntos)
	{	$sql="select max(id_alternativa)+1 as max from alternativa";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$idNenc=mysql_result($this->rs,0,"max");
		if(empty($idNenc))
			$idNenc=1;
		$sql="INSERT INTO alternativa VALUES ($idNenc, $idEncuesta, '$alternativa', $puntos)";
		mysql_query($sql)or die(mysql_error());					
	}
	
	function setUpdateAlternativa($idAlt,$alternativa,$puntos)
	{	$sql="UPDATE alternativa SET alternativa= '$alternativa', puntos=$puntos WHERE id_alternativa=$idAlt";
		mysql_query($sql)or die(mysql_error());
	}
	
	function setDeleteAlternativa($idAlt)
	{	$sql="DELETE FROM alternativa WHERE id_alternativa=$idAlt";
		mysql_query($sql)or die(mysql_error());
	}
	
	/**/

    function setPuntosAlternativas($idencuesta,$datos)
	{$cc=0;
	 // for($i=0;$i<sizeof($datos);$i++)
	//	{
		 $puntoactual=0;$neopunto=0;
		 $puntoactual=Encuesta::getPuntos($idencuesta,$datos);		 
		 $puntoactual++;
		 $neopunto=$puntoactual;
		 $sqlinsert="update alternativa set puntos='$neopunto' where id_alternativa='$datos' and id_encuesta='$idencuesta' ";
		 $t=mysql_query($sqlinsert)or die(mysql_error());
		$cc=$cc+$t;
		//echo $sqlinsert."<br>";
	//	}
	 return $cc;
	}	

   function getPuntos($idencuesta,$idalternativa)
	{
	$sql="select puntos from alternativa where id_encuesta='$idencuesta' and id_alternativa='$idalternativa'";		
	$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
	$num=mysql_num_rows($this->rs);
	if($num==1)
		{$puntos=mysql_result($this->rs,0,"puntos");}	
	else
		{$puntos=0;}	
	
	return $puntos;

	

	}
 	function getEncuestaActiva()
	{	$sql="select * from nencuesta where publicado=1";
		$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
		$num=mysql_num_rows($this->rs);
		if($num>0)
		{	$id=mysql_result($this->rs,0,"id_nencuesta");
			$sql="select * from encuesta where id_nencuesta=$id";		
			$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
			$num=mysql_num_rows($this->rs);
			while($rows=mysql_fetch_array($this->rs))	
			{
			$activa[]=array('idencuesta'=>$rows['id_encuesta']);
			}
		}
		return $activa;
	}
	
	function getLista()
	{
	$sql="select * from encuesta ";		
	$this->rs=mysql_query($sql,$this->linker)or die(mysql_error());
	$num=mysql_num_rows($this->rs);
	if($num>0)
		{
		while($rows=mysql_fetch_array($this->rs))
 		     {$datos[]=array('idencuesta'=>$rows['id_encuesta'],'pregunta'=>$rows['pregunta'],'fecha'=>$rows['fecha']);}	
		}		
	else
		{$datos="-";}	

	return $datos;
	}
	function setEncuestaActiva($xid)
	{
                       $valorid=Encuesta::getEncuestaActiva();
	         if($valorid==0)///insertamos la encuesta activa
		{ $sql="insert into encuestaactiva values('$xid')";}
	        else
		{ $sql="update encuestaactiva set id_encuesta='$xid'";}
	
	$num=mysql_query($sql)or die(mysql_error());
	
	return $num;
	}
	function setNuevaEncuesta($pregunta)
	{
	$fecha=date('Y-m-d');	
	$sql="insert into encuesta values('','$pregunta','$fecha')";
	$num=mysql_query($sql,$this->linker)or die(mysql_error($this->linker));
	$idneo=mysql_insert_id($this->linker);

	     return $idneo;
	}


	function setNuevaAlternativa($idencuesta,$alternativa,$puntos='0')
	{
	$fecha=date('Y-m-d');	
	$sql="insert into alternativa values('','$idencuesta','$alternativa','$puntos')";
	$num=mysql_query($sql)or die(mysql_error());
              return $num;
	}


	function setActualizaAlternativa($id,$neoalt)
	{
	$fecha=date('Y-m-d');	
	$sql="Update alternativa set  alternativa='$neoalt',puntos='0' where id_alternativa='$id'";
	$num=mysql_query($sql,$this->linker)or die(mysql_error($this->linker));
	     return $num;
	}

	function deleteAlternativa($id)
	{
	
	$sql="delete from alternativa where id_alternativa='$id'";
	$num=mysql_query($sql,$this->linker)or die(mysql_error($this->linker));

	     return $num;
	}
	function deleteAlternativas($idencuesta)
	{
	
	$sql="delete from alternativa where id_encuesta='$idencuesta'";
	$num=mysql_query($sql,$this->linker)or die(mysql_error($this->linker));
               return $num;
	}
	function deleteEncuesta($id)
	{
	$sql="delete from encuesta where id_encuesta='$id'";
	$num=mysql_query($sql,$this->linker)or die(mysql_error($this->linker));
	return $num;
	}
	function alterEncuesta($id,$pregunta)
	{
	$sql="Update encuesta set  pregunta='$pregunta' where id_encuesta='$id'";
	$num=mysql_query($sql,$this->linker)or die(mysql_error($this->linker));
	return $num;
	}
};

?>