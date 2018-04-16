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
<body>
HOLA
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