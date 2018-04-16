<!DOCTYPE html>
<html>
<head>
	<title>Alumnos</title> 
	<?php
	include "head.php";
	include "link.php";
	$link = Conectarse();
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
		<li class="tab col s6"><a href="#create">CREATE</a></li>
		<li class="tab col s6"><a class="active" href="#alumnos">ALUMNOS</a></li>
	  </ul>
	</div>
	<div id="alumnos" class="row">
		<div class="col s12 m1"></div>
		<div class="col s12 m10">
			<br><br>
			<table class="white-text responsive-table highlight centered">
				<thead>
					<tr>
						<th>Matricula</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Paterno</th>
						<th>Semestre</th>
						<th>Select</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$result_alumnos = mysqli_query($link, "SELECT * FROM Alumno ORDER BY matricula");
				if(mysqli_num_rows($result_alumnos) > 0)
				{
					while($row_result_alumno = mysqli_fetch_object($result_alumnos))
					{
						?>
						<tr>
							<td><?php echo $row_result_alumno->matricula; ?></td>
							<td><?php echo $row_result_alumno->nombre; ?></td>
							<td><?php echo $row_result_alumno->apellidoPat; ?></td>
							<td><?php echo $row_result_alumno->apellidoMat; ?></td>
							<td><?php echo $row_result_alumno->semestre; ?></td>
							<td><a href="http://www.apps-fa.com/proyects/database/alumnos/rud.php?matricula=<?php echo $row_result_alumno->matricula; ?>" class="btn green white-text waves-effect waves-light select" id="<?php echo $row_result_alumno->matricula; ?>"><i class="material-icons left">adjust</i>SELECT</a></td>
							<td><a class="btn red white-text waves-effect waves-light delete" id="<?php echo $row_result_alumno->matricula; ?>"><i class="material-icons left">delete</i>DELETE</a></td>
						</tr>
						<?php
					}
				}
				
				?>
				</tbody>
			</table>
		</div>
		<div class="col s12 m1"></div>
	</div>
	<div id="create" class="col s12">
		Test 2
	</div>
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