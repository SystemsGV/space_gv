<? $mod=$_GET[mod]?$_GET[mod]:"index"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="dodolan manuk responsive catalog themes built with twitter bootstrap">
    <meta name="keywords" content="responsive, catalog, cart, themes, twitter bootstrap, bootstrap">
    <meta name="author" content="afriq yasin ramadhan">
    <link rel="shortcut icon" href="img/favicon.html">
    <title>.: La Granja Villa :.</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">   
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/responsive-calendar.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<? include("header.php") ?>   
<div id="home">
      <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="item active" style="background: url(img/slider/01.jpg);"></div>
          <div class="item" style="background: url(img/slider/02.jpg);"></div>
          <div class="item" style="background: url(img/slider/03.jpg);"></div>
        </div>
        <a class="left carousel-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="right carousel-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
        <div class="pattern"></div>
      </div>
</div>    
    <? if(file_exists("mod/{$mod}.php")){include("mod/{$mod}.php");}?>
    <? include("footer.php") ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/responsive-calendar.js"></script>	    
    <script src="js/script.js"></script>
    <script>
    $(document).ready(function () {
        function addLeadingZero(num) {
            if (num < 10) {
              return "0" + num;
            } else {
              return "" + num;
            }
          }
       $('#nav').affix({offset: {top: $('header').height()}});
        $(".responsive-calendar").responsiveCalendar({
        time: '2015-08',
        onDayClick: function(events) { 
            //alert('Day was clicked') 
            var thisDayEvent, key;

          key = $(this).data('year')+'-'+addLeadingZero( $(this).data('month') )+'-'+addLeadingZero( $(this).data('day') );
          fecha = $(this).data('year')+'-'+$(this).data('month')+'-'+ $(this).data('day');
          thisDayEvent = events[key];
          alert(thisDayEvent.number+" / "+fecha);
          return false;
            
        },
        events: {
          "2015-08-30": {"number": 1, "badgeClass": "badge-warning", "url": "#","precio":"S/.100<br>S/90"},
          "2015-08-26": {"number": 2, "badgeClass": "badge-warning", "url": "#","precio":"S/.120<br>S/80"}, 
          "2015-08-03": {"number": 3, "badgeClass": "badge-error","precio":"S/.140<br>S/110"}, 
          "2015-08-12": {"number": 4,"class": "active cool","precio":"S/.170<br>S/50"}}
      });
        //$(".player").mb_YTPlayer();
    });
    </script>
  </body>
</html>