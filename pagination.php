<?php
function pagination($column, $table, $alias)
{
	$link = Conectarse();

	if(isset($_GET['pag']))
	{
		$pag = $_GET['pag'];
		$show = $_GET['show'];
		$limit = ($pag - 1) * $show;

		$result_num_table= mysqli_query($link, "SELECT (COUNT($column)) AS $alias FROM $table");

		$numeroTotal = mysqli_fetch_object($result_num_table);
		$numPag = $numeroTotal->$alias/$show;
		$numPag = ceil($numPag);

		?><ul class="pagination"><?php

		for($i = 1; $i <= $numPag; $i++)
		{
			//SI EMPIEZA
			if($pag == 1 && $i == 1)
			{
				?>
				<li class=" waves-effect waves-light disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
				<?php

				//SI LA PAGINA ES DONDE ESTAMOS
				if($i == $pag)
				{
					//SI ES LA ULTIMA PAGINA
					if($i == $numPag)
					{
						?>
						<li class="active waves-effect waves-light"><a href="?pag=<?php echo $i; ?>&show=<?php echo $show; ?>"><?php echo $i; ?></a></li>
						<li class="waves-effect waves-light disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
						<?php
					}

					else
					{
						?>
						<li class="active waves-effect waves-light"><a href="?pag=<?php echo $i; ?>&show=<?php echo $show; ?>"><?php echo $i; ?></a></li>
						<?php
					}
				}

				//SI NO ES LA PAGINA DONDE ESTAMOS
				else
				{
					?>
					<li class="waves-effect waves-light"><a href="?pag=<?php echo $i; ?>&show=<?php echo $show; ?>"><?php echo $i; ?></a></li>
					<?php
				}

			}

			//SI YA NO ES EL PRINCIPIO
			else
			{
				if($i == 1)
				{
					?>
					<li class=" waves-effect waves-light"><a href="?pag=<?php echo $pag - 1; ?>&show=<?php echo $show; ?>"><i class="material-icons">chevron_left</i></a></li>
					<?php
					//SI LA PAGINA ES DONDE ESTAMOS
					if($i == $pag)
					{
						//SI ES LA ULTIMA PAGINA
						if($i == $numPag)
						{
							?>
							<li class="active waves-effect waves-light"><a href="?pag=<?php echo $i; ?>&show=<?php echo $show; ?>"><?php echo $i; ?></a></li>
							<li class="waves-effect waves-light disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
							<?php
						}

						else
						{
							?>
							<li class="active waves-effect waves-light"><a href="?pag=<?php echo $i; ?>&show=<?php echo $show; ?>"><?php echo $i; ?></a></li>
							<?php
						}
					}

					//SI NO ES LA PAGINA DONDE ESTAMOS
					else
					{
						?>
						<li class="waves-effect waves-light"><a href="?pag=<?php echo $i; ?>&show=<?php echo $show; ?>"><?php echo $i; ?></a></li>
						<?php
					}
				}

				else
				{
					//SI LA PAGINA ES DONDE ESTAMOS
					if($i == $pag)
					{
						//SI ES LA ULTIMA PAGINA
						if($i == $numPag)
						{
							?>
							<li class="active waves-effect waves-light"><a href="?pag=<?php echo $i; ?>&show=<?php echo $show; ?>"><?php echo $i; ?></a></li>
							<li class="waves-effect waves-light disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
							<?php
						}

						else
						{
							?>
							<li class="active waves-effect waves-light"><a href="?pag=<?php echo $i; ?>&show=<?php echo $show; ?>"><?php echo $i; ?></a></li>
							<?php
						}
					}

					//SI NO ES LA PAGINA DONDE ESTAMOS
					else
					{
						//SI ES LA ULTIMA PAGINA
						if($i == $numPag)
						{
							?>
							<li class="waves-effect waves-light"><a href="?pag=<?php echo $i; ?>&show=<?php echo $show; ?>"><?php echo $i; ?></a></li>
							<li class="waves-effect waves-light"><a href="?pag=<?php echo $pag + 1; ?>&show=<?php echo $show; ?>"><i class="material-icons">chevron_right</i></a></li>
							<?php
						}

						else
						{
							?>
							<li class="waves-effect waves-light"><a href="?pag=<?php echo $i; ?>&show=<?php echo $show; ?>"><?php echo $i; ?></a></li>
							<?php
						}
					}
				}
			}

		}

		?></ul><?php
	}
}
?>