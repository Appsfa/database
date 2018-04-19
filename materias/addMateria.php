<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once "../link.php";
	setlocale(LC_TIME,'es_MX');
	date_default_timezone_set('America/Mexico_City');
	// $horaRegistro = date('Y-m-d h:i:s');
	$clave = strip_tags($_POST['clave']);
	$nombre = strip_tags($_POST['nombre']);
	$objetivo = strip_tags($_POST['objetivo']);
	$optativa = strip_tags($_POST['optativa']);
	$formato = strip_tags($_POST['formato']);
	$bloque = strip_tags($_POST['bloque']);
	
	$link = Conectarse();
	
	$array = array();
	
	$insertMateria = mysqli_query($link, "INSERT INTO materia VALUES('$clave', '$nombre', '$objetivo','$optativa' ,'$formato', '$bloque')");
	
	if($insertMateria)
	{
		$array['estado'] = "materia " . $clave . " AGREGADO";
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