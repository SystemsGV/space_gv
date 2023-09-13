<?
class Actividad extends Conexion
{
	var $link;
	var $sql;
	function Actividad()
	{

	    $objcone=new Conexion();
	    $this->link=$objcone->Conectar();
	    $this->sql="";

	}

	function getHorasActividad($idactividad)
	{
		$this->sql="select distinct(a.id_horario),h.descrip,h.orden  from actividad a INNER JOIN horario h ON
			    h.id_horario=a.id_horario where id_actividad='$idactividad'  ORDER BY h.orden1 asc, h.descrip asc";
		//echo"select distinct(a.id_horario),h.descrip,h.orden  from actividad a INNER JOIN horario h ON
		//	    h.id_horario=a.id_horario where id_actividad='$idactividad'  ORDER BY h.orden1 asc, h.descrip asc";
		$rs=mysql_query($this->sql,$this->link) or die("<span class='messageStackTrace'>".mysql_error($this->link)."</span>");
		while($fila=mysql_fetch_array($rs))
			{
			      $horas[]=array('idhorario'=>$fila[0],
					  'descripcion'=>$fila[1],
					  'tiempo'=>$fila[2]);

			}
	   //echo $this->sql;	
	   return $horas;		
	}	
	function getConceptoActividad($idactividad='')
	{
		if(!empty($idactividad))
		{
		$this->sql="select c.id_concepto,c.descrip_concepto ,c.duracion,h.descrip,h.orden,h.id_horario,a.id_actividad from actividad a INNER JOIN concepto c  ON
			    c.id_concepto=a.id_concepto INNER JOIN  horario h  ON a.id_horario=h.id_horario where a.id_actividad='$idactividad'  ORDER BY c.descrip_concepto,h.id_horario";
		}
		else
		{
		{
		$this->sql="select c.id_concepto,c.descrip_concepto ,c.duracion,h.descrip,h.orden,h.id_horario,a.id_actividad from actividad a INNER JOIN concepto c ON
			    c.id_concepto=a.id_concepto INNER JOIN  horario h  ON a.id_horario=h.id_horario ORDER BY c.descrip_concepto";
		}
		}
		$rs=mysql_query($this->sql,$this->link) or die("<span class='messageStackTrace'>".mysql_error($this->link)."</span>");
		while($fila=mysql_fetch_array($rs))
			{
			      $conceptos[]=array('id_concepto'=>$fila[id_concepto],
					        'descrip_concepto'=>$fila[descrip_concepto],
					        'duracion'=>$fila[duracion],
	 				        'hora'=>$fila[descrip],
	 				        'orden'=>$fila[orden],
					        'idhorario'=>$fila[id_horario],
					        'idactividad'=>$fila[id_actividad],		
					       );

			}
	   //echo $this->sql;	
	   return $conceptos;		
	}	
	function getConceptoNum($idactividad)
	{
		$this->sql="select distinct(c.id_concepto),c.descrip_concepto ,c.duracion from actividad a INNER JOIN concepto c ON
			    c.id_concepto=a.id_concepto where a.id_actividad='$idactividad'  ORDER BY c.descrip_concepto";
		$rs=mysql_query($this->sql,$this->link) or die("<span class='messageStackTrace'>".mysql_error($this->link)."</span>");
		
		$num=mysql_num_rows($rs);

	   return $num;		
	}
	function getActiUnica($idConcepto)
	{	$this->sql="select * from actividad where id_concepto=$idConcepto and id_horario=1";
		//echo"select * from actividad where id_concepto=$idConcepto and id_horario=1";
		$rs=mysql_query($this->sql,$this->link) or die("<span class='messageStackTrace'>".mysql_error($this->link)."</span>");		
		$num=mysql_num_rows($rs);
		return $num;
	}
	
	function getConceptoDistintoActividad($idactividad)
	{
		$this->sql="select distinct(c.id_concepto),c.descrip_concepto ,c.duracion,id_nota from actividad a INNER JOIN concepto c ON
			    c.id_concepto=a.id_concepto where a.id_actividad='$idactividad'  ORDER BY c.descrip_concepto";
		$rs=mysql_query($this->sql,$this->link) or die("<span class='messageStackTrace'>".mysql_error($this->link)."</span>");
		while($fila=mysql_fetch_array($rs))
		{	$conceptos[]=array('id_concepto'=>$fila[id_concepto],
							'descrip_concepto'=>$fila[descrip_concepto],
							'duracion'=>$fila[duracion],
							'id_nota'=>$fila[id_nota]);

		}
	   //echo $this->sql;	
	   return $conceptos;		
	}	

      function existeActividad($id,$concepto,$horario)	
	{
		$this->sql="select * from actividad where id_actividad='$id' and id_concepto='$concepto' and id_horario='$horario'";		
		$rs=mysql_query($this->sql);
		$numtot=mysql_num_rows($rs);
		/*if($concepto=="2")
			echo ($horario." -".$numtot);*/
		return $numtot;
	}
    function getActividad($idactividad='')
	{
		if(!empty($idactividad))
		{
		$this->sql="select distinct(id_actividad),id_concepto,id_horario ,des_actividad from actividad  where id_actividad='$idactividad'  ORDER BY des_actividad";
		}
		else
		{
		$this->sql="select distinct(id_actividad),id_concepto,id_horario ,des_actividad from actividad   ORDER BY des_actividad";
		}
	
		$rs=mysql_query($this->sql,$this->link) or die("<span class='messageStackTrace'>".mysql_error($this->link)."</span>");
		while($fila=mysql_fetch_array($rs))
			{
			      $conceptos[]=array('id_actividad'=>$fila[id_actividad],
					        'id_concepto'=>$fila[id_concepto],
					        'id_horario'=>$fila[id_horario],
					        'deta_actividad'=>$fila[des_actividad]);

			}
	   //echo $this->sql;	
	   return $conceptos;		
	}
  function insertar($conograma,$concepto,$valor)
	{
		$this->sql="insert into actividad(id_actividad,id_concepto,id_horario) values('$conograma','$concepto','$valor')";
		$rs=mysql_query($this->sql,$this->link) or die("<span class='messageStackTrace'>".mysql_error($this->link)."</span>");
		//echo $this->sql;	
		return $rs;
	}

  	function modificar($conograma,$concepto,$valor,$con,$hor)
	{	$this->sql="update actividad set id_concepto=$concepto,id_horario=$valor where id_actividad=$conograma and id_concepto=$con and id_horario=$hor";
		$rs=mysql_query($this->sql,$this->link) or die("<span class='messageStackTrace'>".mysql_error($this->link)."</span>");
		//echo $this->sql;	
		return $rs;
	}	

  	function eliminar($act,$con,$hor)
	{	$this->sql="delete from actividad where id_actividad=$act and id_concepto=$con and id_horario=$hor";
		$rs=mysql_query($this->sql,$this->link) or die("<span class='messageStackTrace'>".mysql_error($this->link)."</span>");
		//echo $this->sql;	
		return $rs;
	}			
}





?>