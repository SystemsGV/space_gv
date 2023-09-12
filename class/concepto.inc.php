<?

class Concepto extends Conexion
{
	var $link;
	var $sql;
	function Concepto()
	{

	    $objcone=new Conexion();
	    $this->link=$objcone->Conectar();
	    $this->sql="";

	}
	function getConcepto($id='')
		{
			if(empty($id))
			{$this->sql="select * from concepto";}
			else
			{$this->sql="select * from concepto where id_concepto='$id'";}

			$rs=mysql_query($this->sql,$this->link)or die(mysql_error());
			while($rows=mysql_fetch_array($rs))
			{
				$conceptos[]=array('idconcepto'=>$rows[id_concepto],
		                 		        'detalle'=>$rows[descrip_concepto],
		                 		        'duracion'=>$rows[duracion],
		                 		        'idnota'=>$rows[id_nota]);
			}
		  return $conceptos;
		}
	function insertar($desc,$duracion,$idnota)
	{
	 $this->sql="insert into concepto values('','$desc','$duracion','$idnota')";
	 $num=mysql_query($this->sql,$this->link)or die(mysql_error($this->link));
	 return $num;
	}

	function actualiza($desc,$duracion,$idnota,$idconcepto)
	{
	 $this->sql="update concepto set descrip_concepto='$desc', duracion='$duracion',id_nota=$idnota where id_concepto=$idconcepto";
	 $num=mysql_query($this->sql,$this->link)or die(mysql_error($this->link));
	 return $num;
	}
	
	function elimina($idconcepto)
	{
	 $this->sql="delete from concepto where id_concepto=$idconcepto";
	 $num=mysql_query($this->sql,$this->link)or die(mysql_error($this->link));
	 return $num;
	}
	

};

?>