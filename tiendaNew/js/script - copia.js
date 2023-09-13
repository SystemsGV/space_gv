$(document).ready(function() {
	$("#slider").carousel({interval: 5000});	
	$("#testi").carousel({interval: 4000});	
	$("#itemsingle").carousel({interval: false});
    var d = new Date();
    var xyear = d.getFullYear();
    var xmonth = d.getMonth()+1;
    var xday = d.getDate();
    //var xevento;
    //$.getJSON('prc.php', {cmd:"calendar",format:"json"},myCallback);
    //function myCallback(data){
    //    xevento = data;
    // Do some processing!
    //}
    //console.log(xevento);


    //var j = $.getJSON('prc.php',function(jsdata){});
    //var myarray = j.responseText;
    //alert(myarray);

    //alert(xyear+'-'+xmonth+'-'+xday)
    function addLeadingZero(num) {if (num < 10) {return "0" + num;} else {return "" + num;}}
       $('#nav').affix({offset: {top: $('header').height()}});
        $(".responsive-calendar").responsiveCalendar({
        time: xyear+'-'+xmonth,
        onActiveDayClick: function(events) {            
            var thisDayEvent, key;
            key = $(this).data('year')+'-'+addLeadingZero( $(this).data('month') )+'-'+addLeadingZero( $(this).data('day') );
            fecha = $(this).data('day')+'/'+$(this).data('month')+'/'+ $(this).data('year');
            thisDayEvent = events[key];            
            $("#txtfec").val(fecha);
            $("#txtpu").val(events[key].precio);
            $(".responsive-calendar .day.active ").removeClass("select");
            $(this).parent().addClass("select")            
            enlace  = "#img-responsive";
		    $('html, body').animate({scrollTop: $(enlace).offset().top}, 1000);			
            //console.log(events[key].precio)
            return false;
        },
        events: xevento
      });
      $('#customize-spinner').spinner('changed',function(e, newVal, oldVal){$('#old-val').text(oldval);$('#new-val').text(newVal);});
      $('.btn-addcart').on('click', function () {
            $.confirm({
                title: 'Articulos añadidos al carrito!',
                keyboardEnabled: true,
                confirmButton: 'Continuar',
                cancelButton: 'Agregar más productos',
                confirmButtonClass:"btn-success",
                cancelButtonClass:"btn-primary",
                content: '<br><div class="text-center"><span class="fa-stack fa-lg "><i class="fa fa-circle fa-stack-2x "></i><i class="fa fa-shopping-cart fa-stack-1x fa-inverse "></i></span>  3 items Añadidos a la cesta</div><br>',
                confirm: function () {location.href="?mod=list"},
                cancel: function () {location.href="?mod=cart"}
            });
            return false
        });
        var form = $("#example-form");
            form.validate({
                errorPlacement: function errorPlacement(error, element) { element.before(error); },
                rules: {confirm: {equalTo: "#password"}}
            });
            form.children("div").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                onStepChanging: function (event, currentIndex, newIndex){
                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
                },
                onFinishing: function (event, currentIndex){
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function (event, currentIndex){
                    alert("Submitted!");
                }
            });
});