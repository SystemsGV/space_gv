<?php
  session_start();

  if(isset($_SESSION['session_socio'])){
      header("Location: socios.php");
    }
 ?>

<!DOCTYPE html>
<html lang="ES">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="imgclub/favicon.ico">
    <script src="https://kit.fontawesome.com/c51b016b55.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <title>CLUB GRANJA VILLA</title>
  </head>
  <style type="text/css">
  @font-face {
    font-family: 'riffic_freebold';
    src: url('fonts/rifficfree-bold-webfont.woff2') format('woff2'),
         url('fonts/rifficfree-bold-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
  }
    .textotitulo{
      font-family:'riffic_freebold', sans-serif; 
      font-weight: 100; 
      font-size: 26px; 
    }
    .container, .row {
        height: 100%;
        min-height: 100%;
      }

      html, body {
        height: 100%;
        background: url("imgclub/Pantalla.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
  </style>
<script language="javascript">
  function Valida_Datos()
  {
    if (document.form_login.txt_usuario.value.length == 0)
    {
      alert("Ingrese el Nombre del Usuario");
      document.form_login.txt_usuario.focus();
      return;
    }
    if (document.form_login.txt_psw1.value.length == 0)
    {
      alert("Ingrese su Clave");
      document.form_login.txt_psw1.focus();
      return;
    }
    document.form_login.submit();
  }

$( document ).ready(function() {
  $('#myModal').modal('show');
});


function iSubmitEnter(oEvento, oFormulario){
     var iAscii;

     if (oEvento.keyCode)
         iAscii = oEvento.keyCode;
     else if (oEvento.which)
         iAscii = oEvento.which;
     else
         return false;

     if (iAscii == 13) oFormulario.submit();

     return true;
}
//-->

</script>
<body class="login">

 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

        <div class="container "> 
        <a class="navbar-brand" href="https://lagranjavilla.com">
          <img src="imgclub/logo.png" width="80" height="80" alt=""></a>
          <h2 class="textotitulo">CLUB GRANJA</h2>
            
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        </div>
  </nav>
  
  <div class="container ">
    <div class="row justify-content-center align-items-center">
        <form method="post" action="proc_login.php" target="_parent" name="form_login" class="form">
          <h2 class="textotitulo">Ingrese N° de Tarjeta</h2>
         <br>
          <div align="left" class="form-group ">
            <div class="form-row">
              <div class="input-group form-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-id-card"></i></span>
                  </div>
                    <input  type="text" class="form-control" name="txt_usuario" onkeypress="iSubmitEnter(event, document.form_login)" placeholder="N° Tarjeta" required>
              </div>
           </div>
         </div>
         <h2 class="textotitulo">Fecha de nacimiento</h2>
          <br>
         <div class="form-row">
            <div class="form-group col-md-4">
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                  <input name= "txt_psw1" type="text" id="txt_psw1"formaction="" class="form-control"  placeholder="Día" required onkeypress="iSubmitEnter(event, document.form_login)">
              </div>
            </div>
            <div class="form-group col-md-4">
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                  <input  name="txt_psw2" type="text" id="txt_psw2" class="form-control" placeholder="Mes" required onkeypress="iSubmitEnter(event, document.form_login)">
              </div>
            </div>
            <div class="form-group col-md-4">
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                  <input name="txt_psw3" type="text" id="txt_psw3" class="form-control" placeholder="Año" required onkeypress="iSubmitEnter(event, document.form_login)">
              </div>
            </div>
        </div>


        <a class="btn btn-block" href="javascript:Valida_Datos();" style="color: #fff; background-color: #495057; border-color: #495057;"> INGRESAR </a>
        <br>
        <br>
       <button type="button" class="btn btn-block" data-toggle="modal" data-target="#myModal" style="color: #fff; background-color: #282727; border-color: #282727;">
         Terminos y Condiciones CLUB GRANJA VILLA
        </button>

        </form>
    </div>
   
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content body ">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">CLUB GRANJA VILLA</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

                <span style="font-size: 20px; font-weight: bold;">Beneficios de socio*: </span>
                <br>
               <span > - Membresía válida por un año. <br>
                - Una entrada gratis por cumpleaños del socio. La puedes obtener el mismo día del onomástico o 6 días antes o 6 días después.<br>
                - Con tu código de socio, ingresa a la web “Club Granja Villa” e imprime tus vales de descuento todos los meses del año (tener en cuenta las indicaciones del cupón).<br>
                - Una entrada gratis para asistir a la Semana del Socio que te corresponde. De acuerdo a tu número mágico, tendrás una fecha para utilizar esta entrada. Al año, habilitamos 4 semanas para nuestros afiliados, los cuales son chocolateados de acuerdo al último número de su carnet.<br>
                (*) Los beneficios son –únicamente- para el titular de la membresía.<br>
                (*) Es obligatorio presentar el carnét vigente online y DNI en físico para acceder a los beneficios correspondientes.<br>
                (*) Si tu carné venció, está por vencer o se perdió, puedes renovarlo. Costo: S/25.00 (no incluye dispositivo inteligente)<br>
                (*) Los beneficios del socio se activan 48 horas después de realizada la afiliación o renovación.<br>
                (*) La membresía puede adquirirse para niños y adultos. No hay edad límite.<br>
                (*) Los beneficios del socio no incluyen el dispositivo inteligente (pulsera o tarjeta).<br>
                *CLUB GRANJA VILLA.</span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: #fff; background-color: #282727; border-color: #282727;">CERRAR</button>

          </div>
        </div>
      </div>
</div>


  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>