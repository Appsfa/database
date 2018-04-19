<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once "../link.php";
	$array = array();
	$link = Conectarse();
	$result_alumnos = mysqli_query($link, "SELECT matricula, nombre, apellidoPat, apellidoMat, semestre FROM Alumno WHERE 1");
	
	if(mysqli_num_rows($result_alumnos) > 0)
	{
		while($row_alumnos = mysqli_fetch_object($result_alumnos))
		{
			$array[] = $row_alumnos;
		}
	}
	
	else
	{
		
	}
	
	print(json_encode($array));
	mysqli_close($link);
}

else
{
	header("Location: http://www.apps-fa.com/proyects/database");
}
?>