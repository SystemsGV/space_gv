<?

class Notas extends Conexion
{
	var $link;
	var $sql;
	function Notas()
	{

	    $objcone=new Conexion();
	    $this->link=$objcone->Conectar();
	    $this->sql="";

	}
	function getNota($id='')
	{	if(empty($id))
		{$this->sql="select * from nota";}
		else
		{$this->sql="select * from nota where id_nota='$id'";}

		$rs=mysql_query($this->sql,$this->link)or die(mysql_error());
		while($rows=mysql_fetch_array($rs))
		{
			$notas[]=array('idnota'=>$rows[id_nota],
						   'detalle'=>$rows[detalle],
						   'imgestrellas'=>$rows[estrellas],
						   'imgestrellas1'=>$rows[estrellas1],
						   'color'=>$rows[color]
					   	  );
		}
	  	return $notas;
	}
	
	function insertar($desc,$img)
	{
	 $this->sql="insert into nota values('','$desc','$img')";
	 $num=mysql_query($this->sql,$this->link)or die(mysql_error($this->link));
	 return $num;
	}

	function modificar($desc,$img,$cod)
	{	$img1=$img.'_blanco';
		$this->sql="update nota set detalle=$desc,estrellas=$img,estrellas1=$img1 where id_nota=$cod";
		$num=mysql_query($this->sql,$this->link)or die(mysql_error($this->link));
		return $num;
	}
};

?>