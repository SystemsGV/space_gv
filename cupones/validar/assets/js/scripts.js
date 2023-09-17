jQuery(document).ready(function() {
    $('input#codigocupon').focus();
    $('.register form').submit(function(){
        /*Datos para validacion login*/
        $(this).find("label[for='codigocupon']").html('codigo:');
        
        $(this).find("label[for='Mensaje']").html('');
        /*Datos para validacion login*/
        var codigocupon  = $(this).find('input#codigocupon').val();
        
        /*Validacion para login*/
        if(codigocupon == '') {
            $(this).find("label[for='codigocupon']").append("<span style='display:none' class='red'> * El codigo Esta Vacio.</span>");
            $(this).find("label[for='codigocupon'] span").fadeIn('medium');
            $('input#codigocupon').focus();
            return false;
        }
      
        if(codigocupon != '' ){
            $("#Mensaje").append("<span  class='red'><img src='assets/img/ajax-loader.gif'> Solicitando Peticion...</span>");
            var datos = 'username='+Usuario_login+'&password='+Password_login;
            $.ajax({ 
                type : 'POST',
                data : datos,
                url  : 'login.php',
                success: function(responseText){ 
                    $("#Mensaje").html('');
                    if(responseText==0){
                        $("#Mensaje").append("<span  class='red'>* Usuario/Password Incorrecto</span>");
                    }
                    if(responseText==1){
                        window.location="principal.php";
                    }
                    if(responseText==2){
                        $("#Mensaje").append("<span  class='red'>* La cuenta esta inhabilitada</span>");
                    }
                    if(responseText==3){
                        $("#Mensaje").append("<span  class='red'>* La cuenta no ha sido Verificada</span>");
                    }
                }
            });
            return false;
        }
    });
});
