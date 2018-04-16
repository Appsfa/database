<!DOCTYPE html>
<html>
<head>
	<title>Alumnos</title> 
	<?php
	include "head.php";
	?>
</head>
<?php
include "header.php";
?>
<body  style="background-image: url(img/bg-main.png)">
	<nav>
		<div class="nav-wrapper light-blue lighten-2" style="padding-left: 2%">
			<div class="col s12">
				<a href="http://www.apps-fa.com/proyects/database" class="breadcrumb">Inicio</a>
				<a href="http://www.apps-fa.com/proyects/database/alumnos.php" class="breadcrumb">Alumnos</a>
			</div>
		</div>
	</nav>
	<div class="row">
	<div class="">
	  <ul class="tabs">
		<li class="tab col s3"><a href="#test1">Test 1</a></li>
		<li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>
		<li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li>
		<li class="tab col s3"><a href="#test4">Test 4</a></li>
	  </ul>
	</div>
	<div id="test1" class="col s12">Test 1</div>
	<div id="test2" class="col s12">Test 2</div>
	<div id="test3" class="col s12">Test 3</div>
	<div id="test4" class="col s12">Test 4</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.apps-fa.com/proyects/database/js/materialize.js"></script>
<script>
$(document).ready(function(){
	$('.carousel.carousel-slider').carousel({
		fullWidth: true,
		indicators: false
	});

	$('.sidenav').sidenav();
	$('.tabs').tabs();
});

</script>
</body>
</html>