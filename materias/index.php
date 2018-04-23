<!DOCTYPE html>
<html>
<head>
	<title>Materias</title> 
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
	<?php include "../nav-wrapper.php"; ?>
	<div class="row">
	<div class="">
	  <ul class="tabs">
		<li class="tab col s4"><a href="#create">CREATE</a></li>
		<li class="tab col s4"><a class="active" href="#materias">Materias</a></li>
	  	<li class="tab col s4"><a href="#bloques">BLOQUES</a></li>
	  </ul>
	</div>
	<div id="materias" class="row">
		<div class="col s12 m1"></div>
		<div class="col s12 m10">
			<br><br>
			<table class="white-text responsive-table highlight centered">
				<thead>
					<tr>
						<th>Clave</th>
						<th>Nombre</th>
						<th>Optativa</th>
						<th>Formato</th>
						<th>Bloque</th>
						<th>Select</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody id="tableMateria">
				<?php
				$result_materias = mysqli_query($link, "SELECT * FROM Materia WHERE 1");
				if(mysqli_num_rows($result_materias) > 0)
				{
					while($row_result_materias = mysqli_fetch_object($result_materias))
					{
						?>
						<tr>
							<td><?php echo $row_result_materias->clave; ?></td>
							<td><?php echo $row_result_materias->nombre; ?></td>
							<td><?php echo $row_result_materias->optativa; ?></td>
							<td><?php echo $row_result_materias->formato; ?></td>
							<td><?php echo $row_result_materias->Bloques_nombreBloque; ?></td>
							<td><a href="http://www.apps-fa.com/proyects/database/materias/rud.php?clave=<?php echo $row_result_materias->clave; ?>" class="btn green white-text waves-effect waves-light select" id="<?php echo $row_result_materias->clave; ?>"><i class="material-icons left">adjust</i>SELECT</a></td>
							<td><a class="btn red white-text waves-effect waves-light delete" id="<?php echo $row_result_materias->clave; ?>"><i class="material-icons left">delete</i>DELETE</a></td>
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
			<form class="white-text" id="createMateria">
				<div class="col s8 input-field">
					<input type="text" class="validate white-text" id="txtMatricula" name="clave" required>
					<label for="txtMatricula"><span class="red-text">* </span>Clave</label>
				</div>
				<div class="col s4 center">
					<a class="btn grey white-text waves-effect" id="btnGenerate"><i class="material-icons left">settings</i>Generar Clave</a>
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
					<input type="text" class="validate white-text" id="txtApellidoP" name="objetivo" required>
					<label for="txtApellidoP"><span class="red-text">* </span>Objetivo</label>
				</div>
				<div class="col s4 input-field">
					<input type="text" class="validate white-text" id="txtApellidoM" name="optativa" required>
					<label for="txtApellidoM"><span class="red-text">* </span>Optativa</label>
				</div>
				<div class="col s12 input-field">
					<input type="text" class="validate white-text" id="txtSemestre" name="formato" required>
					<label for="txtSemestre"><span class="red-text">* </span>Formato</label>
				</div>
				<div class="col s12 input-field">
				<select name="bloque" id="txtBloque">
				<option value="" disabled selected>Escoge una opción</option>
					<?php 
					$result_bloques = mysqli_query($link, "SELECT * FROM Bloques Order by nombreBloque");
					if(mysqli_num_rows($result_bloques) > 0)
						{
								while($rowBloques = mysqli_fetch_object($result_bloques)){
									if($rowBloques->nombreBloque == ""){
										?>
									<option value="<?php echo $rowBloques->nombreBloque ?>" >Sin Bloque</option>
									<?php
									}
									else{
										?>
										<option value="<?php echo $rowBloques->nombreBloque ?>" ><?php echo $rowBloques->nombreBloque ?></option>
										<?php
									}
									
								}

						}
					?>
					</select>
					<label>Bloques</label>
				</div>
				<div class="left col s12">
				<br><br>
					<span class="red-text">* Campos requeridos</span>
				</div>
				<div class="center col s12">
					<br><br>
					<a class="btn green white-text waves-effect waves-light" id="btnAddAlumno"><i class="material-icons left">add</i>Agregar Materia</a>
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
	$('select').formSelect();
	$("#txtClave").blur(function(){
		var datos = new FormData();
		datos.append("Clave", $(this).val());
		$("#infoClave").html('<div class="progress"><div class="indeterminate"></div></div>');
		
		$.ajax({
				type: "POST",
				url: "checkClave.php",
				data: datos,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(data){
					console.log(data.estado);
					if(data.estado == "true")
					{
						$("#infoClave").html("<span class='white-text'><i class='material-icons left red-text'>close</i>No disponible</span>");
						$("#txtClavve").removeClass("valid");
						$("#txtClave").addClass("invalid");
					}
					
					else
					{
						$("#infoClave").html("<span class='white-text'><i class='material-icons left green-text'>done</i>Disponible</span>");
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