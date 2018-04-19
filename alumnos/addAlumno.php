<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once "../link.php";
	setlocale(LC_TIME,'es_MX');
	date_default_timezone_set('America/Mexico_City');
	$horaRegistro = date('Y-m-d h:i:s');
	$matricula = strip_tags($_POST['matricula']);
	$nombre = strip_tags($_POST['nombre']);
	$apellidoP = strip_tags($_POST['apellidoP']);
	$apellidoM = strip_tags($_POST['apellidoM']);
	$semestre = strip_tags($_POST['semestre']);
	$ip = strip_tags($_POST['ip']);
	
	$link = Conectarse();
	
	$array = array();
	
	$insert_alumno = mysqli_query($link, "INSERT INTO Alumno VALUES('$matricula', '$nombre', '$apellidoP', '$apellidoM', '$semestre', '$horaRegistro', '$ip')");
	
	if($insert_alumno)
	{
		$array['estado'] = "Alumno " . $matricula . " AGREGADO";
	}
	
	else
	{
		$array['estado'] = mysqli_error($link);
	}
	
	print(json_encode($array));
	mysqli_close($link);
}

else
{
	header("Location: http://www.apps-fa.com/proyects/database");
}
?>