<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once "../link.php";
	$matricula = $_POST['matricula'];
	$nombre = $_POST['nombre'];
	$apellidoP = $_POST['apellidoP'];
	$apellidoM = $_POST['apellidoM'];
	$semestre = $_POST['semestre'];
	
	$link = Conectarse();
	
	$array = array();
	
	$insert_alumno = mysqli_query($link, "INSERT INTO Alumno VALUES('$matricula', '$nombre', '$apellidoP', '$apellidoM', '$semestre')");
	
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