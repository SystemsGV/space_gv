<?
class cls_administrador{

var $id_administrador;
var $nombres;
var $correo;
var $tipo;
var $usuario;
var $clave;

function cls_administrador($id=0)
{
	if($id!=0)
	{
		$sql="select id_administrador,nombres,correo,tipo, clave as clave,usuario from administrador where id_administrador='".$id."' order by id_administrador";
		$fila = conn_consulta($sql);						
		$this->setId_administrador($fila['id_administrador']);		
		$this->setNombres($fila['nombres']);		
		$this->setCorreo($fila['correo']);		
		$this->setTipo($fila['tipo']);		
		$this->setClave($fila['clave']);		
		$this->setUsuario($fila['usuario']);				
	}else{
		$this->setId_administrador('');		
		$this->setNombres('');		
		$this->setCorreo('');
		$this->setTipo('');		
		$this->setClave('');		
		$this->setUsuario('');						
	}		
}

function setId_administrador($id_administrador){	$this->id_administrador=$id_administrador;}
function getId_administrador(){	return $this->id_administrador;	} 

function setNombres($nombres){	$this->nombres=$nombres;}
function getNombres(){	return $this->nombres;	} 

function setCorreo($correo){	$this->correo=$correo;}
function getCorreo(){	return $this->correo;	} 

function setTipo($tipo){	$this->tipo=$tipo;}
function getTipo(){	return $this->tipo;	} 

function setUsuario($usuario){	$this->usuario=$usuario;}
function getUsuario(){	return $this->usuario;	} 

function setClave($clave){	$this->clave=$clave;}
function getClave(){	return $this->clave;	} 

function guarda()
{
	$sql="insert into administrador(nombres,correo,tipo,usuario,clave)"
		 ." values('".$this->getNombres()."', '".$this->getCorreo()."','".$this->getTipo()."', '".$this->getUsuario()."', "
		 ."'".$this->getClave()."'"
		 ." );";
	$id = conn_ejecuta($sql);
	$this->setId_administrador($id);				 
}

function actualiza()
{
	$sql="update administrador set nombres='".$this->getNombres()."', "
		." correo='".$this->getCorreo()."', "
		." tipo='".$this->getTipo()."', "
		." usuario='".$this->getUsuario()."', "
		." clave='".$this->getClave()."' "
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
//		    ." and clave=AES_ENCRYPT('".$this->getClave()."','empr') ";
		    ." and clave='".$this->getClave()."' ";
echo $sql;

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

