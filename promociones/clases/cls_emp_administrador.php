<?
class cls_administrador{

var $id_administrador;
var $nombres;
var $correo;
var $usuario;
var $clave;
var $int_tipo;

function cls_administrador($id=0)
{
	if($id!=0)
	{
		$sql="select * from administrador where id_administrador='".$id."' order by id_administrador";
		$fila = conn_consulta($sql);						
		$this->setId_administrador($fila['id_administrador']);		
		$this->setNombres($fila['nombres']);		
		$this->setCorreo($fila['correo']);		
		$this->setClave($fila['clave']);		
		$this->setUsuario($fila['usuario']);
		$this->setInttipo($fila['int_tipo']);				
	}else{
		$this->setId_administrador('');		
		$this->setNombres('');		
		$this->setCorreo('');		
		$this->setClave('');		
		$this->setUsuario('');
		$this->setInttipo('');		
	}		
}

function setId_administrador($id_administrador){	$this->id_administrador=$id_administrador;}
function getId_administrador(){	return $this->id_administrador;	} 

function setNombres($nombres){	$this->nombres=$nombres;}
function getNombres(){	return $this->nombres;	} 

function setCorreo($correo){	$this->correo=$correo;}
function getCorreo(){	return $this->correo;	} 

function setUsuario($usuario){	$this->usuario=$usuario;}
function getUsuario(){	return $this->usuario;	} 

function setClave($clave){	$this->clave=$clave;}
function getClave(){	return $this->clave;	}

function setInttipo($int_tipo){	$this->int_tipo=$int_tipo;}
function getInttipo(){	return $this->int_tipo;	} 

function guarda()
{
	$sql="insert into administrador(nombres,correo,usuario,clave,int_tipo)"
		 ." values('".$this->getNombres()."', '".$this->getCorreo()."', '".$this->getUsuario()."', "
		 ."'".$this->getClave()."','".$this->getInttipo()."');";
	$id = conn_ejecuta($sql);
	$this->setId_administrador($id);			 
}

function actualiza()
{
	$sql="update administrador set nombres='".$this->getNombres()."', "
		." correo='".$this->getCorreo()."', "
		." usuario='".$this->getUsuario()."', "
		." clave='".$this->getClave()."', "
		." int_tipo='".$this->getInttipo()."' "
		." where id_administrador='".$this->getId_administrador()."'";
	conn_ejecuta($sql);		
}

function elimina()
{
	$sql="delete from administrador where id_administrador='".$this->getId_administrador()."'";
	conn_ejecuta($sql);			
}

function valida_administrator()
{
	$sql="select id_administrador from administrador where usuario='".$this->getUsuario()."' "
		    ." and clave='".$this->getClave()."' ";
//echo $sql;

	$filas=conn_array($sql);
	if(count($filas)>0)
	{
		return $filas[0][0];
	}else
	{
		return 0;
	}
}

}//fin de la clase
?>

