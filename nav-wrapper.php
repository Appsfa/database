
<?php
$url= $_SERVER["REQUEST_URI"];
echo $url . "<br>";
$archivos = explode("/", $url);
var_dump($archivos);

for($i = 1; i < count($archivos); $i++)
{
	
}
?>
<div class="">
  <ul class="tabs">
	<li class="tab col s6"><a class="active" href="#general">GENERAL</a></li>
	<li class="tab col s6"><a href="#alum">ALUMNOS</a></li>
  </ul>
</div>