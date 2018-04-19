<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once "../link.php";
	$Clave = strip_tags($_POST['Clave']);
	$link = Conectarse();
	$array = array();
	
	$result_Clave = mysqli_query($link, "SELECT * FROM Materia WHERE clave = '$Clave'");
	
	if(mysqli_num_rows($result_Clave) > 0)
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