<?
class cls_mantenimiento{

var $idmante;
var $tipoca;

function cls_mantenimiento($id=0)
{
	if($id!=0)
	{
		$sql="select idmante,tipoca from tbl_mantenimiento where idmante='".$id."' order by idmante";
		$fila = conn_consulta($sql);		
		$this->setidmante($fila['idmante']);	
		$this->settipoca($fila['tipoca']);						
	}else{
		$this->setidmante('');
		$this->settipoca('');							
	}		
}

function setidmante($idmante){	$this->idmante=$idmante;}
function getidmante(){	return $this->idmante;	} 

function settipoca($tipoca){	$this->tipoca=$tipoca;}
function gettipoca(){	return $this->tipoca;	} 

function guarda()
{
	$sql="insert into tbl_mantenimiento(tipoca)"
		 ." values('".$this->gettipoca()."'"
		 ." );";
	$id = conn_ejecuta($sql);
	$this->setidmante($id);				 
}

function actualiza()
{
	$sql="update tbl_mantenimiento set tipoca='".$this->gettipoca()."' "
		." where idmante='".$this->getidmante()."'";
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

