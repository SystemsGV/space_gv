<? 
	header("Expires: Mon, 01 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//	header("Cache-Control: no-cache, must-revalidate");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache"); 
	date_default_timezone_set("America/Lima");
	ob_start(); 
	session_start();
?>

