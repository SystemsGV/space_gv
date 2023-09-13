<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <div class="container centrar td-border">
<p align="center" class="text-h1" style="background-color: #b4407e; margin-bottom: 20px;">Registro de Usuarios</p>
<form name="frm1" action="proc_registro.php" method="post" class="needs-validation" novalidate>
  <div class="form-row">
    <div class="form-group col-md-6 txt_verde14">
      <label for="inputEmail4">Nombres:</label>
      <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
    </div>
    <div class="form-group col-md-6 txt_verde14">
      <label for="inputPassword4">Apellidos:</label>
      <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 txt_verde14">
      <label for="inputEmail4">Fecha de Nacimiento:</label>
      <input type="date" class="form-control" id="fechanac" name="fechanac" placeholder="Fecha de Nacimiento" required>
    </div>
    <div class="form-group col-md-6 mb-3 txt_verde14">
      <label for="fono">Teléfono:</label>
      <input type="number" class="form-control" id="fono" name="fono" placeholder="Teléfono" min="900000000" max="999999999" required>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 txt_verde14">
      <label for="inputEmail4">Dirección:</label>
      <input type="text" class="form-control" id="direcc" name="direcc" placeholder="Dirección" required>
    </div>
    <div class="form-group col-md-6 txt_verde14">
      <label for="inputPassword4">Distrito:</label>
      <input type="text" class="form-control" id="distrito" name="distrito" placeholder="Distrito" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 txt_verde14">
      <label for="inputEmail4">E-mail:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
    </div>
    <div class="form-group col-md-6 txt_verde14">
      <label for="inputPassword4">DNI / Carné de Extranjería:</label>
      <input type="number" class="form-control" name="dni" id="dni" placeholder="DNI / Carné de Extranjería" required>
    </div>
  </div>
  <p class="text-monospace txt_verde14" style="font-size: 18px">Crea tu usuario y contraseña <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="right" title="Registre un usuario y una contraseña para ingresar a nuestras ¡Promociones!"><img src="iconos/tooltip.png" height="35"></span></p>
  <div class="form-row">
    <div class="form-group col-md-6 txt_verde14">
      <label for="inputEmail4">Usuario:</label>
      <input type="text" class="form-control" name="user" id="user" placeholder="Usuario" required>
    </div>
    <div class="form-group col-md-6 txt_verde14">
      <label for="inputPassword4">Contraseña:</label>
      <input type="password" class="form-control" id="passw" name="passw" placeholder="Contraseña" required>
    </div>
  </div>
  <input type="hidden" name="check1" id="check1" >
  <input type="hidden" name="check2" id="check2" >
  <input type="hidden" name="check3" id="check3" >
  <div class="form-check form-check-inline">
  <p class="text-monospace txt_verde14" style="font-size: 18px">Deseo promociones para: </p>
  </div>
  <div class="form-check form-check-inline txt_verde14" style="margin-bottom: 20px">
  <input class="form-check-input" type="radio" name="rd_promo" value="0" required>
  <label class="form-check-label" for="inlineRadio1" style="width: 70px">Jovenes</label>
  <input class="form-check-input" type="radio" name="rd_promo" value="1">
  <label class="form-check-label" for="inlineRadio1">Familias</label>
  </div>
  <center>
  <button type="submit" class="btn btn-primary" style="background-color: #b4407e; border-color: #b4407e;">Enviar</button>
  <a href="index.php"><button type="button" class="btn btn-primary" style="background-color: #b4407e; border-color: #b4407e;">Cancelar</button></a>
  </center>
</form>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>