
<?php
function Conectarse() 
{ 
   if (!($link = mysqli_connect("mysql.hostinger.mx", "u408984812_pbd", "123456789qwerty", "u408984812_pbd"))) 
   { 
	  //echo "Error, Conexion a BD."; 
	//PROBLEMA EN LA BD
		header("Location: login.php?code=1");
		mysqli_close();
		exit(); 
   } 
	//echo "Conectado con el Servidor<br>";
   return $link; 
}

function ConectarseInfo() 
{ 
   if (!($link = mysqli_connect("mysql.hostinger.mx", "u408984812_pbd", "123456789qwerty", "information_schema"))) 
   { 
	  //echo "Error, Conexion a BD."; 
	//PROBLEMA EN LA BD
		header("Location: login.php?code=1");
		mysqli_close();
		exit(); 
   } 
	//echo "Conectado con el Servidor<br>";
   return $link; 
}
?>