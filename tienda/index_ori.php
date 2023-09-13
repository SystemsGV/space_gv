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

    <meta name="description" content="Tienda Virtual - La Granja Villa y su Mundo Magico">

    <meta name="keywords" content="Tienda Virtual - La Granja Villa y su Mundo Magico">

    <meta name="author" content="La Granja Villa y su Mundo Magico">

    <link rel="shortcut icon" href="img/favicon.ico">

    <title>Tienda Virtual - La Granja Villa y su Mundo Magico</title>

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

	<?php

	if($mod=="entradas"){

	?>
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.0.1/css/select.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/editor.bootstrap.min.css">
  <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
  <link href="css/style2.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/plugins.css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

	<?php

	}

	?>

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



});



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
	
	<?php if($mod=="entradas"){ ?>

		$('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
    } );


	editor = new $.fn.dataTable.Editor( {
		ajax: "funciones/listado_clientes.php",
		table: "#example",
		fields: [ {
				label: "Nombre:",
				name: "cliente.nombre"
			}, {
				label: "Teléfono:",
				name: "cliente.telefono"
			}, {
				label: "Dirección:",
				name: "cliente.direccion"
			}, {
				label: "Email:",
				name: "cliente.email"
			}, {
				label: "Tipo:",
				name: "cliente.tipo",
				type:  "select",
                options: [
                    { label: "A", value: "1" },
                    { label: "AA", value: "2" },
                    { label: "AAA", value: "3" }
                ]
			}, {
				label: "Descripción:",
				name: "cliente.descripcion"
			}, {
				label: "Nit:",
				name: "cliente.nit"
			}, {
				label: "Whatsapp:",
				name: "cliente.whatsapp"
			}, {
				label: "Zona:",
				name: "cliente.zona"
			}, {
				label: "Barrio:",
				name: "cliente.barrio"
			}, {
				label: "Ciudad:",
				name: "cliente.ciudad"
			}, {
				label: "Vendedor:",
				name: "cliente.vendedor",
				type: "select"
			}
		],
		i18n: {
            edit: {
                button: "Editar",
                title:  "Editar Registro",
                submit: "Actualizar"
            },
            remove: {
                button: "Eliminar",
                title:  "Eliminar Registro",
                submit: "Eliminar",
                confirm: {
                    _: "¿Seguro que desea eliminar estos %d registros?",
                    1: "¿Seguro que desea eliminar este registro?"
                }
            },
            error: {
                system: "Se ha producido un error, póngase en contacto con el administrador del sistema"
            }
        }
	} );

	var table = $('#example').DataTable( {
		lengthChange: false,
		language: {
            decimal:        "",
    		emptyTable:     "Ningún dato disponible en esta tabla",
    		info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    		infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
    		infoFiltered:   "(filtrado de un total de _MAX_ registros)",
    		infoPostFix:    "",
    		thousands:      ",",
    		lengthMenu:     "Mostrar _MENU_ registros",
    		loadingRecords: "Cargando...",
    		processing:     "Procesando...",
    		search:         "Buscar:",
    		zeroRecords:    "No se encontraron resultados",
    		paginate: {
        	first:      "Primero",
        	last:       "Último",
        	next:       "Siguiente",
        	previous:   "Anterior"
    	},
    		aria: {
        		sortAscending:  ": Activar para ordenar la columna de manera ascendente",
        		sortDescending: ": Activar para ordenar la columna de manera descendente"
        	},
        	select: {
                rows: {
                    _: "%d filas seleccionadas",
                    0: "",
                    1: "1 fila seleccionada"
                }
            }
        },
		ajax: "funciones/listado_clientes.php",
		columns: [
			{ data: "cliente.nombre" },
			{ data: "cliente.telefono" },
			{ data: "cliente.direccion" },
			{ data: "cliente.email" },
			{ 
			   "data": "cliente.tipo",
			  "render": function (val, type, row) {
                    			return val == 1 ? "A" : val == 2 ? "AA": "AAA"; }
                    		},
			{ data: "cliente.descripcion" },
			{ data: "cliente.nit" },
			{ data: "cliente.whatsapp" },
			{ data: "cliente.zona" },
			{ data: "cliente.barrio" },
			{ data: "cliente.ciudad" },
			{ data: "trabajador.nombre" }
		],
		select: true,
		scrollX: true,

	} );

	table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

	// Display the buttons
	new $.fn.dataTable.Buttons( table, [
		{extend: "collection", text: "Guardar", buttons: ['pdfHtml5', 'excelHtml5'] },
		{ extend: "edit",   editor: editor },
		{ extend: "remove", editor: editor }
	] );

	table.buttons().container()
		.appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
});

	
	//});
	
	</script>
	
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" language="javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.0.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.0.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="js/dataTables.editor.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/editor.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="js/jquery-ui.js" ></script>

	<?php } ?>

    <style>

    /* #viewtdocfac{display: none}*/

    </style>

    </body>

</html>


