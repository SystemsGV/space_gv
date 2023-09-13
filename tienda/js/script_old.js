$(document).ready(function() {  
      $(".btntdoc").on("change", function(){        
        if($("input[name=tdoc]:checked").val()=="1"){
            $("#viewtdocfac").slideUp();
        }else if($("input[name=tdoc]:checked").val()=="2"){
            $("#viewtdocfac").slideDown();
        }
      });
      $(".btntpago").on("change", function(){        
        if($("input[name=tpago]:checked").val()=="1"){
            $("#viewtpagotar").slideUp();
            $("#viewtpagodep").slideDown();

        }else if($("input[name=tpago]:checked").val()=="2"){
            $("#viewtpagodep").slideUp();
            $("#viewtpagotar").slideDown();
        }
      });
      
    
	$("#slider").carousel({interval: 5000});	
	$("#testi").carousel({interval: 4000});	
	$("#itemsingle").carousel({interval: false});
    function addLeadingZero(num) {if (num < 10) {return "0" + num;} else {return "" + num;}}
    $('#nav').affix({offset: {top: $('header').height()}});
    $(".responsive-calendar").responsiveCalendar({
        time: xyear+'-'+xmonth,
        onActiveDayClick: function(events) { 
            $('.formAll').formValidation('resetForm', true);        
            var thisDayEvent, key;
            key = $(this).data('year')+'-'+addLeadingZero( $(this).data('month') )+'-'+addLeadingZero( $(this).data('day') );
            fecha = $(this).data('day')+'/'+$(this).data('month')+'/'+ $(this).data('year');
            thisDayEvent = events[key];
            $("#txtcant").val(1);
            $("#txtfec").val(fecha);
            $("#txtpu").val(events[key].precio);
			//$("#txtpu").val("00.0");
            $(".responsive-calendar .day.active ").removeClass("select");
            $(this).parent().addClass("select");
            return false;
        },
        events: xevento
      });
      $('.btn-addmembresia').on('click', function(){            
            var obj = $(this);                        
            $.confirm({
                icon: 'fa fa-warning',title: 'Membresias!',keyboardEnabled: true,backgroundDismiss: false,confirmButton: 'Aceptar',cancelButton: 'Cancelar',confirmButtonClass:"btn-success",
                cancelButtonClass:"btn-primary",content: '<br><div class="text-center"><span class="fa-stack fa-lg "><i class="fa fa-circle fa-stack-2x "></i><i class="fa fa-trash-o fa-stack-1x fa-inverse "></i></span> Agregar nueva membresia</div><br>',
                confirm: function () {                    
                    $.post( "prc.php", { cmd:"membresia",xsel:1}, function(result){
                       if(result.msg.status="ok"){
                            location.href="?mod=list"
                       }else{
                            alert("error");
                       }
                    },"json");
                },
                cancel: function () {/*location.href="?mod=cart"*/}
            });
        });
      $('.btn-del-cart').on('click', function(){            
            var obj = $(this);            
            var xitems = $(this).attr("href").split('-');            
            $.confirm({
                icon: 'fa fa-warning',title: 'Desea quitar este articulo!',keyboardEnabled: true,backgroundDismiss: false,confirmButton: 'Aceptar',cancelButton: 'Cancelar',confirmButtonClass:"btn-success",
                cancelButtonClass:"btn-primary",content: '<br><div class="text-center"><span class="fa-stack fa-lg "><i class="fa fa-circle fa-stack-2x "></i><i class="fa fa-trash-o fa-stack-1x fa-inverse "></i></span> el item numero '+xitems[1]+' para ser eliminado</div><br>',
                confirm: function () {                    
                    $.post( "prc.php", { cmd:"delcart",xsel:xitems[1]}, function(result){
                        console.log(result)
                        if(result.msg.status="ok"){
                            location.href="?mod=list";
							/*obj.parent().parent().parent().fadeOut("normal", function() {
                                obj.remove();
                                $(".cart-items").html(result.data.items);
                                $(".cart-stotal").html(result.data.stotal);
                                $(".cart-igv").html(result.data.igv);
                                $(".cart-total").html(result.data.total);
                            });*/
                        }else{
                            alert("error");
                        }
                    },"json");
                },
                cancel: function () {/*location.href="?mod=cart"*/}
            });
        });
      
    var options = { beforeSubmit:  showRequest,success:showResponse,dataType:'json'}; 
 
    // bind to the form's submit event 
    /*$('.formAll').submit(function() {         
        $(this).ajaxSubmit(options); 
        return false; 
    });*/
    //$('.formAll').ajaxForm({beforeSubmit:showRequest,success:showResponse,dataType:'json'});
    $('.formAll').formValidation({
        framework: 'bootstrap',
        fields: {
            dnival: {validators: {remote: {type: 'POST',url: 'remote.php',message: 'El dni de usuario no está disponible'}}},
            emailval: {validators: {remote: {type: 'POST',url: 'remote.php',message: 'El dni de usuario no está disponible'}}},
            agree: {                        
                excluded: false,
                validators: {callback: {message: 'Usted debe estar de acuerdo con los términos y condiciones',callback: function(value, validator, $field) {
                    if(value==='no'){
                        $.alert({title:"Información",keyboardEnabled: true,backgroundDismiss: false,confirmButton:"Aceptar",content:"Debe Aceptar los terminos y condiciones"});
                    }
                    return value === 'yes';

                }}}
            }          
        },
        //excluded: ':disabled',
        icon: {valid: 'glyphicon glyphicon-ok',invalid: 'glyphicon glyphicon-remove',validating: 'glyphicon glyphicon-refresh',required: 'glyphicon glyphicon-asterisk'}, 
        err: {container: 'tooltip'}    
        }).on('success.validator.fv', function(e, data) {
            //alert(data)
            // data.field     --> The field name
            // data.element   --> The field element
            // data.result    --> The result returned by the validator
            // data.validator --> The validator name
            //alert(data.element.val())
            
            if (data.field === 'emailval'  && data.validator === 'remote' && (data.result.available === false || data.result.available === 'false')){
                data.element.closest('.form-group').removeClass('has-success').addClass('has-warning').find('small[data-fv-validator="remote"][data-fv-for="dnival"]').show();
                $("#usuarioreg").val("");
            }else if (data.field === 'dnival'  && data.validator === 'remote' && (data.result.available === false || data.result.available === 'false')){
                //alert(data.field)
                //console.log(data.result.available)                
                data.element.closest('.form-group').removeClass('has-success').addClass('has-warning').find('small[data-fv-validator="remote"][data-fv-for="dnival"]').show();
                $("#usuarioreg").val("");

            }else if (data.field === 'dnival'  && data.validator === 'remote' && (data.result.valid === true || data.result.valid === 'true')){
                
                $("#usuarioreg").val(data.element.val());
                //alert("ok makey ")
            }

        }).on('err.validator.fv', function(e, data) {
            // We need to remove has-warning class
            // when the field doesn't pass any validator
            if (data.field === 'dnival') {
                data.element.closest('.form-group').removeClass('has-warning');
            }
        }).on('err.field.fv', function(e, data) {
            if (data.fv.getSubmitButton()) {
                data.fv.disableSubmitButtons(false);
            }
            
        }).on('success.field.fv', function(e, data) {
            if (data.fv.getSubmitButton()) {
                data.fv.disableSubmitButtons(false);
            }
        }).on('err.form.fv', function(e, data) {
            
        }).on('success.form.fv', function(e, data) {
            //e.preventDefault();
            //var $form = $(e.target);
            //var fv = $form.data('formValidation');
            $('.formAll').ajaxForm({beforeSubmit:showRequest,success:showResponse,dataType:'json'});
        });
    $('#agreeButton, #disagreeButton').on('click', function() {

        var whichButton = $(this).attr('id');
        $('#frmSelTicket')
            .find('[name="agree"]')
                .val(whichButton === 'agreeButton' ? 'yes' : 'no')
                .end()
            // Revalidate the field manually
            .formValidation('revalidateField', 'agree');
    });
});
function showRequest(formData, jqForm, options) {     
    //var queryString = $.param(formData); 
    //alert('About to submit: \n\n' + queryString); 
    return true; 
} 
 
function showResponse(responseText, statusText, xhr, $form)  {     
    console.log(responseText);   
    if(responseText.msg.tipo=="alert"){        
        $.alert({title:responseText.msg.titulo,keyboardEnabled: true,backgroundDismiss: false,confirmButton:responseText.msg.txtconfirm,cancelButton:responseText.msg.txtcancel,confirmButtonClass:"btn-success",cancelButtonClass:"btn-primary",content:responseText.msg.content,
            confirm: function () {location.href=responseText.msg.urlconfirm},cancel: function () {location.href=responseText.msg.urlcancel}
        });
    }else if(responseText.msg.tipo=="confirm"){        
        $.confirm({title:responseText.msg.titulo,keyboardEnabled: true,backgroundDismiss: false,confirmButton:responseText.msg.txtconfirm,cancelButton:responseText.msg.txtcancel,confirmButtonClass:"btn-success",cancelButtonClass:"btn-primary",content:responseText.msg.content,
        confirm: function () {location.href=responseText.msg.urlconfirm},cancel: function () {location.href=responseText.msg.urlcancel}
        });
    }    
} 