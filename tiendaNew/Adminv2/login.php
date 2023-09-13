<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>.: Administrador de Contenidos :.</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />    
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />    
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="dist/img/logo-s.png">
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Ingrese sus datos para iniciar su sesión</p>
        <form action="prc.php" method="post" role="form">
          <div class="form-group has-feedback">
            <input type="text" name="usuario" class="form-control" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8"><!--<div class="checkbox icheck"><label><input type="checkbox"> Guardar sessión</label></div>--></div>
            <div class="col-xs-4"><button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button></div>
          </div>
        </form>        
    </div>    
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>    
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>