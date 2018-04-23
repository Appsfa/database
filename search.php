<?php
function createSearch($defaultColumn, $arrayColumn)
{
	?>
	<div class="col s12 center">
		<br><br>
		<form id="formSearch">
			<div class="col s3 input-field">
				<input type="text" class="validate" id="txtSearch">
				<label for="txtSearch">Buscador</label>
			</div>
			<div class="col s3 cente">
				<label>Columna</label>
				<select class="browser-default" name="column">
					<option value="" disabled>Seleccionar Columna</option>
					<?php
					for($i = 0; $i < count($arrayColumn); $i++)
					{
						if($arrayColumn[$i] == $defaultColumn)
						{
							?>
							<option value="<?php echo $arrayColumn[$i]; ?>" selected><?php echo $arrayColumn[$i]; ?></option>
							<?php
						}

						else
						{
							?>
							<option value="<?php echo $arrayColumn[$i]; ?>"><?php echo $arrayColumn[$i]; ?></option>
							<?php
						}

					}
					?>
				</select>
			</div>
			<div class="col s3 center">
				<label>Orden</label>
				<select class="browser-default" name="orden">
					<option value="ASC" selected>ASC</option>
					<option value="DESC" selected>DESC</option>
				</select>
			</div>
			<div class="col s3 center">
				<label>Show</label>
				<select class="browser-default" name="show">
					<option value="15" selected>15</option>
					<option value="25" selected>25</option>
					<option value="50" selected>50</option>
					<option value="100" selected>100</option>
				</select>
			</div>
		</form>
	</div>
	<?php
}
?>