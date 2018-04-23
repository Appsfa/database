
<!DOCTYPE html>
<html>
<head>
	<title>ALUMNOS | RUD</title> 
	<?php
	include_once "../restrict.php";
	include_once "../pagination.php";
	include "../head.php";
	?>
</head>
<?php
include "../header.php";
	include_once "../link.php";
	
	$matricula = $_GET['matricula'];
	$link = Conectarse();
	$result_matricula = mysqli_query($link, "SELECT matricula, nombre, apellidoPat, apellidoMat, semestre FROM Alumno WHERE matricula = '$matricula' ORDER BY matricula LIMIT $limit, $show");
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
	<?php include_once "../nav-wrapper.php"; ?>
	<main class="row">
		<div class="">
		  <ul class="tabs">
			<li class="tab col s6 l4"><a class="active" href="#general">GENERAL</a></li>
			<li class="tab col s6 l4"><a href="#inscribir">INSCRIBIR MATERIA</a></li>
		  	<li class="tab col s6 l4"><a href="#materias">MATERIAS</a></li>
		  </ul>
		</div>
		<div class="row" id="general">
			<div class="col s12 m1 l2"></div>
			<div class="col s12 m10 l8">
				<br><br>
				<form class="white-text" id="updateAlumno">
					<div class="col s12 left">
						Matricula: <?php echo $rowAlumno->matricula; ?>
					</div>
					<div class="col s12">
						<div class="col s8" id="infoMatricula"></div>
						<br><br>
					</div>
					<div class="col s12 m4 input-field">
						<input type="text" class="validate white-text" id="txtNombre" name="nombre" required value="<?php echo $rowAlumno->nombre; ?>">
						<label for="txtNombre">Nombre</label>
					</div>
					<div class="col s12 m4 input-field">
						<input type="text" class="validate white-text" id="txtApellidoP" name="apellidoP" required value="<?php echo $rowAlumno->apellidoPat; ?>">
						<label for="txtApellidoP">Apellido Paterno</label>
					</div>
					<div class="col s12 m4 input-field">
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
		<div class="row" id="inscribir">
			<div class="col s12 m1"></div>
			<div class="col s12 m10">
				<br><br>
				<div class="col s12 center">
					<a class="btn blue waves-effect waves-light" id="btnShowBlocks">MOSTRAR POR BLOQUES</a>
					<a class="btn blue waves-effect waves-light hide" id="btnShowAll">MOSTRAR TODAS LAS MATERIAS</a>
					<br><br>
				</div>
				<div class="col s12" id="divMaterias">
					<table class="highlight responsive-table centered white-text" id="tableMaterias">
						<thead>
							<tr>
								<th>CLAVE</th>
								<th>NOMBRE DE LA MATERIA</th>
								<th>FROMATO</th>
								<th>SELECT</th>
								<th>INSCRIBIR</th>
							</tr>
						</thead>
						<tbody id="tableBodyMaterias">
							<?php 
							$result_inscribir = mysqli_query($link, "SELECT DISTINCT(clave), nombre, formato FROM Materia WHERE clave NOT IN(SELECT requisitoMat FROM Requisito) OR clave IN (SELECT esRequisito FROM Requisito WHERE (esRequisito IN (SELECT Materia_clave FROM Materia_Alumno, Alumno WHERE Alumno_matricula = matricula AND Alumno_matricula = '$matricula' AND calificacion = '1') AND orand = '') OR ((esRequisito IN (SELECT Materia_clave FROM Materia_Alumno, Alumno WHERE Alumno_matricula = matricula AND Alumno_matricula = '$matricula' AND calificacion = '1') AND orand = 'or') OR (esRequisito IN (SELECT Materia_clave FROM Materia_Alumno, Alumno WHERE Alumno_matricula = matricula AND Alumno_matricula = '$matricula' AND calificacion = '1') AND orand = 'or')) OR ((esRequisito IN (SELECT Materia_clave FROM Materia_Alumno, Alumno WHERE Alumno_matricula = matricula AND Alumno_matricula = '$matricula' AND calificacion = '1') AND orand = 'and') AND (esRequisito IN (SELECT Materia_clave FROM Materia_Alumno, Alumno WHERE Alumno_matricula = matricula AND Alumno_matricula = '$matricula' AND calificacion = '1') AND orand = 'and'))) ORDER BY clave");
							
							if(mysqli_num_rows($result_inscribir) > 0)
							{
								while($row_inscribir = mysqli_fetch_object($result_inscribir))
								{
									?>
									<tr>
										<th class="center"><?php echo $row_inscribir->clave; ?></th>
										<th class="center"><?php echo $row_inscribir->nombre; ?></th>
										<th class="center"><?php echo $row_inscribir->formato; ?></th>
										<td class="center"><a class="btn blue waves-effect waves-light select-materia" id="<?php echo $row_inscritas->Materia_clave; ?>" href="http://www.apps-fa.com/proyects/database/materias/rud.php?materia=<?php echo $row_inscribir->clave; ?>"><i class="left material-icons">adjust</i>SELECT</a></td>
										<td class="center"><a class="btn green waves-effect waves-light inscribir-materia" id="<?php echo $row_inscribir->clave; ?>"><i class="left material-icons">add</i>INSCRIBIR</a></td>
									</tr>
									<?php
								}		
							}
							
							else
							{
								?>
								<tr><td colspan="5">No hay materias inscritas</td></tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="col s12 hide" id="materiasBloques">
					<ul class="collapsible">
						<?php
						$result_bloques = mysqli_query($link, "SELECT DISTINCT(Bloques_nombreBloque) FROM `Materia` GROUP BY Bloques_nombreBloque ORDER BY Bloques_nombreBloque");
						if(mysqli_num_rows($result_bloques) > 0)
						{
							while($row_bloques = mysqli_fetch_object($result_bloques))
							{
								if($row_bloques->Bloques_nombreBloque == "")
								{
									$nombreBloque = "Sin Bloque";
								}

								else
								{
									$nombreBloque = $row_bloques->Bloques_nombreBloque;
								}
								?>
								<li>
									<div class="collapsible-header"><i class="material-icons">list</i><?php echo $nombreBloque; ?></div>
									<div class="collapsible-body">
										<br><br>
										<table class="white-text responsive-table highlight centered" id="<?php echo $nombreBloque; ?>">
											<thead>
												<tr>
													<th>CLAVE</th>
													<th>NOMBRE DE LA MATERIA</th>
													<th>FROMATO</th>
													<th>SELECT</th>
													<th>INSCRIBIR</th>
												</tr>
											</thead>
											<tbody id="tableBody<?php echo $nombreBloque; ?>">
												<?php 
												$result_inscribir_bloque = mysqli_query($link, "SELECT DISTINCT(clave), nombre, formato FROM Materia WHERE Bloques_nombreBloque = '$row_bloques->Bloques_nombreBloque' AND clave NOT IN(SELECT requisitoMat FROM Requisito) OR clave IN (SELECT esRequisito FROM Requisito WHERE (esRequisito IN (SELECT Materia_clave FROM Materia_Alumno, Alumno WHERE Alumno_matricula = matricula AND Alumno_matricula = '$matricula' AND calificacion = '1') AND orand = '') OR ((esRequisito IN (SELECT Materia_clave FROM Materia_Alumno, Alumno WHERE Alumno_matricula = matricula AND Alumno_matricula = '$matricula' AND calificacion = '1') AND orand = 'or') OR (esRequisito IN (SELECT Materia_clave FROM Materia_Alumno, Alumno WHERE Alumno_matricula = matricula AND Alumno_matricula = '$matricula' AND calificacion = '1') AND orand = 'or')) OR ((esRequisito IN (SELECT Materia_clave FROM Materia_Alumno, Alumno WHERE Alumno_matricula = matricula AND Alumno_matricula = '$matricula' AND calificacion = '1') AND orand = 'and') AND (esRequisito IN (SELECT Materia_clave FROM Materia_Alumno, Alumno WHERE Alumno_matricula = matricula AND Alumno_matricula = '$matricula' AND calificacion = '1') AND orand = 'and'))) ORDER BY clave");

												if(mysqli_num_rows($result_inscribir_bloque) > 0)
												{
													while($row_inscribir_bloque = mysqli_fetch_object($result_inscribir_bloque))
													{
														?>
														<tr>
															<th class="center"><?php echo $row_inscribir_bloque->clave; ?></th>
															<th class="center"><?php echo $row_inscribir_bloque->nombre; ?></th>
															<th class="center"><?php echo $row_inscribir_bloque->formato; ?></th>
															<td class="center"><a class="btn blue waves-effect waves-light select-materia" id="<?php echo $row_inscritas->Materia_clave; ?>" href="http://www.apps-fa.com/proyects/database/materias/rud.php?materia=<?php echo $row_inscribir_bloque->clave; ?>"><i class="left material-icons">adjust</i>SELECT</a></td>
															<td class="center"><a class="btn green waves-effect waves-light inscribir-materia" id="<?php echo $row_inscribir_bloque->clave; ?>"><i class="left material-icons">add</i>INSCRIBIR</a></td>
														</tr>
														<?php
													}		
												}

												else
												{
													?>
													<tr><td colspan="5">No hay materias inscritas</td></tr>
													<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</li>
								<?php
							}
						}

						else
						{
							?>
							<br><br>
							<div class="col s12 center">
								NO HAY BLOQUES, QUE RARO!
							</div>
							<?php
						}
						?>
					</ul>
				</div>
			</div>
			<div class="col s12 m1"></div>
		</div>
		<div class="row" id="materias">
			<br><br>
			<table class="highlight centered responsive-table white-text">
				<thead>
					<th>Materia</th>
					<th>Estado</th>
					<th>Aprobada</th>
					<th>Select</th>
					<th>Delete</th>
				</thead>
				<tbody>
					<?php
					$result_inscritas = mysqli_query($link, "SELECT * FROM Materia_Alumno WHERE Alumno_matricula = '$matricula'");
					if(mysqli_num_rows($result_inscritas) > 0)
					{
						while($row_inscritas = mysqli_fetch_object($result_inscritas))
						{
							?>
							<tr>
								<td class="center"><?php echo $row_inscritas->Materia_clave;  ?></td>
								<td class="center"><?php echo $row_inscritas->estadoMat;  ?></td>
								<td class="center"><?php echo $row_inscritas->calificacion;  ?></td>
								<td class="center"><a class="btn green waves-effect waves-light select-materia" id="<?php echo $row_inscritas->Materia_clave; ?>" href="http://www.apps-fa.com/proyects/database/materias/rud.php?materia=<?php echo $row_inscritas->Materia_clave; ?>"><i class="left material-icons">adjust</i>SELECT</a></td>
								<td class="center"><a class="btn red waves-effect waves-light delete-materia" id="<?php echo $row_inscritas->Materia_clave; ?>"><i class="left material-icons">delete</i>DELETE</a></td>
							</tr>
							<?php
						}
					}
					
					else
					{
						?>
						<tr><td colspan="5">No hay materias inscritas</td></tr>
						<?php
					}
					?>
				</tbody>
			</table>
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
	 $('.collapsible').collapsible();
	$(document).on("click", ".delete", function(){
		$("#modalDelete").modal("open");
		$("#spanMatricula").html($(this).attr("id"));
	});
	$("#btnShowBlocks").on("click", function(){
		$("#tableMaterias").addClass("hide");
		$("#materiasBloques").removeClass("hide");
		$(this).addClass("hide");
		$("#btnShowAll").removeClass("hide");
	});
	$("#btnShowAll").on("click", function(){
		$("#tableMaterias").removeClass("hide");
		$("#materiasBloques").addClass("hide");
		$(this).addClass("hide");
		$("#btnShowBlocks").removeClass("hide");
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