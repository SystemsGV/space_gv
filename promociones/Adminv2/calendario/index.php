<?php
    $datetime         = $_POST["datetime"];
    $dayHabliteBeging = $_POST["beging"];
    $dayHabliteEnd    = $_POST["end"];
    $dayBlocket       = $_POST["block"];
    
    function showMounth($datetime){
        $year = date('Y');
        $valTime = $year.'-'.$datetime;
        return $valTime;
    }
    
    function showRangeDays($datetime, $dayHabliteBeging, $dayHabliteEnd, $dayBlocket){
        $year = date('Y');
        $arrDay = explode(',', trim($dayBlocket));
        for ($index = $dayHabliteBeging; $index <= $dayHabliteEnd; $index++) {
            if(strlen($index) == 1){
                $index = "0".$index;
            }
            $string .= valueEquals($index, $year, $datetime, $arrDay);
        }
        $endstring = substr($string, 0, -2);
        return $endstring;
    }
    
    function valueEquals($index, $year, $datetime, $arrDay){
        foreach($arrDay as $val){
            if($index == $val){
                $string = "\"$year-$datetime-$index\":{\"number\":1,\"precio\":\"49.9\"}, ";
            }else{
                //$string = "\"$year-$datetime-$index\":{\"number\":1,\"precio\":\"49.9\"}, ";
            }                
        }
        return $string;       
    }
    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Responsive Calendar Widget that will make your day</title>
    <meta name="distributor" content="Global" />
    <meta itemprop="contentRating" content="General" />
    <meta name="robots" content="All" />
    <meta name="revisit-after" content="7 days" />
    <meta name="description" content="The source of truly unique and awesome jquery plugins." />
    <meta name="keywords" content="slider, carousel, responsive, swipe, one to one movement, touch devices, jquery, plugin, bootstrap compatible, html5, css3" />
    <meta name="author" content="w3widgets.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- Respomsive slider -->
    <link href="css/responsive-calendar.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <!-- Responsive calendar - START -->
    	<div class="responsive-calendar">
        <div class="controls">
            <a class="pull-left" data-go="prev"><div class="btn btn-primary">Prev</div></a>
            <h4><span data-head-year></span> <span data-head-month></span></h4>
            <a class="pull-right" data-go="next"><div class="btn btn-primary">Next</div></a>
        </div><hr/>
        <div class="day-headers">
          <div class="day header">Mon</div>
          <div class="day header">Tue</div>
          <div class="day header">Wed</div>
          <div class="day header">Thu</div>
          <div class="day header">Fri</div>
          <div class="day header">Sat</div>
          <div class="day header">Sun</div>
        </div>
        <div class="days" data-group="days">
          
        </div>
      </div>
      <!-- Responsive calendar - END -->
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/responsive-calendar.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $(".responsive-calendar").responsiveCalendar({
            time: '<?php echo showMounth($datetime); ?>',          
            events: {
                <?php echo showRangeDays($datetime, $dayHabliteBeging, $dayHabliteEnd, $dayBlocket);?>
            }
        });
      });
    </script>
  </body>
</html>