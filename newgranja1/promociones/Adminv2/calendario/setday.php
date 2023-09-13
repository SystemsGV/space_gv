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
        <form action="index.php" method="POST">
            <label for="">Mes</label>
            <input type="text" class="form-control" name="datetime">
            <label for="">Rango Inicial</label>
            <input type="text" class="form-control" name="beging">
            <label for="">Rango Final</label>
            <input type="text" class="form-control" name="end">
            <label for="">Fechas no validas</label>
            <input type="text" class="form-control" name="block">
            <input class="btn btn-primary" type="submit" name="btnDay" value="Enviar" />
        </form>
    </div>
  </body>
</html>