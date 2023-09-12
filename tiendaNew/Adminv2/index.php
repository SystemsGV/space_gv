<?php

include("inc.var.php");

if(!$_SESSION["sess_admin"]){

  header("Location:login.php");

}

$sec=$_GET["sec"]?$_GET["sec"]:"noticia";

$mod=$_GET["mod"]?$_GET["mod"]:"noticias";

/*$smod=$_GET["smod"]?$_GET["smod"]:"noticia";*/

$page=$_GET["page"]?$_GET["page"]:"index";

/*echo "{$mod} / {$smod}";*/

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8">

    <title>.: Administrador de Contenidos :.</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>    

    <!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">       

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />    

    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />        

    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <link href="dist/css/tokenfield-typeahead.css" type="text/css" rel="stylesheet">    

    <link href="dist/css/bootstrap-tokenfield.css" type="text/css" rel="stylesheet">

    <link href="dist/css/cropper.min.css" type="text/css" rel="stylesheet">

    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    <!--<link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />-->

    <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />

    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />    

    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />    

    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />    

    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />    

    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <link href="plugins/bootstrap-fileinput/css/fileinput.css" rel="stylesheet" type="text/css" />

    <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />    

    <link href="dist/css/ekko-lightbox.css" rel="stylesheet">

    <link href="dist/css/cropper.min.css" rel="stylesheet">

    <link href="dist/css/main.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	
    
    <!--link href="plugins/multipledatepicker/css/mdp.css" rel="stylesheet">
    <link href="plugins/multipledatepicker/css/prettify.css" rel="stylesheet"-->
    

    

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->

  </head>

  <body class="skin-blue">

    <div class="wrapper">      

      <header class="main-header"><?php include("top.php");?></header>

      <aside class="main-sidebar"><?php include("left.php");?>

      </aside>      

      <div class="content-wrapper">

        <section class="content-header">

		
		<?if($mod=="epresencial"){?>
		 <h1><small>Entradas Presenciales</small></h1>
		<?}else{?>
          <h1><?=ucwords($_GET["mod"])?>   <?=$_GET["smod"]?"<small>".ucwords($_GET["smod"])."</small>":$none?> </h1>
		<?}?>
          <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i><?=ucwords($_GET["mod"])?></a></li>

            <li><a href="#"><?=ucwords($_GET["page"])?></a></li>

            <!--<li class="active">Data tables</li>-->

          </ol>

        </section>

        <?php 

          if(file_exists("mod/{$mod}/{$page}.php")){

            //echo("mod/{$mod}/{$page}.php");

            include("mod/{$mod}/{$page}.php");

          }



        ?>

      </div>

      <footer class="main-footer"><?php include("footer.php");?></footer>

    </div>  

    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>

    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>

    <script>

      $.widget.bridge('uibutton', $.ui.button);

    </script>

    <!--<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->

    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="bootstrap/js/bootstrap-tooltip.js"></script>

    <script src="bootstrap/js/bootstrap-confirmation.js"></script>

    <script src="plugins/ckeditor/ckeditor.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
	
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
	
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js" type="text/javascript"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" type="text/javascript"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" type="text/javascript"></script>
	
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js" type="text/javascript"></script>
	
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js" type="text/javascript"></script>
	
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js" type="text/javascript"></script>

    <!--<script src="plugins/morris/morris.min.js" type="text/javascript"></script>-->

    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>

    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>

    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>    

    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>    

    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>    

    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>    

    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>    

    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>        

    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>    

    <script src='plugins/fastclick/fastclick.min.js'></script>

    <script src="plugins/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>

    <script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>

    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>

    <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

    <script src="plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js" type="text/javascript"></script>    

    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <script src="dist/js/bootstrap-tokenfield.js" charset="UTF-8"></script>

    <script src="dist/js/ekko-lightbox.js"></script>

    <script src="dist/js/jquery.validate.min.js"></script>

    <script src="dist/js/cropper.min.js"></script>
    
    <!--script src="plugins/multipledatepicker/jquery-ui.multidatepicker.js"></script-->

    <!--<script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <script src="dist/js/main.js"></script>    

    <script src="dist/js/demo.js" type="text/javascript"></script>-->

    <script src="../js/jquery.mask.js"></script>
	
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/respond.min.js" ></script>
<!--common script for all pages-->
<script src="js/common-scripts.js"></script>
<!--script for this page (registro y validación)-->
<script src="js/jquery.stepy.js"></script>
<script src="js/plugins.js" ></script>
<script src="js/jquery-ui.js" ></script>

    <style>

    .has-error {color:#dd4b39;}

    .has-error input,.has-error select{border:1px solid #dd4b39;}

    </style>

    <script type="text/javascript">    

      $(function () {

        $('form[data-toggle="validator"]').validate(

          {

            ignore: [],          

            rules: {                

                cktitulo: {required: function() {CKEDITOR.instances.cktitulo.updateElement();}},

                cksumilla: {required: function() {CKEDITOR.instances.cksumilla.updateElement();}},

                ckdescripcion: {required: function() {CKEDITOR.instances.ckdescripcion.updateElement();}},

                cktransmision: {required: function() {CKEDITOR.instances.cktransmision.updateElement();}},

                ckmultimedia: {required: function() {CKEDITOR.instances.ckmultimedia.updateElement();}}

            },

            highlight: function (element, errorClass, validClass) {

                if($(element).parent().closest('div').find("i.fa-times-circle-o").length == 0){

                  $(element).parent().closest('div').stop(true,true).addClass('has-error',500).find( "label" ).prepend('<i class="fa fa-times-circle-o"></i> ');

                }

            },

            unhighlight: function (element, errorClass, validClass) {

                $(element).parent().closest('div').stop(true,true).removeClass('has-error',500).find("i.fa-times-circle-o").remove();

                $(element).parent().closest('div').stop(true,true).removeClass('has-error',500).find("em").remove();                

            },

            invalidHandler: function(form, validator) {

                var errors = validator.numberOfInvalids();

                if (errors) {                                        

                    $('html, body').animate({

                    scrollTop: $(validator.errorList[0].element).offset().top

                  }, 1000);

                }

            },

            errorPlacement: function(error, element) {      

                //$(element).next('span .error_label :first').html(error);

                //$('.error_label').html(error);

                //$('.error_label').html(error);

                //console.log($(element).parent().closest('div').html());

                /*if ($(element).is('textarea')) {

                    $(element).next().css('border', '1px solid red');

                }*/



                if ($(element).is("textarea")) {

                  $(error).insertAfter($(element).next());

                } else {

                  if($(element).parent().closest('div').find("em").length==0){

                    $(element).parent().closest('div').find("label").append(" <em>( "+$(error).text()+" )</em> ")

                  }

                }



                

                //$(element).closest('.error_label').html(error);

            }/*,

            submitHandler: function (event) {

              event.stopPropagation;

              console.log("Form submission prevented.");

            }           */

          //errorPlacement: function (error, element) {

            //alert($(error).text());

            //$(element).css("border:1px solir red")

            //$(element).tooltipster('update', $(error).text());

            //$(element).tooltipster('show');

        //}

          }

        );

        

        /*CKEDITOR.cktitulo.on("instanceReady", function () {



            //set keyup event

            this.document.on("keyup", function () { CKEDITOR.instances["cktitulo"].updateElement(); });

            //and paste event

            this.document.on("paste", function () { CKEDITOR.instances["cktitulo"].updateElement(); });

            //and cut event

            this.document.on("cut", function () { CKEDITOR.instances["cktitulo"].updateElement(); });



        });   */

        //alert($('form[data-toggle="validator"]').length)

        $(document).ready(function() {
				
	$.extend( true, $.fn.dataTable.defaults, {
		"sDom":
		"<'row'<'col-xs-6'l><'col-xs-6'b><'col-xs-6'f>r>"+
		"t"+
		"<'row'<'col-xs-6'i><'col-xs-6'p>>",
	"oLanguage": {
		"sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
		"buttons": {
            "excel":    "Exportar a Excel",
            "colvis":     "Columnas"
        }
	}
} );
/* Default class modification */
$.extend( $.fn.dataTableExt.oStdClasses, {
	"sWrapper": "dataTables_wrapper form-inline",
	"sFilterInput": "form-control input-sm",
	"sLengthSelect": "form-control input-sm"
} );

// In 1.10 we use the pagination renderers to draw the Bootstrap paging,
// rather than  custom plug-in
if ( $.fn.dataTable.Api ) {
	$.fn.dataTable.defaults.renderer = 'bootstrap';
	$.fn.dataTable.ext.renderer.pageButton.bootstrap = function ( settings, host, idx, buttons, page, pages ) {
		var api = new $.fn.dataTable.Api( settings );
		var classes = settings.oClasses;
		var lang = settings.oLanguage.oPaginate;
		var btnDisplay, btnClass;

		var attach = function( container, buttons ) {
			var i, ien, node, button;
			var clickHandler = function ( e ) {
				e.preventDefault();
				if ( e.data.action !== 'ellipsis' ) {
					api.page( e.data.action ).draw( false );
				}
			};

			for ( i=0, ien=buttons.length ; i<ien ; i++ ) {
				button = buttons[i];

				if ( $.isArray( button ) ) {
					attach( container, button );
				}
				else {
					btnDisplay = '';
					btnClass = '';

					switch ( button ) {
						case 'ellipsis':
							btnDisplay = '&hellip;';
							btnClass = 'disabled';
							break;

						case 'first':
							btnDisplay = lang.sFirst;
							btnClass = button + (page > 0 ?
								'' : ' disabled');
							break;

						case 'previous':
							btnDisplay = lang.sPrevious;
							btnClass = button + (page > 0 ?
								'' : ' disabled');
							break;

						case 'next':
							btnDisplay = lang.sNext;
							btnClass = button + (page < pages-1 ?
								'' : ' disabled');
							break;

						case 'last':
							btnDisplay = lang.sLast;
							btnClass = button + (page < pages-1 ?
								'' : ' disabled');
							break;

						default:
							btnDisplay = button + 1;
							btnClass = page === button ?
								'active' : '';
							break;
					}

					if ( btnDisplay ) {
						node = $('<li>', {
								'class': classes.sPageButton+' '+btnClass,
								'aria-controls': settings.sTableId,
								'tabindex': settings.iTabIndex,
								'id': idx === 0 && typeof button === 'string' ?
									settings.sTableId +'_'+ button :
									null
							} )
							.append( $('<a>', {
									'href': '#'
								} )
								.html( btnDisplay )
							)
							.appendTo( container );

						settings.oApi._fnBindAction(
							node, {action: button}, clickHandler
						);
					}
				}
			}
		};

		attach(
			$(host).empty().html('<ul class="pagination"/>').children('ul'),
			buttons
		);
	}
}
else {
	// Integration for 1.9-
	$.fn.dataTable.defaults.sPaginationType = 'bootstrap';

	/* API method to get paging information */
	$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
	{
		return {
			"iStart":         oSettings._iDisplayStart,
			"iEnd":           oSettings.fnDisplayEnd(),
			"iLength":        oSettings._iDisplayLength,
			"iTotal":         oSettings.fnRecordsTotal(),
			"iFilteredTotal": oSettings.fnRecordsDisplay(),
			"iPage":          oSettings._iDisplayLength === -1 ?
				0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
			"iTotalPages":    oSettings._iDisplayLength === -1 ?
				0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
		};
	};

	/* Bootstrap style pagination control */
	$.extend( $.fn.dataTableExt.oPagination, {
		"bootstrap": {
			"fnInit": function( oSettings, nPaging, fnDraw ) {
				var oLang = oSettings.oLanguage.oPaginate;
				var fnClickHandler = function ( e ) {
					e.preventDefault();
					if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
						fnDraw( oSettings );
					}
				};

				$(nPaging).append(
					'<ul class="pagination">'+
						'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
						'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
					'</ul>'
				);
				var els = $('a', nPaging);
				$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
				$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
			},

			"fnUpdate": function ( oSettings, fnDraw ) {
				var iListLength = 5;
				var oPaging = oSettings.oInstance.fnPagingInfo();
				var an = oSettings.aanFeatures.p;
				var i, ien, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

				if ( oPaging.iTotalPages < iListLength) {
					iStart = 1;
					iEnd = oPaging.iTotalPages;
				}
				else if ( oPaging.iPage <= iHalf ) {
					iStart = 1;
					iEnd = iListLength;
				} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
					iStart = oPaging.iTotalPages - iListLength + 1;
					iEnd = oPaging.iTotalPages;
				} else {
					iStart = oPaging.iPage - iHalf + 1;
					iEnd = iStart + iListLength - 1;
				}

				for ( i=0, ien=an.length ; i<ien ; i++ ) {
					// Remove the middle elements
					$('li:gt(0)', an[i]).filter(':not(:last)').remove();

					// Add the new list items and their event handlers
					for ( j=iStart ; j<=iEnd ; j++ ) {
						sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
						$('<li '+sClass+'><a href="#">'+j+'</a></li>')
							.insertBefore( $('li:last', an[i])[0] )
							.bind('click', function (e) {
								e.preventDefault();
								oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
								fnDraw( oSettings );
							} );
					}

					// Add / remove disabled classes from the static elements
					if ( oPaging.iPage === 0 ) {
						$('li:first', an[i]).addClass('disabled');
					} else {
						$('li:first', an[i]).removeClass('disabled');
					}

					if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
						$('li:last', an[i]).addClass('disabled');
					} else {
						$('li:last', an[i]).removeClass('disabled');
					}
				}
			}
		}
	} );
}


/*
 * TableTools Bootstrap compatibility
 * Required TableTools 2.1+
 */
if ( $.fn.DataTable.TableTools ) {
	// Set the classes that TableTools uses to something suitable for Bootstrap
	$.extend( true, $.fn.DataTable.TableTools.classes, {
		"container": "DTTT btn-group",
		"buttons": {
			"normal": "btn btn-default",
			"disabled": "disabled"
		},
		"collection": {
			"container": "DTTT_dropdown dropdown-menu",
			"buttons": {
				"normal": "",
				"disabled": "disabled"
			}
		},
		"print": {
			"info": "DTTT_print_info modal"
		},
		"select": {
			"row": "active"
		}
	} );

	// Have the collection use a bootstrap compatible dropdown
	$.extend( true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
		"collection": {
			"container": "ul",
			"button": "li",
			"liner": "a"
		}
	} );
}
    var table = $('#example1').DataTable( {
        lengthChange: false,
		oSelectorOpts: { filter: 'applied', order: 'current' },
        buttons: [ 'excel', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example1_wrapper .col-sm-6:eq(0)' );
		    
} );

        if($("#cknombre").length){

        CKEDITOR.replace('cknombre', {

          height:"50px",

          toolbar : 'Title',

          autoParagraph: false,

          ignoreEmptyParagraph: true,

          extraPlugins: 'maxlength,doNothing',

          keystrokes: [[ 13 , 'doNothing'],[CKEDITOR.SHIFT + 13 , 'doNothing' ]]

        });          

        }

        if($("#cktitulo").length){

        CKEDITOR.replace('cktitulo', {

          height:"50px",

          toolbar : 'Title',

          autoParagraph: false,

          ignoreEmptyParagraph: true,

          extraPlugins: 'maxlength,doNothing',

          keystrokes: [[ 13 , 'doNothing'],[CKEDITOR.SHIFT + 13 , 'doNothing' ]]

        });          

        }

        if($("#cksumilla").length){

          CKEDITOR.replace('cksumilla',{

            height:"150px",

            toolbar : 'Title',

            autoParagraph: false,

            ignoreEmptyParagraph: true,

            extraPlugins: 'maxlength,doNothing',

            keystrokes: [[ 13 , 'doNothing'],[CKEDITOR.SHIFT + 13 , 'doNothing' ]]

          });

        }

        if($("#ckdescripcion").length){

          CKEDITOR.replace('ckdescripcion',{toolbar : 'Descrip'});        

        }

        if($("#cktransmision").length){

          CKEDITOR.replace('cktransmision',{toolbar : 'Media'});        

        }

        if($("#ckmultimedia").length){

          CKEDITOR.replace('ckmultimedia',{toolbar : 'Publicidad'});        

        }

        

        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {

            event.preventDefault();

            $(this).ekkoLightbox();

        });

        $('.tokenfield').tokenfield();



        $("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');

        //$(".textarea").wysihtml5();

        //$(".textarea-titulo").wysihtml5({"font-styles": true,"emphasis": true, "lists": false, "html": false, "link": false, "image": false, "color": false });

        

        $(".btn-delete").confirmation({

            title: "Eliminar Registro",

            trigger: 'click',

            target : '_self', 

            href   : $(this).href, 

            singleton:true,            

            content: "desea realizar está acción?",

            placement: "left"

        });

        //iCheck for checkbox and radio inputs

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({

          checkboxClass: 'icheckbox_minimal-blue',

          radioClass: 'iradio_minimal-blue'

        });

        //Red color scheme for iCheck

        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({

          checkboxClass: 'icheckbox_minimal-red',

          radioClass: 'iradio_minimal-red'

        });

        //Flat red color scheme for iCheck

        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({

          checkboxClass: 'icheckbox_flat-green',

          radioClass: 'iradio_flat-green'

        });        

        

      });



//$(document).ready(function(){

    var dep = $("#dep");

        var pro = $("#pro");

        var dis = $("#dis");

        dep.change(function() {

            var act = dep.parents( "form" ).attr("action");            

            var depsel=$("#dep option:selected").val();

            //alert(act+" : "+depsel);

            $.getJSON(act+"?cmd=pro&dep="+depsel, function( data ) {                

              var items = [];

              items.push('<option value="" disabled="disabled" selected="selected" class="disabled">- PROVINCIA -</option>');

              $.each( data, function( key, val){items.push( "<option value='" + val.id + "'>" + val.texto + "</option>" );});

              pro.empty().append(items);

            });

        });

        pro.change(function() {

            var act = dep.parents( "form" ).attr("action"); 

            var depsel=$("#dep option:selected").val(); 

            var prosel=$("#pro option:selected").val();                

            $.getJSON(act+"?cmd=dis&dep="+depsel+"&pro="+prosel, function( data ) {

              var items = [];

              items.push('<option value="" disabled="disabled" selected="selected" class="disabled">- DISTRITO -</option>');          

              $.each( data, function( key, val){ items.push( "<option value='" + val.id + "'>" + val.texto + "</option>" );});

              dis.empty().append(items);

            });

        });

//})

    $(".file").fileinput({

        allowedFileTypes : ['image'],

        allowedPreviewTypes : ['image'],

        allowedFileExtensions : ['jpg', 'png','gif'],

        previewFileType: "image",

        showUpload: false,

        overwriteInitial: false,

        browseClass: "btn btn-primary",                                 

        initialPreview: ["<img src='"+$(".file").attr("value")+"' class='file-preview-image'>"],

        initialPreviewConfig : [{caption:$(".file").attr("data-title"),width: $(".file").attr("data-width"),height: $(".file").attr("data-height"), key:1}],

        initialCaption: "Seleccióne una imágen",

        removeLabel: "Eliminar",

        browseLabel:"Seleccionar..."

    });

    $(".file2").fileinput({

        allowedFileTypes : ['image'],

        allowedPreviewTypes : ['image'],

        allowedFileExtensions : ['jpg', 'png','gif'],

        previewFileType: "image",

        showUpload: false,

        overwriteInitial: false,

        browseClass: "btn btn-primary",                                 

        initialPreview: ["<img src='"+$(".file2").attr("value")+"' class='file-preview-image'>"],

        initialPreviewConfig : [{caption:$(".file2").attr("data-title"),width: $(".file2").attr("data-width"),height: $(".file2").attr("data-height"), key:1}],

        initialCaption: "Seleccióne una imágen",

        removeLabel: "Eliminar",

        browseLabel:"Seleccionar..."

    });

    $(".allfile").fileinput({

        maxFileSize: 4500,

        allowedFileExtensions: ["pdf"],

        showUpload: false,

        overwriteInitial: false,

        browseClass: "btn btn-primary",                                 

        //initialPreview: ["<div class=\"file-preview-text\" title=\"NOTES.txt\"><a class=\"btn btn-primary view-pdf\" href=\"http://www.bodossaki.gr/userfiles/file/dummy.pdf\">View PDF</a></div>"],

        //initialPreview: ["<a href=\"http://www.bodossaki.gr/userfiles/file/dummy.pdf\" data-title=\"http://www.bodossaki.gr/userfiles/file/dummy.pdf\" data-toggle=\"lightbox\">View PDF</a>"], 

        initialPreview: "<div class='file-preview-text'>" + 

    "<a href=\""+$(".allfile").attr("value")+"\" target=\"_blank\"><h2><i class='fa fa-file-pdf-o'></i></h2>" +

    $(".allfile").attr("data-title") + "</a></div>",

        /*initialPreview:function(){

          return "<div class='file-preview-text'>" + 

    "<a href=\""+$(".file").attr("value")+"\" data-title=\""+$(".allfile").attr("data-title")+"\" data-toggle=\"lightbox\"><h2><i class='fa fa-file-pdf-o'></i></h2>" +

    $(".allfile").attr("data-title") + "</a></div>";

        },*/



        //initialPreviewConfig : [{caption:$(".allfile").attr("data-title"),width: "120px", key:1}],

        initialCaption: "Seleccióne un pdf",

        removeLabel: "Eliminar",

        browseLabel:"Seleccionar..."

    });

    ///alert("hola mundo: "+$(".allfile").attr("value"));

    $(".datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});

    $('.input-daterange').datepicker({ language: "es"});
	
	
	///// MOVE CASH ORDER TABLE
	$(".move-cash").click(function(event){
		var href = $(this).data('href');
		if (window.confirm("Desea asignarlo a comprado?")) { 
			$.post(href, function(data){
				location.reload();
			});
		}
	});

  </script>

  <script>

$(document).ready(function(){

  /*$("#img").on("hide.bs.collapse", function(){    

    $("#vdo").collapse('hide');

    $("#img").collapse('show');

  });

  $("#img").on("show.bs.collapse", function(){

    $("#vdo").collapse('hide');    

  });

  $("#vdo").on("hide.bs.collapse", function(){    

    $("#img").collapse('hide');

    $("#vdo").collapse('show');

  });

  $("#vdo").on("show.bs.collapse", function(){

    $("#img").collapse('hide');    

  });*/
        
        
    /*$('#from-disabled').multiDatesPicker();*/

  $('input[type=radio][name=opt]').on('change', function () {

      if (!this.checked) return

      //alert(this.value)

      $('.content-radio').slideUp();

      $("#"+this.value).slideDown()

      //$('.collapse').not($('div.' + $(this).attr('class'))).slideUp();

      //$('.collapse.' + $(this).attr('class')).slideDown();

  });

  <?php

	if($mod=="clientes"){

	?>

	$("#dnacmdate").mask("99/99/9999");

	<?php

	}

	?>

<?php

	if($mod=="epresencial"){

	?>

	$("#default-step-1").click(function () {
  //saco el valor accediendo a un input y lo asigno a una variable
  var apaterno = $("#1").val();
  $('#10').html(apaterno);
  var amaterno = $("#2").val();
  $('#11').html(amaterno);
  var nombres = $("#3").val();
  $('#12').html(nombres);
  var dni = $("#4").val();
  $('#13').html(dni);
  var email = $("#5").val();
  $('#14').html(email);
  var telefono = $("#6").val();
  $('#15').html(telefono);
  var fnacimiento = $("#7").val();
  $('#16').html(fnacimiento);
  var direccion = $("#8").val();
  $('#17').html(direccion);
  var caentradas = $("#9").val();
  $('#18').html(caentradas);
  var tboleto = $("#23").val();
  var tboleto1 = function () {
    return tboleto == 2 ? "GVS" : tboleto == 3 ? "GVN": tboleto == 6 ? "Full Terror": tboleto == 11 ? "Terror": ""; };
  $('#25').html(tboleto1);
  var sede = $("#24").val();
  $('#26').html(sede);
  var membresia = $("input[name='membresia']:checked").val();
  var membresia1 = function () {
    return membresia == 1 ? "SÍ" : "NO"; };
  $('#30').html(membresia1);
  var ptotal = 0;
  var seguro = 0;
  $("input[name^='precio']").each(function() {
        ptotal += +$(this).val();
    });
	$("input[name^='seguro']:checked").each(function() {
        seguro += +$(this).val();
    });
	if(seguro>0){
		var seguro1 = seguro*5;
		ptotal += seguro1;
	}
	if(membresia==1){
		ptotal += 20;
	}
$('#27').html(ptotal.toFixed(2));
  var stotal = ptotal.toFixed(2)/1.18;
  var igv = stotal*0.18;
  $('#28').html(stotal.toFixed(2));
  $('#29').html(igv.toFixed(2));
});

$("#default-step-0").click(function () {
var sd1 = $("#23").val();
	if(sd1=='3'){
	$('#24').val('GRANJA VILLA NORTE');
	}else{
	$('#24').val('GRANJA VILLA SUR');	
	}
});

$('#19').on( 'change', function() {
	var tdoc = $("#19").val();
	var factura;
	if(tdoc=='2'){
		factura = '<div class="form-group">'+
                  '<label class="control-label col-lg-2">Razón Social</label>'+
                  '<div class="col-lg-10">'+
                  '<input type="text" name="rsocial" id="20" class="form-control" placeholder="Razón Social" required/>'+
                  '</div></div>'+
                  '<div class="form-group">'+
                  '<label class="control-label col-lg-2">RUC</label>'+
                  '<div class="col-lg-4">'+
                  '<input type="number" name="ruc" id="21" class="form-control" placeholder="RUC" required/>'+
                  '</div></div>'+
                  '<div class="form-group">'+
                  '<label class="control-label col-lg-2">Dirección de la Empresa</label>'+
                  '<div class="col-lg-10">'+
                  '<textarea class="form-control" name="direccionemp" id="22" cols="60" rows="3" required></textarea>'+
                  '</div></div>';
	}else{
		factura ='';
	}

	$('#fob').html(factura);	
	});

$('#23').on( 'change', function() {
	var sd = $("#23").val();
	if(sd=='3'){
	$('#24').val('GRANJA VILLA NORTE');
	}else{
	$('#24').val('GRANJA VILLA SUR');	
	}
	}); 	

$('#9').on( 'change', function() {
	var numentradas = $("#9").val();
	var entradas;
	var entradas='';
	var entradas1;
	var num;
	for (var i = 0; i < numentradas; i++) {
		num = parseFloat(1)+parseFloat(i);
		entradas1 = '<div class="form-group">'+
				   '<label class="control-label col-lg-2">Apellido Paterno</label>'+
                   '<div class="col-lg-10">'+
                   '<input type="text" name="apaternoe'+i+'" class="form-control" placeholder="Apellido Paterno" required />'+
                   '</div></div><div class="form-group">'+
				   '<label class="control-label col-lg-2">Apellido Materno</label>'+
                   '<div class="col-lg-10">'+
                   '<input type="text" name="amaternoe'+i+'" class="form-control" placeholder="Apellido Materno" required />'+
                   '</div></div><div class="form-group">'+
				   '<label class="control-label col-lg-2">Nombres</label>'+
                   '<div class="col-lg-10">'+
                   '<input type="text" name="nombrese'+i+'" class="form-control" placeholder="Nombres" required />'+
                   '</div></div><div class="form-group">'+
				   '<label class="control-label col-lg-2">DNI / Carné de Extranjería</label>'+
                   '<div class="col-lg-2">'+
                   '<input type="number" name="dnie'+i+'" class="form-control" placeholder="DNI / Carné de Extranjería" required />'+
                   '</div></div><div class="form-group">'+
				   '<label class="control-label col-lg-2">Teléfono</label>'+
                   '<div class="col-lg-2">'+
                   '<input type="number" name="telefonoe'+i+'" class="form-control" placeholder="Teléfono" required />'+
                   '</div></div><div class="form-group">'+
				   '<label class="control-label col-lg-2">Fecha de la Entrada</label>'+
                   '<div class="col-lg-2">'+
                   '<input type="date" name="fentrada'+i+'" class="form-control" placeholder="Fecha de la Entrada" required />'+
                   '</div></div><div class="form-group">'+
				   '<label class="control-label col-lg-2">Precio</label>'+
                   '<div class="col-lg-2">'+
                   '<input type="number" name="precio'+i+'" class="form-control" placeholder="Precio" required />'+
                   '</div></div>'+
				   '<div class="form-group">'+
				   '<label class="customcheck"><label class="control-label col-lg-2">Agregar Seguro(+ S/. 5)&emsp;&ensp;</label>'+
				   '<div class="col-lg-2">'+
				   '<input type="checkbox" name="seguro'+i+'" value="1">'+
				   '<span class="checkmark"></span></label></div></div>';
		entradas = entradas+'<div align="center"><button type="button" class="btn btn-primary">Entrada&nbsp;&nbsp;<span class="badge">'+num+'</span></button></div><br>'+entradas1;	
}
	$('#entradas').html(entradas);	
	});   

        $(function() {
          $('#registro_clientes').stepy({
            backLabel: 'Anterior',
            block: true,
            nextLabel: 'Siguiente',
            titleClick: true,
            titleTarget: '.stepy-tab'
          });
        });
    
$(function(){

	$('#registro_clientes').submit(function(){
	$("input[type=submit]").attr('disabled', true);
		$.ajax({

			type:'post',
			dataType:'json',
			url:$(this).attr('action'),
			data:$(this).serialize(),
			success:mensaje
		})
		return false;
	});
	
	function mensaje(data) {
		if (data=='1') {
			$('#success').toggle(10);
		}else{
			$('#error').toggle(10);
		}
	}
});

jQuery.extend(jQuery.validator.messages, {
    required: "Este campo es obligatorio.",
    remote: "Por favor, arregle este campo.",
    email: "Ingrese una dirección de correo electrónico válida.",
    url: "Ingrese una URL válida.",
    date: "Ingrese una fecha válida.",
    dateISO: "Ingrese una fecha válida (ISO).",
    number: "Por favor ingrese un número válido.",
    digits: "Ingrese solo dígitos.",
    creditcard: "Ingrese un número de tarjeta de crédito válido.",
    equalTo: "Por favor ingrese el mismo valor nuevamente.",
    accept: "Ingrese un valor con una extensión válida.",
    maxlength: jQuery.validator.format("Ingrese no más de {0} caracteres."),
    minlength: jQuery.validator.format("Introduzca al menos {0} caracteres."),
    rangelength: jQuery.validator.format("Ingrese un valor entre {0} y {1} caracteres de longitud."),
    range: jQuery.validator.format("Ingrese un valor entre {0} y {1}."),
    max: jQuery.validator.format("Ingrese un valor inferior o igual a {0}."),
    min: jQuery.validator.format("Introduzca un valor mayor o igual que {0}.")
});

	<?php

	}

	?>
});

</script>

  <script>

  (function () {

    var $image = $('.img-container > img'),

        $dataX = $('#dataX'),

        $dataY = $('#dataY'),

        $dataHeight = $('#dataHeight'),

        $dataWidth = $('#dataWidth'),

        $dataRotate = $('#dataRotate'),

        options = {

          // data: {

          //   x: 420,

          //   y: 60,

          //   width: 640,

          //   height: 360

          // },

          // strict: false,

          // responsive: false,

          // checkImageOrigin: false



          // modal: false,

          // guides: false,

          // highlight: false,

          // background: false,



          // autoCrop: false,

          // autoCropArea: 0.5,

          // dragCrop: false,

          // movable: false,

          // rotatable: false,

          // zoomable: false,

          // touchDragZoom: false,

          // mouseWheelZoom: false,

          // cropBoxMovable: false,

          // cropBoxResizable: false,

          // doubleClickToggle: false,



          // minCanvasWidth: 320,

          // minCanvasHeight: 180,

          // minCropBoxWidth: 160,

          // minCropBoxHeight: 90,

          // minContainerWidth: 320,

          // minContainerHeight: 180,



          // build: null,

          // built: null,

          // dragstart: null,

          // dragmove: null,

          // dragend: null,

          // zoomin: null,

          // zoomout: null,



          aspectRatio: 16 / 9,

          preview: '.img-preview',

          crop: function (data) {

            $dataX.val(Math.round(data.x));

            $dataY.val(Math.round(data.y));

            $dataHeight.val(Math.round(data.height));

            $dataWidth.val(Math.round(data.width));

            $dataRotate.val(Math.round(data.rotate));

          }

        };



    $image.on({

      'build.cropper': function (e) {

        console.log(e.type);

      },

      'built.cropper': function (e) {

        console.log(e.type);

      },

      'dragstart.cropper': function (e) {

        console.log(e.type, e.dragType);

      },

      'dragmove.cropper': function (e) {

        console.log(e.type, e.dragType);

      },

      'dragend.cropper': function (e) {

        console.log(e.type, e.dragType);

      },

      'zoomin.cropper': function (e) {

        console.log(e.type);

      },

      'zoomout.cropper': function (e) {

        console.log(e.type);

      },

      'change.cropper': function (e) {

        console.log(e.type);

      }

    }).cropper(options);





    // Methods

    $(document.body).on('click', '[data-method]', function () {

      var data = $(this).data(),

          $target,

          result;



      if (!$image.data('cropper')) {

        return;

      }



      if (data.method) {

        data = $.extend({}, data); // Clone a new one



        if (typeof data.target !== 'undefined') {

          $target = $(data.target);



          if (typeof data.option === 'undefined') {

            try {

              data.option = JSON.parse($target.val());

            } catch (e) {

              console.log(e.message);

            }

          }

        }



        result = $image.cropper(data.method, data.option);



        if (data.method === 'getCroppedCanvas') {

          $('#getCroppedCanvasModal').modal().find('.modal-body').html(result);

        }



        if ($.isPlainObject(result) && $target) {

          try {

            $target.val(JSON.stringify(result));

          } catch (e) {

            console.log(e.message);

          }

        }



      }

    }).on('keydown', function (e) {



      if (!$image.data('cropper')) {

        return;

      }



      switch (e.which) {

        case 37:

          e.preventDefault();

          $image.cropper('move', -1, 0);

          break;



        case 38:

          e.preventDefault();

          $image.cropper('move', 0, -1);

          break;



        case 39:

          e.preventDefault();

          $image.cropper('move', 1, 0);

          break;



        case 40:

          e.preventDefault();

          $image.cropper('move', 0, 1);

          break;

      }



    });





    // Import image

    var $inputImage = $('#inputImage'),

        URL = window.URL || window.webkitURL,

        blobURL;



    if (URL) {

      $inputImage.change(function () {

        var files = this.files,

            file;



        if (!$image.data('cropper')) {

          return;

        }



        if (files && files.length) {

          file = files[0];



          if (/^image\/\w+$/.test(file.type)) {

            blobURL = URL.createObjectURL(file);

            $image.one('built.cropper', function () {

              URL.revokeObjectURL(blobURL); // Revoke when load complete

            }).cropper('reset').cropper('replace', blobURL);

            $inputImage.val('');

          } else {

            showMessage('Please choose an image file.');

          }

        }

      });

    } else {

      $inputImage.parent().remove();

    }





    // Options

    $('.docs-options :checkbox').on('change', function () {

      var $this = $(this);



      if (!$image.data('cropper')) {

        return;

      }



      options[$this.val()] = $this.prop('checked');

      $image.cropper('destroy').cropper(options);

    });  

    $('[data-toggle="tooltip"]').tooltip();



  }());

  </script>
<style>
/* The customcheck */
.customcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.customcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 5px;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
    background-color: #5bc0de;
    border-radius: 5px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.customcheck input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.customcheck .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>

  </body>

</html>