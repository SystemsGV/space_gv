<?
class cls_emp_categoria_det{

var $id_cate_det;
var $id_categoria;
var $txt_nombre;
var $int_estado;

function cls_emp_categoria_det($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_categoria_det where id_cate_det='".$id."'";
//echo $sql;
		$fila = conn_consulta($sql);					
		$this->set_id_cate_det($fila['id_cate_det']);	
		$this->set_id_categoria($fila['id_categoria']);
		$this->set_txt_nombre($fila['txt_nombre']);
		$this->set_int_estado($fila['int_estado']);
	}else{
		$this->set_id_cate_det('');	
		$this->set_id_categoria('');
		$this->set_txt_nombre('');
		$this->set_int_estado('');
	}		

}


function set_id_cate_det($id_cate_det){	$this->id_cate_det=$id_cate_det;}
function get_id_cate_det(){	return $this->id_cate_det;	}
 
function set_id_categoria($id_categoria){	$this->id_categoria=$id_categoria;}
function get_id_categoria(){	return $this->id_categoria;	}
 
function set_txt_nombre($txt_nombre){	$this->txt_nombre=$txt_nombre;}
function get_txt_nombre(){	return $this->txt_nombre;	} 

function set_int_estado($int_estado){	$this->int_estado=$int_estado;}
function get_int_estado(){	return $this->int_estado;	} 

function guarda()

{
	$sql="insert tbl_categoria_det(id_categoria,txt_nombre,int_estado) values('".
		$this->get_id_categoria()."','".
		$this->get_txt_nombre()."','".
		$this->get_int_estado()."');";	
	conn_ejecuta($sql);
}



function actualiza()

{
	$sql="update tbl_categoria_det set 
		 txt_nombre='".$this->get_txt_nombre()."',
		 int_estado='".$this->get_int_estado()."' 
		 where id_cate_det='".$this->get_id_cate_det()."'";

	conn_ejecuta($sql);		

}



function elimina()
{
	$sql="delete from tbl_categoria_det where id_cate_det='".$this->get_id_cate_det()."';";
	conn_ejecuta($sql);			
}


}//fin de la clase

?>

