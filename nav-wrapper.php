
<?php
//$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
//echo "http://" . $host . $url;
$archivos = explode("/", $url);
var_dump($archivos);
if(($archivos[count($archivos) - 1]) == "")
{
	$tam = count($archivos) - 1;
}

else
{
	$tam = count($archivos);
}
?>
	<nav>
		<div class="nav-wrapper light-blue lighten-2" style="padding-left: 2%">
			<div class="col s12">
				<?php
				$url = "";
				for($i = 2; $i < $tam; $i++)
				{
					$url .= $archivos[$i];
					$nombre = str_replace(".php", "", $url);
					?>
					<a href="http://www.apps-fa.com/proyects/<?php echo $url; ?>" class="breadcrumb"><?php echo $archivos[$i]; ?></a>
					<?php
					$url .= "/";
				}
				?>
			</div>
		</div>
	</nav>