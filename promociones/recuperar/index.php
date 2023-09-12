<?php
include("inc.var.php");
$mod = $_GET["mod"]?$_GET["mod"]:"index";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

    <meta name="description" content="Tiendita - La Granja Villa y su Mundo Magico">

    <meta name="keywords" content="Tiendita - La Granja Villa y su Mundo Magico">

    <meta name="author" content="La Granja Villa y su Mundo Magico">

    <link rel="shortcut icon" href="img/favicon.ico">

    <title>Tiendita - La Granja Villa y su Mundo Magico</title>

    <link href="css/font-awesome.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">    

    <link href="css/style.css" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">

    <link href="css/responsive.css" rel="stylesheet">

    <link href="css/responsive-calendar.css" rel="stylesheet">

    <link href="css/bootstrap-spinner.css" rel="stylesheet">

    <link href="css/jquery.steps.css" rel="stylesheet"/>

    <link href="css/jquery-confirm.css" rel="stylesheet"/>

    <link href="css/formValidation.min.css" rel="stylesheet"/>   

    <!--[if lt IE 9]>

      <script src="js/html5shiv.js"></script>

      <script src="js/respond.min.js"></script>

    <![endif]-->

    </head>


    <body>

    <? include("header.php") ?>

    <div id="content-mod">

    <? if(file_exists("mod/{$mod}.php")){include("mod/{$mod}.php");} ?>

        <div class="modal fade" id="myModalRecovery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  

          <div class="modal-dialog" role="document">

            <div class="modal-content">

              <form class="formAll" role="form" action="prc.php" method="post">

              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">Recordar Password</h4>

              </div>

              <div class="modal-body">          

                  <div class="col-md-12">            

                    <div class="form-group">

                        <label for="ntarjeta" class="control-label">Email:</label>

                        <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                          <input type="text" class="form-control" name="emailrecovery" id="emailrecovery" placeholder="Email" data-fv-notempty data-fv-notempty-message="Este campo es obligatorio"

                          data-fv-emailaddress="true" data-fv-emailaddress-message="Porfavor ingrese un valor correcto.">

                        </div>

                        <span class="help-block"></span>                                          

                    </div>

                  </div>                  

              </div>

              <div class="modal-footer" style="border:0px solid red; overflow:hidden">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary">Aceptar</button>

                <input type="hidden" name="cmd" value="recovery">

              </div>

              </form>

            </div>

          </div> 

        </div>



    </div>

    <? include("footer.php") ?> 

    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/responsive-calendar.js"></script>	    

    <script src="js/jquery.spinner.js"></script>

    <script src="js/jquery-confirm.js"></script>    

    <script src="js/jquery.form.js"></script>

    <script src="js/formValidation.min.js"></script>

    <script src="js/framework/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

    <script src="js/jquery.mask.js"></script>

    <script src="new/js/validacion.js"></script>

    <script>
  

    $(function(){

    $('.spinner .btn:first-of-type').on('click', function() {

      var btn = $(this);

      var input = btn.closest('.spinner').find('input');

      if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {    

        input.val(parseInt(input.val(), 10) + 1);

      } else {

        btn.next("disabled", true);

      }

    });

    $('.spinner .btn:last-of-type').on('click', function() {

      var btn = $(this);

      var input = btn.closest('.spinner').find('input');

      if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {    

        input.val(parseInt(input.val(), 10) - 1);

      } else {

        btn.prev("disabled", true);

      }

    });



})



    $(document).ready(function(){

    //Handles menu drop down

    $('.dropdown-menu').find('form').click(function (e) {

        e.stopPropagation();

    });

	<?php

	if($mod=="response-visa"){

	?>

	/*setTimeout(function(){

	  window.location.href = "index.php?mod=cart";

	}, 20000);*/

	<?php

	}

	?>

	<?php

	if($mod=="registro"){

	?>

	$("#fnac").mask("99/99/9999");

	<?php

	}

	?>

}); 

    </script>

    <style>

    /* #viewtdocfac{display: none}*/

    </style>

    </body>

</html>


