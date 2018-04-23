<!DOCTYPE html>
<html>
<head>
	<title>Materias | RUD</title> 
	<?php
	include_once "../restrict.php";
	include_once "../pagination.php";
	include "../head.php";
	include_once "../search.php";
	
	if(isset($_GET['pag']))
	{
		$pag = $_GET['pag'];
		$show = $_GET['show'];
		$limit = ($pag - 1) * $show;
	}
	?>
</head>
<?php
include "../header.php";
	include_once "../link.php";
	
	$clave = $_GET['clave'];
	$link = Conectarse();
	$result_clave = mysqli_query($link, "SELECT clave, nombre, objetivo, optativa, formato, Bloques_nombreBloque FROM Materia WHERE clave = '$clave'");
	if(mysqli_num_rows($result_clave) > 0)
	{
		$rowMateria = mysqli_fetch_object($result_clave);
	}
	
	else
	{
		header("Location: http://apps-fa.com/proyects/database/materias");
	}
?>
<body  style="background-image: url(http://apps-fa.com/proyects/database/img/bg-main.png)">
<?php include_once "../nav-wrapper.php"; ?>
	<main class="row">
		<div class="">
		  <ul class="tabs">
			<li class="tab col s6"><a class="active" href="#general">GENERAL</a></li>
			<li class="tab col s6"><a href="#mat">Materia</a></li>
		  </ul>
		</div>
		<div class="row" id="general">
			<div class="col s12 m1 l2"></div>
			<div class="col s12 m10 l8">
				<br><br>
				<form class="white-text" id="updateMateria">
				<div class="col s8 input-field">
					<input type="text" class="validate white-text" id="txtMatricula" name="Clave" required value="<?php echo $rowMateria->clave; ?>">
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
					<input type="text" class="validate white-text" id="txtNombre" name="nombre" required value="<?php echo $rowMateria->nombre; ?>">
					<label for="txtNombre">Nombre</label>
				</div>
				<div class="col s4 input-field">
					<input type="number" class="validate white-text" id="txtApellidoM" name="optativa" required value="<?php echo $rowMateria->optativa; ?>">
					<label for="txtApellidoM">Optativa</label>
				</div>
				<div class="col s4 input-field">
					<input type="text" class="validate white-text" id="txtSemestre" name="formato" required value="<?php echo $rowMateria->formato; ?>">
					<label for="txtSemestre">Formato</label>
				</div>
				<div class="col s12 input-field">
					<textarea  class="validate white-text" id="txtApellidoP" name="objetivo" required value="<?php echo $rowMateria->objetivo; ?>">
					<label for="txtApellidoP">Objetivo</label>
				</div>
				<div class="col s12 input-field">
					<input type="text" class="validate white-text" id="txtSemestre" name="bloque" required value="<?php echo $rowMateria->Bloques_nombreBloque; ?>">
					<label for="txtSemestre">Nombre del Bloque</label>
				</div>
				<div class="center col s12">
					<br><br>
					<a class="btn blue white-text waves-effect waves-light" id="btnUpdateMateria"><i class="material-icons left">edit</i>Actualizar</a>
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
			<h4>¿Seguro que desea borrar <span id="spanClave"></span>?</h4>
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
		$("#spanClave").html($(this).attr("id"));
	});
	$("btnAceptarDelete").on("click", function(){
		var clave = $("#spanClave").html();
		console.log(clave);
		var formMatricula = new FormData();
		formMatricula.append("clave", clave);
		var promise = $.ajax({
				type: "POST",
				url: "deleteMateria.php",
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
						url: "consultaMateria.php",
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
				<a class="btn grey white-text waves-effect waves-light" href="http://www.apps-fa.com/proyects/database/materia"><i class="left material-icons">exit_to_app</i>Salir</a>
				
				<a class="btn red white-text waves-effect waves-light delete" id="<?php echo $rowMateria->clave; ?>"><i class="left material-icons">delete</i>Borrar</a>
			</div>
		</div>
	</footer>
</html>