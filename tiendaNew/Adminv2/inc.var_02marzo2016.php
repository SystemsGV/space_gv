<?

require_once __DIR__ . '/libs/ActiveRecord.php';
session_start();
define('DB_HOST','localhost');
define('DB_USER','lagranja_gv');
define('DB_PASS','gv2010');
define('DB_NAME','lagranja_peru4');
define('DB_ENGINE','mysql');
define('DB_CHAR','utf8');
/*session_start();
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','granjavilla');
define('DB_ENGINE','mysql');
define('DB_CHAR','utf8');*/


class Administrador extends ActiveRecord\Model {	
	static $table_name = 'administrador';	
	
}
class Noticia extends ActiveRecord\Model {	
	static $table_name = 'noticia';	
	static $primary_key = 'intnoticiaid';	
}
class Ubigeo extends ActiveRecord\Model {	
	static $table_name = 'ubigeo';	
	static $primary_key = 'intubigeoid';		
}

class File extends ActiveRecord\Model {	
	static $table_name = 'file';	
	static $primary_key = 'intfileid';	
	public function get_id_youtube(){
        $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
        $array = preg_match($patron, $this->txtfilesrc, $parte);
        if (false !== $array) {
            return $parte[1];
        }
        return false;        
    }
}
class Setup extends ActiveRecord\Model {	
	static $table_name = 'setup';	
	static $primary_key = 'intsetupid';	
}
class Cart extends ActiveRecord\Model {	
	static $table_name = 'cart';	
	static $primary_key = 'intcartid';		
}

class Cartdet extends ActiveRecord\Model {	
	static $table_name = 'cartdet';	
	static $primary_key = 'intcartdetid';		
}
class Boleto extends ActiveRecord\Model {	
	static $table_name = 'boleto';	
	static $primary_key = 'intboletoid';		
}
class Cliente extends ActiveRecord\Model {	
	static $table_name = 'CLIENTE';	
	static $primary_key = 'ccliecode';		
}
class tarjeta extends ActiveRecord\Model {	
	static $table_name = 'CLIENTE';	
	static $primary_key = 'ccliecode';		
}
ActiveRecord\Config::initialize(function($cfg){
    $cfg->set_model_directory('.');    
    $cfg->set_connections(array('development'=>'mysql://' . DB_USER . ':' . DB_PASS . '@127.0.0.1/' . DB_NAME.'?charset=utf8'));
});


ActiveRecord\DateTime::$DEFAULT_FORMAT = 'd-m-Y';



?>