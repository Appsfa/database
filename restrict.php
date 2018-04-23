<?php
include_once "link.php";

$ruta = $_SERVER['PHP_SELF'];

$linkRestrict = Conectarse();

$result_ruta = mysqli_query($linkRestrict, "SELECT * FROM RUTAS_has_VARIABLES WHERE ruta = '$ruta'");
if(mysqli_num_rows($result_ruta) > 0)
{
	while($row_ruta = mysqli_fetch_object($result_ruta))
	{
		if(($row_ruta->variable == "matricula") || ($row_ruta->variable == "clave"))
		{
			if(isset($_GET[$row_ruta->variable]))
			{
				$i = 0;
				
			 	$result_ruta_pag = mysqli_query($linkRestrict, "SELECT * FROM RUTAS_has_VARIABLES WHERE ruta = '$ruta'");
				
				if(mysqli_num_rows($result_ruta_pag) > 0)
				{
					while($row_ruta_pag = mysqli_fetch_object($result_ruta_pag))
					{
						if(!(isset($_GET[$row_ruta_pag->variable])))
						{
							if($row_ruta_pag->variable == "show")
							{
								$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&" . $row_ruta_pag->variable . "=15";
								header("Location: $url");
							}
							
							else if($row_ruta_pag->variable == "pag")
							{
								$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&" . $row_ruta_pag->variable . "=1";
								header("Location: $url");
							}
						}
					}
				}
			}
			
			else
			{
				header("Location: http://www.apps-fa.com/proyects/database/");
			}
		}
		
		else if(($row_ruta->variable == "show") || ($row_ruta->variable == "pag"))
		{
			if(!(isset($_GET[$row_ruta->variable])))
			{
				if($row_ruta->variable == "show")
				{
					$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&" . $row_ruta->variable . "=15";
					header("Location: $url");
				}

				else if($row_ruta->variable == "pag")
				{
					$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&" . $row_ruta->variable . "=1";
					header("Location: $url");
				}
			}
		}
	}
	
	mysqli_close($linkRestrict);
}

?>