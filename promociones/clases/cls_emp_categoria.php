<?
class cls_emp_categoria{

var $id_categoria;
var $txt_nombre;
var $txt_cursofacultad;
var $int_estado;

function cls_emp_categoria($id=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_categoria where id_categoria='".$id."'";
//echo $sql;
		$fila = conn_consulta($sql);						
		$this->set_id_categoria($fila['id_categoria']);
		$this->set_txt_nombre($fila['txt_nombre']);
		$this->set_txt_cursofacultad($fila['txt_cursofacultad']);
		$this->set_int_estado($fila['int_estado']);
	}else{
		$this->set_id_categoria('');
		$this->set_txt_nombre('');
		$this->set_txt_cursofacultad('');
		$this->set_int_estado('');
	}		

}


function set_id_categoria($id_categoria){	$this->id_categoria=$id_categoria;}
function get_id_categoria(){	return $this->id_categoria;	}
 
function set_txt_nombre($txt_nombre){	$this->txt_nombre=$txt_nombre;}
function get_txt_nombre(){	return $this->txt_nombre;	} 

function set_txt_cursofacultad($txt_cursofacultad){	$this->txt_cursofacultad=$txt_cursofacultad;}
function get_txt_cursofacultad(){	return $this->txt_cursofacultad;	} 

function set_int_estado($int_estado){	$this->int_estado=$int_estado;}
function get_int_estado(){	return $this->int_estado;	} 

function guarda()

{
	$sql="insert tbl_categoria(txt_nombre,txt_cursofacultad,int_estado) values('".
		$this->get_txt_nombre()."','".
		$this->get_txt_cursofacultad()."','".
		$this->get_int_estado()."');";	
	conn_ejecuta($sql);
}



function actualiza()

{
	$sql="update tbl_categoria set 
		 txt_nombre='".$this->get_txt_nombre()."',
		 txt_cursofacultad='".$this->get_txt_cursofacultad()."',
		 int_estado='".$this->get_int_estado()."' 
		 where id_categoria='".$this->get_id_categoria()."'";

	conn_ejecuta($sql);		

}



function elimina()
{
	$sql="delete from tbl_categoria where id_categoria='".$this->get_id_categoria()."';";
	conn_ejecuta($sql);			
}

function maximo_galeria()
{
	$sql="select max(pk_noticia)+1 as pk_noticia from tbl_categoria";
	$max=conn_columna($sql);
	$this->setpk_noticia($max[0]);				 
}



function actualiza_orden()

{

		$sql="update tbl_categoria set int_orden=".$this->getint_orden()." where pk_noticia=".$this->getpk_noticia();

		conn_ejecuta ($sql);				

}







}//fin de la clase





?>

