<? 
include("inc.var.php");
$mod=$_GET[mod]?$_GET[mod]:"index";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="dodolan manuk responsive catalog themes built with twitter bootstrap">
    <meta name="keywords" content="responsive, catalog, cart, themes, twitter bootstrap, bootstrap">
    <meta name="author" content="afriq yasin ramadhan">
    <link rel="shortcut icon" href="img/favicon.html">
    <title>.: La Granja Villa :.</title>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">    
    <link href="css/style.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/responsive-calendar.css" rel="stylesheet">
    <link href="css/bootstrap-spinner.css" rel="stylesheet">
    <link href="css/jquery-confirm.css" rel="stylesheet"/>
    <link href="css/jquery.steps.css" rel="stylesheet"/>    
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
    <? include("header.php") ?>
    <div id="content-mod">
    <? if(file_exists("mod/{$mod}.php")){include("mod/{$mod}.php");} ?>        
    </div>
    <? include("footer.php") ?> 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/responsive-calendar.js"></script>	    
    <script src="js/script.js"></script>
    <script src="js/jquery.spinner.js"></script>
    <script src="js/jquery-confirm.js"></script>
    <script src="js/jquery.steps.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.form.js"></script>       
    </body>
</html>