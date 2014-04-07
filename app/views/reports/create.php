			<h1>Reports</h1>
			<form method="POST">
				<fieldset>
					<select name="player">
<?php
foreach($players as $player)
{
	if(!is_null($opponent) && $player->id != $opponent->id)
	{
?>
					<option value="<?php echo $player->id; ?>"><?php echo $player->name; ?></option>
<?php
	}
}
?>
					</select>
					<input type="checkbox" name="victory"/>
					<input type="text" name="control" placeholder="control points"/>
					<input type="text" name="destruction" placeholder="destruction points"/>
<?php
if(!is_null($opponent))
{
?>
					<p><?php echo $opponent->name; ?></p>
<?php
}
?>
					<input type="submit" value="valider"/>
				</fieldset>
			</form>