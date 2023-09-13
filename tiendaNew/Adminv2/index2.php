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

          <h1><?=ucwords($_GET["mod"])?>   <?=$_GET["smod"]?"<small>".ucwords($_GET["smod"])."</small>":$none?> </h1>

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


  </body>

</html>