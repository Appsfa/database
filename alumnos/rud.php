
<!DOCTYPE html>
<html>
<head>
	<title>ALUMNOS | RUD</title> 
	<?php
	include "../head.php";
	?>
</head>
<?php
include "../header.php";
	include_once "../link.php";
	
	$matricula = $_GET['matricula'];
	$link = Conectarse();
	$result_matricula = mysqli_query($link, "SELECT matricula, nombre, apellidoPat, apellidoMat, semestre FROM Alumno WHERE matricula = '$matricula'");
	if(mysqli_num_rows($result_matricula) > 0)
	{
		$rowAlumno = mysqli_fetch_object($result_matricula);
	}
	
	else
	{
		header("Location: http://apps-fa.com/proyects/database/alumnos");
	}
?>
<body  style="background-image: url(http://apps-fa.com/proyects/database/img/bg-main.png)">
	<main class="row">
		<div class="">
		  <ul class="tabs">
			<li class="tab col s6"><a class="active" href="#general">GENERAL</a></li>
			<li class="tab col s6"><a href="#alum">ALUMNOS</a></li>
		  </ul>
		</div>
		<div class="row" id="general">
			<div class="col s12 m1 l2"></div>
			<div class="col s12 m10 l8">
				<br><br>
				<form class="white-text" id="updateAlumno">
				<div class="col s8 input-field">
					<input type="text" class="validate white-text" id="txtMatricula" name="matricula" required value="<?php echo $rowAlumno->matricula; ?>">
					<label for="txtMatricula">Matricula</label>
				</div>
				<div class="col s4 center">
					<a class="btn grey white-text waves-effect" id="btnGenerate"><i class="material-icons left">settings</i>Generar Matricula</a>
				</div>
				<div class="col s12">
					<div class="col s8" id="infoMatricula"></div>
					<br><br>
				</div>
				<div class="col s4 input-field">
					<input type="text" class="validate white-text" id="txtNombre" name="nombre" required value="<?php echo $rowAlumno->nombre; ?>">
					<label for="txtNombre">Nombre</label>
				</div>
				<div class="col s4 input-field">
					<input type="text" class="validate white-text" id="txtApellidoP" name="apellidoP" required value="<?php echo $rowAlumno->apellidoPat; ?>">
					<label for="txtApellidoP">Apellido Paterno</label>
				</div>
				<div class="col s4 input-field">
					<input type="text" class="validate white-text" id="txtApellidoM" name="apellidoM" required value="<?php echo $rowAlumno->apellidoMat; ?>">
					<label for="txtApellidoM">Apellido materno</label>
				</div>
				<div class="col s12 input-field">
					<input type="number" class="validate white-text" id="txtSemestre" name="semestre" required value="<?php echo $rowAlumno->semestre; ?>">
					<label for="txtSemestre">Semestre</label>
				</div>
				<div class="center col s12">
					<br><br>
					<a class="btn blue white-text waves-effect waves-light" id="btnUpdateAlumno"><i class="material-icons left">edit</i>Actualizar</a>
				</div>
			</form>
			</div>
			<div class="col s12 m1 l2"></div>
		</div>
	</main>
	<div id="modal1" class="modal transparent">
		<div class="modal-content center">
			<div class="preloader-wrapper big active">
			  <div class="spinner-layer spinner-blue">
				<div class="circle-clipper left">
				  <div class="circle"></div>
				</div><div class="gap-patch">
				  <div class="circle"></div>
				</div><div class="circle-clipper right">
				  <div class="circle"></div>
				</div>
			  </div>

			  <div class="spinner-layer spinner-red">
				<div class="circle-clipper left">
				  <div class="circle"></div>
				</div><div class="gap-patch">
				  <div class="circle"></div>
				</div><div class="circle-clipper right">
				  <div class="circle"></div>
				</div>
			  </div>

			  <div class="spinner-layer spinner-yellow">
				<div class="circle-clipper left">
				  <div class="circle"></div>
				</div><div class="gap-patch">
				  <div class="circle"></div>
				</div><div class="circle-clipper right">
				  <div class="circle"></div>
				</div>
			  </div>

			  <div class="spinner-layer spinner-green">
				<div class="circle-clipper left">
				  <div class="circle"></div>
				</div><div class="gap-patch">
				  <div class="circle"></div>
				</div><div class="circle-clipper right">
				  <div class="circle"></div>
				</div>
			  </div>
			</div>
		</div>
	</div>
	<div id="modalDelete" class="modal">
		<div class="modal-content center">
			<br><br>
			<h4>¿Seguro que desea borrar <span id="spanMatricula"></span>?</h4>
		</div>
		<div class="center">
			<a class="waves-effect waves-light btn green" id="btnAceptarDelete">Aceptar</a>
			<a class="modal-action modal-close waves-effect waves-light btn red">Cancel</a>
			<br><br>
		</div>
		
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript" src="http://www.apps-fa.com/proyects/database/js/materialize.js"></script>
<script>
$(document).ready(function(){
	var preloaderCircle = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div><div class="spinner-layer spinner-red"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div><div class="spinner-layer spinner-yellow"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div><div class="spinner-layer spinner-green"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';
	$('.carousel.carousel-slider').carousel({
		fullWidth: true,
		indicators: false
	});

	$('.sidenav').sidenav();
	$(".modal").modal();
	$('.tabs').tabs();
	$(document).on("click", ".delete", function(){
		$("#modalDelete").modal("open");
		$("#spanMatricula").html($(this).attr("id"));
	});
	$("btnAceptarDelete").on("click", function(){
		var matricula = $("#spanMatricula").html();
		console.log(matricula);
		var formMatricula = new FormData();
		formMatricula.append("matricula", matricula);
		var promise = $.ajax({
				type: "POST",
				url: "deleteAlumno.php",
				data: formMatricula,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(data){
					M.toast({html: data.estado});
				}
			});
		promise.then(function(){
					$("#tableAlumnos").html("<tr><td colspan='7' class='center'>" + preloaderCircle + "</td></tr>")
					$.ajax({
						type: "POST",
						url: "consultaAlumnos.php",
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(data){
							var html = "";
							for(var i = 0; i < data.length; i++)
							{
								html += "<tr><td>" + data[i].matricula + "</td><td>" + data[i].nombre + "</td><td>" + data[i].apellidoPat + "</td><td>" + data[i].apellidoMat + "</td><td>" + data[i].semestre + "</td><td><a class='btn waves-effect waves-light green select' href='http://www.apps-fa.com/proyects/database/alumnos/rud.php?matricula=" + data[i].matricula + "' id='" + data[i].matricula + "'><i class='material-icons left'>adjust</i>SELECT</a></td><td><a class='btn waves-effect waves-light red delete'><i class='material-icons left'>delete</i>DELETE</a></td></tr>";
							}
							
							$("#tableAlumnos").html(html);
						}
					});
				});
	});
});

</script>
	<? include "../info.php"; ?>
</body>
	<footer>
		<div class="row">
			<div class="col s12 center">
				<br><br>
				<a class="btn grey white-text waves-effect waves-light" href="http://www.apps-fa.com/proyects/database/alumnos"><i class="left material-icons">exit_to_app</i>Salir</a>
				
				<a class="btn red white-text waves-effect waves-light delete" id="<?php echo $rowAlumno->matricula; ?>"><i class="left material-icons">delete</i>Borrar</a>
			</div>
		</div>
	</footer>
</html>