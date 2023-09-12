<? class Usuario extends Conexion
{
	var $link;
	var $sql;
	function Usuario()
	{

	    $objcone=new Conexion();
	    $this->link=$objcone->Conectar();
	    $this->sql="";

	}
	function setUsuario($nombre,$apellido,$correo,$fono,$edadUser)
	{
	  $this->sql="insert into usuario values('','$nombre','$apellido','$correo','$fono','$edadUser')";
	  $result=mysql_query($this->sql,$this->link)or die(mysql_error($this->link));

  	  return $result;
		
	}
	function existsUsuario($correo)
	{
	  $this->sql="select * from usuario where correo='$correo'";
	  $result=mysql_query($this->sql,$this->link)or die(mysql_error($this->link));
	  $num=mysql_num_rows($result);
	  
  	  return $num;
		
	}


};
?>
