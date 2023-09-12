<?php 
require_once __DIR__ . '/libs/ActiveRecord.php';
session_start();
define('DB_HOST','localhost');
define('DB_USER','lagranja_gv');
define('DB_PASS','150613$server');
define('DB_NAME','lagranja_peru4');
define('DB_ENGINE','mysql');
define('DB_CHAR','utf8');
/*session_start();define('DB_HOST','localhost');define('DB_USER','root');define('DB_PASS','');define('DB_NAME','granjavilla');define('DB_ENGINE','mysql');define('DB_CHAR','utf8');*/
class Administrador extends ActiveRecord\Model {
    static $table_name = 'administrador';
    static $primary_key = 'intadministradorid';
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
        if (false !== $array) {            return $parte[1];        }   
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
class Order extends ActiveRecord\Model {	
    static $table_name = 'order';	
    static $primary_key = 'intcartid';	
    }
class Orderdet extends ActiveRecord\Model {
    static $table_name = 'orderdet';	
    static $primary_key = 'intcartdetid';	
    }
class Boleto extends ActiveRecord\Model {	
    static $table_name = 'boleto';	
    static $primary_key = 'intboletoid';
}
class Cliente extends ActiveRecord\Model {	
    static $table_name = 'CLIENTE';	
    static $primary_key = 'ccliecode';		
    
}class Tarjeta extends ActiveRecord\Model {  
    static $table_name = 'TARJETA';  
    static $primary_key = 'id';    
    
} class Descuento extends ActiveRecord\Model {   
    static $table_name = 'descuento';   static $primary_key = 'id';    
    
} class Nodisponible extends ActiveRecord\Model {  

  static $table_name = 'nodisponible'; 

  static $primary_key = 'id';    

} class Logvisa extends ActiveRecord\Model {  

  static $table_name = 'logvisa';
  static $primary_key = 'id';    

}

function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE){
    //$source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            //mt_srand(microtime() * 1000000);
            $rand = (double)microtime()*1000000;
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
    }
    return $rstr;
}


ActiveRecord\Config::initialize(function($cfg){ 
    $cfg->set_model_directory('.');       
    $cfg->set_connections(array('development'=>'mysql://' . DB_USER . ':' . DB_PASS . '@127.0.0.1/' . DB_NAME.'?charset=utf8'));});
    ActiveRecord\DateTime::$DEFAULT_FORMAT = 'd-m-Y';
?>