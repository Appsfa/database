<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once "link.php";
	setlocale(LC_TIME,'es_MX');
	date_default_timezone_set('America/Mexico_City');
	$link = Conectarse();
	$horaRegistro = date('Y-m-d h:i:s');
	$ip = $_POST['ip'];
	$enlace = $_POST['enlace'];
	$array = array();
	$datos = file_get_contents('http://ip-api.com/json/' . $ip);
	$datos = json_decode($datos);
	$insert_registro = mysqli_query($link, "INSERT INTO SESION VALUES('$ip', '$horaRegistro', '$datos->country', '$datos->regionName', '$datos->city', '$datos->lat', '$datos->lon', '$enlace')");
	if($insert_registro)
	{
		$array['estado'] = "JA JA JA HOLA BABOSA";
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