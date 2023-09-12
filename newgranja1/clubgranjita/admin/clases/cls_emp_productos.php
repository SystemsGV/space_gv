<?

## Modificado 23.04.09
## Toda la estructura de la clase productos

class cls_emp_productos{

var $id_producto;
var $id_categoria;
var $id_cate_det;
var $txt_titulo;
var $txt_autor;
var $txt_tema;
var $txt_editorial;
var $txt_edicion;
var $txt_idioma;
var $txt_file;
var $txt_tipodoc;
var $txt_descripcion;
var $txt_ciclo;
var $fecha_public;
var $int_estado;
var $int_public; 

//## funciones de busqueda
//## 28.04.09
//function cls_emp_fillproductos($campos=0)
//{
//	if($campos!=0){
//		$sql="select * from tbl_producto where ".$campos;
//		$fila = conn_consulta($sql);						
//		$this->set_id_producto($fila['id_producto']);
//		$this->set_id_categoria($fila['id_categoria']);
//		$this->set_id_cate_det($fila['id_cate_det']);
//		$this->set_txt_titulo($fila['txt_titulo']);
//		$this->set_txt_autor($fila['txt_autor']);
//		$this->set_txt_tema($fila['txt_tema']);
//		$this->set_txt_editorial($fila['txt_editorial']);
//		$this->set_txt_edicion($fila['txt_edicion']);
//		$this->set_txt_idioma($fila['txt_idioma']);
//		$this->set_txt_file($fila['txt_file']);
//		$this->set_txt_tipodoc($fila['txt_tipodoc']);
//		$this->set_txt_descripcion($fila['txt_descripcion']);
//		$this->set_txt_ciclo($fila['txt_ciclo']);
//		$this->set_fecha_public($fila['fecha_public']);
//		$this->set_int_estado($fila['int_estado']);
//		$this->set_int_public($fila['int_public']);
//	}else{
//		$this->set_id_producto('');
//		$this->set_id_categoria('');
//		$this->set_id_cate_det('');
//		$this->set_txt_titulo('');
//		$this->set_txt_autor('');
//		$this->set_txt_tema('');
//		$this->set_txt_editorial('');
//		$this->set_txt_edicion('');
//		$this->set_txt_idioma('');
//		$this->set_txt_file('');
//		$this->set_txt_tipodoc('');
//		$this->set_txt_descripcion('');
//		$this->set_txt_ciclo('');
//		$this->set_fecha_public('');
//		$this->set_int_estado('');
//		$this->set_int_public('');
//	}
//}
function cls_emp_productos($id=0,$campos=0)
{
	if($id!=0)

	{
		$sql="select * from tbl_producto where id_producto='".$id."'";

		$fila = conn_consulta($sql);						
		$this->set_id_producto($fila['id_producto']);
		$this->set_id_categoria($fila['id_categoria']);
		$this->set_id_cate_det($fila['id_cate_det']);
		$this->set_txt_titulo($fila['txt_titulo']);
		$this->set_txt_autor($fila['txt_autor']);
		$this->set_txt_tema($fila['txt_tema']);
		$this->set_txt_editorial($fila['txt_editorial']);
		$this->set_txt_edicion($fila['txt_edicion']);
		$this->set_txt_idioma($fila['txt_idioma']);
		$this->set_txt_file($fila['txt_file']);
		$this->set_txt_tipodoc($fila['txt_tipodoc']);
		$this->set_txt_descripcion($fila['txt_descripcion']);
		$this->set_txt_ciclo($fila['txt_ciclo']);
		$this->set_fecha_public($fila['fecha_public']);
		$this->set_int_estado($fila['int_estado']);
		$this->set_int_public($fila['int_public']);
	}elseif($campos!=0){
		$sql="select * from tbl_producto where ".$campos;

		$fila = conn_consulta($sql);						
		$this->set_id_producto($fila['id_producto']);
		$this->set_id_categoria($fila['id_categoria']);
		$this->set_id_cate_det($fila['id_cate_det']);
		$this->set_txt_titulo($fila['txt_titulo']);
		$this->set_txt_autor($fila['txt_autor']);
		$this->set_txt_tema($fila['txt_tema']);
		$this->set_txt_editorial($fila['txt_editorial']);
		$this->set_txt_edicion($fila['txt_edicion']);
		$this->set_txt_idioma($fila['txt_idioma']);
		$this->set_txt_file($fila['txt_file']);
		$this->set_txt_tipodoc($fila['txt_tipodoc']);
		$this->set_txt_descripcion($fila['txt_descripcion']);
		$this->set_txt_ciclo($fila['txt_ciclo']);
		$this->set_fecha_public($fila['fecha_public']);
		$this->set_int_estado($fila['int_estado']);
		$this->set_int_public($fila['int_public']);
	}else{		
		$this->set_id_producto('');
		$this->set_id_categoria('');
		$this->set_id_cate_det('');
		$this->set_txt_titulo('');
		$this->set_txt_autor('');
		$this->set_txt_tema('');
		$this->set_txt_editorial('');
		$this->set_txt_edicion('');
		$this->set_txt_idioma('');
		$this->set_txt_file('');
		$this->set_txt_tipodoc('');
		$this->set_txt_descripcion('');
		$this->set_txt_ciclo('');
		$this->set_fecha_public('');
		$this->set_int_estado('');
		$this->set_int_public('');
	
	}
}


function set_id_producto($id_producto){	$this->id_producto=$id_producto;}
function get_id_producto(){	return $this->id_producto;	}
 
function set_id_categoria($id_categoria){	$this->id_categoria=$id_categoria;}
function get_id_categoria(){	return $this->id_categoria;	} 

function set_id_cate_det($id_cate_det){	$this->id_cate_det=$id_cate_det;}
function get_id_cate_det(){	return $this->id_cate_det;	} 

function set_txt_titulo($txt_titulo){	$this->txt_titulo=$txt_titulo;}
function get_txt_titulo(){	return $this->txt_titulo;	} 

function set_txt_autor($txt_autor){	$this->txt_autor=$txt_autor;}
function get_txt_autor(){	return $this->txt_autor;	} 

function set_txt_tema($txt_tema){	$this->txt_tema=$txt_tema;}
function get_txt_tema(){	return $this->txt_tema;	} 

function set_txt_editorial($txt_editorial){	$this->txt_editorial=$txt_editorial;}
function get_txt_editorial(){	return $this->txt_editorial;	} 

function set_txt_edicion($txt_edicion){	$this->txt_edicion=$txt_edicion;}
function get_txt_edicion(){	return $this->txt_edicion;	} 

function set_txt_idioma($txt_idioma){	$this->txt_idioma=$txt_idioma;}
function get_txt_idioma(){	return $this->txt_idioma;	} 

function set_txt_file($txt_file){	$this->txt_file=$txt_file;}
function get_txt_file(){	return $this->txt_file;	} 

function set_txt_tipodoc($txt_tipodoc){	$this->txt_tipodoc=$txt_tipodoc;}
function get_txt_tipodoc(){	return $this->txt_tipodoc;	} 

function set_txt_descripcion($txt_descripcion){	$this->txt_descripcion=$txt_descripcion;}
function get_txt_descripcion(){	return $this->txt_descripcion;	} 

function set_txt_ciclo($txt_ciclo){	$this->txt_ciclo=$txt_ciclo;}
function get_txt_ciclo(){	return $this->txt_ciclo;	} 

function set_fecha_public($fecha_public){	$this->fecha_public=$fecha_public;}
function get_fecha_public(){	return $this->fecha_public;	} 

function set_int_estado($int_estado){	$this->int_estado=$int_estado;}
function get_int_estado(){	return $this->int_estado;	} 

function set_int_public($int_public){	$this->int_public=$int_public;}
function get_int_public(){	return $this->int_public;	} 

function guarda()

{
## modificado 24.04.09
	$sql="insert tbl_producto(id_categoria,id_cate_det,txt_titulo,txt_autor,txt_tema,txt_editorial,txt_edicion,txt_idioma,txt_file,txt_tipodoc,txt_descripcion,txt_ciclo,fecha_public,int_estado,int_public) values('".
		$this->get_id_categoria()."','".
		$this->get_id_cate_det()."','".
		inc_caracteres_especiales($this->get_txt_titulo())."','".
		inc_caracteres_especiales($this->get_txt_autor())."','".
		inc_caracteres_especiales($this->get_txt_tema())."','".
		inc_caracteres_especiales($this->get_txt_editorial())."','".
		inc_caracteres_especiales($this->get_txt_edicion())."','".
		$this->get_txt_idioma()."','".
		$this->get_txt_file()."','".
		$this->get_txt_tipodoc()."','".
		inc_caracteres_especiales($this->get_txt_descripcion())."','".
		$this->get_txt_ciclo()."','".
		$this->get_fecha_public()."','".
		$this->get_int_estado()."','".
		$this->get_int_public()."');";
	conn_ejecuta($sql); //or die("Error Sql insert : ".$sql);
}



function actualiza()

{
	$sql="update tbl_producto set  id_categoria='".$this->get_id_categoria()."',
			id_cate_det='".$this->get_id_cate_det()."',  
			txt_titulo='".inc_caracteres_especiales($this->get_txt_titulo())."', 
			txt_autor='".inc_caracteres_especiales($this->get_txt_autor())."', 
			txt_tema='".inc_caracteres_especiales($this->get_txt_tema())."', 
			txt_editorial='".inc_caracteres_especiales($this->get_txt_editorial())."', 
			txt_edicion='".inc_caracteres_especiales($this->get_txt_edicion())."', 
			txt_idioma='".$this->get_txt_idioma()."', 
			txt_file='".$this->get_txt_file()."', 
			txt_tipodoc='".$this->get_txt_tipodoc()."', 
			txt_descripcion='".inc_caracteres_especiales($this->get_txt_descripcion())."', 
			txt_ciclo='".$this->get_txt_ciclo()."', 
			fecha_public='".$this->get_fecha_public()."',  
			int_estado='".$this->get_int_estado()."',
			int_public='".$this->get_int_public()."'
		 where id_producto='".$this->get_id_producto()."'";
	conn_ejecuta($sql); //or die("Error Sql UPdate : ".$sql);		

}



function elimina()
{
	$sql="delete from tbl_producto where id_producto='".$this->get_id_producto()."';";
	conn_ejecuta($sql);			
}

/*function maximo_galeria()
{
	$sql="select max(pk_noticia)+1 as pk_noticia from tbl_producto";
	$max=conn_columna($sql);
	$this->setpk_noticia($max[0]);				 
}*/



/*function actualiza_orden()

{

		$sql="update tbl_producto set int_orden=".$this->getint_orden()." where pk_noticia=".$this->getpk_noticia();

		conn_ejecuta ($sql);				

}*/


}//fin de la clase





?>

