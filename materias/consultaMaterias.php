<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once "../link.php";
	$array = array();
	$link = Conectarse();
	$result_materias = mysqli_query($link, "SELECT * FROM materia WHERE 1");
	
	if(mysqli_num_rows($result_materia) > 0)
	{
		while($row_materia = mysqli_fetch_object($result_materia))
		{
			$array[] = $row_materia;
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