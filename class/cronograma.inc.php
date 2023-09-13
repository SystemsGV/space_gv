<? class Cronograma extends Conexion
{
	var $link;
	var $sql;
	function Cronograma()
	{

	    $objcone=new Conexion();
	    $this->link=$objcone->Conectar();
	    $this->sql="";

	}


    function getCronograma($crono='')
	{
		if(!empty($idactividad))
		{
		$this->sql="select * from cronograma where id_crono='$crono'";
		}
		else
		{
		$this->sql="select * from cronograma";
		}
	
		$rs=mysql_query($this->sql,$this->link) or die("<span class='messageStackTrace'>".mysql_error($this->link)."</span>");
		while($fila=mysql_fetch_array($rs))
			{
			      $conceptos[]=array('id_crono'=>$fila[id_crono],
					        'detalle'=>$fila[detalle]);

			}
	   //echo $this->sql;	
	   return $conceptos;		
	}	
}?>