<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once "../link.php";
	$matricula = $_POST['matricula'];
	
	$link = Conectarse();
	
	$array = array();
	
	$delete_alumno = mysqli_query($link, "DELETE FROM  Alumno WHERE  matricula = '$matricula'");
	
	if($delete_alumno)
	{
		$array['estado'] = "Alumno " . $matricula . " BORRADO";
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