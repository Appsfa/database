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
<body style="background-image: url(http://apps-fa.com/proyects/database/img/bg-main.png)">
	<main class="row">
		<div class="col s12 m1 l2"></div>
		<div class="col s12 m10 l8">
			<br><br>
			<div class="col s12 m6">
				<a class="col s12 light-blue white-text center">
					<h1><i class="material-icons large">face</i></h1>
					<h4>ALUMNOS</h4>
				</a>
			</div>
			<div class="col s12 hide-on-med-and-up">
				<br><br>
			</div>
			<div class="col s12 m6">
				<a class="col s12 pink white-text center">
					<h1><i class="material-icons large">book</i></h1>
					<h4>MATERIAS</h4>
				</a>
			</div>
		</div>
		<div class="col s12 m1 l2"></div>
	</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.apps-fa.com/proyects/automatas/js/materialize.js"></script>
<script>
function hora()
{
var fecha = new Date();
var horas = fecha.getHours();
var minutos = fecha.getMinutes();
var segundos = fecha.getSeconds();

var horaActual = horas + ":" + minutos + ":" + segundos;
console.log(horaActual);
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
$("main").height($( window ).height());

</script>
</body>
</html>