<?
class Horario extends Conexion
{
	var $link;
	var $sql;
	function Horario()
	{

	    $objcone=new Conexion();
	    $this->link=$objcone->Conectar();
	    $this->sql="";

	}
	function getHora($id='')
		{
			if(empty($id))
			{$this->sql="select * from horario where id_horario<>1 order by orden1 asc,descrip asc";}
			else
			{$this->sql="select * from horario where id_horario='$id'";}

			$rs=mysql_query($this->sql,$this->link)or die(mysql_error());
			while($rows=mysql_fetch_array($rs))
			{
				$notas[]=array('idhora'=>$rows[id_horario],
		                 		        'detalle'=>$rows[descrip],
		                 		        'orden'=>$rows[orden]
					       );
			}
		  return $notas;
		}
	
	function insertar($desc,$img,$hor)
	{	$this->sql="select * from horario where descrip='$desc' and orden1=$hor";
		$rs=mysql_query($this->sql,$this->link)or die(mysql_error());	
		$nr=mysql_num_rows($rs);
		if ($nr=="0")
		{	$this->sql="insert into horario values('','$desc','$img',$hor)";
			$num=mysql_query($this->sql,$this->link)or die(mysql_error($this->link));
		}
		else
		{	$num=3;	}
		return $num;
	}
	function modificar($id,$desc,$img,$hor)
	{	$this->sql="select * from horario where descrip='$desc' and orden1=$hor";
		$rs=mysql_query($this->sql,$this->link)or die(mysql_error());	
		$nr=mysql_num_rows($rs);
		if ($nr=="0")
		{	 $this->sql="update horario set descrip= '$desc', orden= '$img', orden1= $hor WHERE id_horario=$id";
			 $num=mysql_query($this->sql,$this->link)or die(mysql_error($this->link));
		}
		else
		{	$num=3;	}
		return $num;
	}
	function eliminar($id)
	{
	 $this->sql="delete from horario where id_horario=$id";
	 $num=mysql_query($this->sql,$this->link)or die(mysql_error($this->link));
	 return $num;
	}	
	
};
?>