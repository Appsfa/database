<!DOCTYPE html>
<html>
<head>
	<title>Alumnos</title> 
	<?php
	include "../head.php";
	include "../link.php";
	$link = Conectarse();
	?>
</head>
<?php
include "../header.php";
?>
<body  style="background-image: url(../img/bg-main.png)">
<?php include_once "../nav-wrapper.php"; ?>
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
				<tbody id="tableAlumnos">
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
	<div id="create" class="row">
		<div class="col s12 m1 l2"></div>
		<div class="col s12 m10 l8">
			<br><br>
			<form class="white-text" id="createAlumno">
				<div class="col s8 input-field">
					<input type="text" class="validate white-text" id="txtMatricula" name="matricula" required>
					<label for="txtMatricula"><span class="red-text">* </span>Matricula</label>
				</div>
				<div class="col s4 center">
					<a class="btn grey white-text waves-effect" id="btnGenerate"><i class="material-icons left">settings</i>Generar Matricula</a>
				</div>
				<div class="col s12">
					<div class="col s8" id="infoMatricula"></div>
					<br><br>
				</div>
				<div class="col s4 input-field">
					<input type="text" class="validate white-text" id="txtNombre" name="nombre" required>
					<label for="txtNombre"><span class="red-text">* </span>Nombre</label>
				</div>
				<div class="col s4 input-field">
					<input type="text" class="validate white-text" id="txtApellidoP" name="apellidoP" required>
					<label for="txtApellidoP"><span class="red-text">* </span>Apellido Paterno</label>
				</div>
				<div class="col s4 input-field">
					<input type="text" class="validate white-text" id="txtApellidoM" name="apellidoM" required>
					<label for="txtApellidoM"><span class="red-text">* </span>Apellido materno</label>
				</div>
				<div class="col s12 input-field">
					<input type="number" class="validate white-text" id="txtSemestre" name="semestre" required>
					<label for="txtSemestre"><span class="red-text">* </span>Semestre</label>
				</div>
				<div class="left col s12">
				<br><br>
					<span class="red-text">* Campos requeridos</span>
				</div>
				<div class="center col s12">
					<br><br>
					<a class="btn green white-text waves-effect waves-light" id="btnAddAlumno"><i class="material-icons left">add</i>Inscribir Alumno</a>
					<a class="btn green white-text waves-effect waves-light hide" id="btnOK" href=""><i class="material-icons left">done</i>OK</a>
				</div>
			</form>
		</div>
		<div class="col s12 m1 l2"></div>
			
	</div>
	</div>
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
	$('.carousel.carousel-slider').carousel({
		fullWidth: true,
		indicators: false
	});
	var preloaderCircle = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div><div class="spinner-layer spinner-red"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div><div class="spinner-layer spinner-yellow"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div><div class="spinner-layer spinner-green"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';
	$('.sidenav').sidenav();
	$('.tabs').tabs();
	$("#txtMatricula").blur(function(){
		var datos = new FormData();
		datos.append("matricula", $(this).val());
		$("#infoMatricula").html('<div class="progress"><div class="indeterminate"></div></div>');
		
		$.ajax({
				type: "POST",
				url: "checkMatricula.php",
				data: datos,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(data){
					console.log(data.estado);
					if(data.estado == "true")
					{
						$("#infoMatricula").html("<span class='white-text'><i class='material-icons left red-text'>close</i>No disponible</span>");
						$("#txtMatricula").removeClass("valid");
						$("#txtMatricula").addClass("invalid");
					}
					
					else
					{
						$("#infoMatricula").html("<span class='white-text'><i class='material-icons left green-text'>done</i>Disponible</span>");
					}
					
				}
			});
	});
	$('.modal').modal();
	$("#btnAddAlumno").on("click", function(){
		var datos = new FormData($("#createAlumno")[0]);
			var ip = "";
			var getIp = $.ajax({
			type: "GET",
			url: "http://ip-api.com/json",
			dataType: "json",
			success: function(data) {
					console.log(data);
					ip = data.query;
				}
			});
		$("#createAlumno").find('input').filter(
		 function(){
			 if($(this).attr('required'))
			 {
				 if($(this).val() == "")
				 {
					$(this).addClass("invalid");
				 }
			 }
		 });
		
		var flag = true;
		$("#createAlumno").find('input').filter(
		 function(){
			 if($(this).hasClass("invalid"))
			 {
				 flag = false;
			 }
		 });
		
		if(flag)
		{
			getIp.then(function(){
				$("#modal1").modal("open");
				datos.append("ip", ip);
				var promise = $.ajax({
						type: "POST",
						url: "addAlumno.php",
						data: datos,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(data){
							$("#modal1").modal("close");
							M.toast({html: data.estado, displayLength: 8000});
							$(this).addClass("hide");
							$("#btnOK").removeClass("hide");
							$(this).addClass("hide");
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
		}
			
	});
	$("#btnGenerate").on("click", function(){
		$.ajax({
				type: "POST",
				url: "generateMatricula.php",
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(data){
					$("#txtMatricula").val(data.matricula);
				}
			});
	});
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
</html>