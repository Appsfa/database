<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once "../link.php";
	$matricula = $_POST['matricula'];
	$link = Conectarse();
	$array = array();
	
	$result_matricula = mysqli_query($link, "SELECT * FROM Alumno WHERE matricula = '$matricula'");
	
	if(mysqli_num_rows($result_matricula) > 0)
	{
		$array['estado'] = 'true';
	}
	
	else
	{
		$array['estado'] = 'false';
	}
	
	print(json_encode($array));
	mysqli_close($link);
}

else
{
	header("Location: http://www.apps-fa.com/proyects/database");
}
?>