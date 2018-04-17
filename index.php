<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title> 
	<?php
	include "head.php";
	?>
</head>
<?php
include "header.php";
?>
<body  style="background-image: url(img/bg-main.png)">
	<main class="row">
		<div class="col s12 m1 l2"></div>
		<div class="col s12 m10 l8">
			<br><br>
			<a href="http://www.apps-fa.com/proyects/database/alumnos" class="center col s12 m6" style="margin-top: 4%">
				<div class="col s12 light-blue lighten-2 white-text">
					<i class="material-icons"><h1>face</h1></i>
				</div>
				<div class="col s12 light-blue lighten-2 white-text">
					<h4>ALUMNOS</h4>
				</div>
				<div class="col s12 light-blue lighten-2">
					<br>
					<br>
				</div>
			</a>
			<a href="http://www.apps-fa.com/proyects/database/materias" class="center col s12 m6" style="margin-top: 4%">
				<div class="col s12 pink white-text">
					<i class="material-icons"><h1>assignment</h1></i>
				</div>
				<div class="col s12 pink white-text">
					<h4>MATERIAS</h4>
				</div>
				<div class="col s12 pink">
					<br>
					<br>
				</div>
			</a>
		</div>
		<div class="col s12 m1 l2"></div>
	</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.apps-fa.com/proyects/database/js/materialize.js"></script>
<script>
function hora()
{
var fecha = new Date();
var horas = fecha.getHours();
var minutos = fecha.getMinutes();
var segundos = fecha.getSeconds();

var horaActual = horas + ":" + minutos + ":" + segundos;
$("#time").html(horaActual);
setTimeout(hora, 1000);
}
hora();
</script>
<script>
$(document).ready(function(){
	$('.carousel.carousel-slider').carousel({
		fullWidth: true,
		indicators: false
	});

	$('.sidenav').sidenav();
});

</script>
</body>
</html>