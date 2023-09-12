<?
include_once('libs/easyphpthumbnail.class.php');
$thumb = new easyphpthumbnail;
$thumb -> Thumbsize = $_GET[w];
$thumb -> Backgroundcolor = '#FF0000';
$thumb -> Cropimage = array(3,0,0,0,0,0);	
$thumb -> Sharpen = true;
//$thumb -> Cropimage = array(2,0,50,50,55,55);
/*$thumb -> Copyrighttext = $_GET[img];
$thumb -> Copyrightposition = '50% 90%';    
$thumb -> Copyrightfontsize = 10;
$thumb -> Copyrighttextcolor = '#FFFFFF'; */
$thumb -> Createthumb("uploads/".$_GET[img]);


?>