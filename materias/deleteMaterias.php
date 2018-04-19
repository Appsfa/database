<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once "../link.php";
	$clave = $_POST['clave'];
	
	$link = Conectarse();
	
	$array = array();
	
	$delete_alumno = mysqli_query($link, "DELETE FROM  Materia WHERE  clave = '$clave'");
	
	if($delete_alumno)
	{
		$array['estado'] = "Materia " . $clave . " BORRADO";
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