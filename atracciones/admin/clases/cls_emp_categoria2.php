<?
class cls_emp_categoria{

var $id_categoria;
var $txt_nombre;
var $txt_terminos;

function cls_emp_categoria($idcat=0)
{
	if($idcat!=0)
	{
		$sql="select * from tbl_categoria2 where id_categoria='".$idcat."' order by id_categoria";
		$fila = conn_consulta($sql);						
		$this->set_id_categoria($fila['id_categoria']);
		$this->set_txt_nombre($fila['txt_nombre']);
		$this->set_txt_terminos($fila['txt_terminos']);				
	}else{
		$this->set_id_categoria('');
		$this->set_txt_nombre('');
		$this->set_txt_terminos('');				
	}		
}

function set_id_categoria($id_categoria){	$this->id_categoria=$id_categoria;}
function get_id_categoria(){	return $this->id_categoria;	}

function set_txt_nombre($txt_nombre){	$this->txt_nombre=$txt_nombre;}
function get_txt_nombre(){	return $this->txt_nombre;	} 

function set_txt_terminos($txt_terminos){	$this->txt_terminos=$txt_terminos;}
function get_txt_terminos(){	return $this->txt_terminos;	}


function guarda()
{
	$sql="insert into tbl_categoria2(txt_nombre, txt_terminos)"
		 ." values('".$this->get_txt_nombre()."', '".$this->get_txt_terminos()."');";
	$id = conn_ejecuta($sql);
	$this->set_id_categoria($idcat);				 
}

function actualiza()
{
		$sql="update tbl_categoria2 set txt_nombre='".$this->get_txt_nombre()."', "
		." txt_terminos='".$this->get_txt_terminos()."'"
		." where id_categoria='".$this->get_id_categoria()."'";

	conn_ejecuta($sql);		
}

function elimina()
{
	$sql="delete from tbl_categoria2 where id_categoria='".$this->get_id_categoria()."'";
	conn_ejecuta($sql);			
}

## Validar socio

function valida_socio()
{
	$sql="select id_cliente from tbl_cliente where txt_usuario='".$this->get_txt_usuario()."' "
		    ." and txt_password='".$this->get_txt_password()."' ";
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


