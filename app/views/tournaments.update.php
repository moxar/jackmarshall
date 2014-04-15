			<h1>Tournament - <?php echo $tournament->name; ?><h1>
			<form method="POST">
				<fieldset>
					<label>Nom du tournois<input type="text" name="name" value="<?php echo $tournament->name; ?>" /></label>
					<input type="sbumit" value="Valider" />
				</fieldset>
				<fieldset id="registeredPlayersFieldset">
<?php
foreach(Auth::user()->players as $player)
{
	if(in_array($player->id, $tournament->players))
	{
?>
					<p class="checker registeredPlayer active">
						<span><?php echo $player->name; ?></span>
						<input type="hidden" name="<?php echo $player->id; ?>" value="active" />
					</p>
<?php
	}
	else
	{
?>
					<p class="checker registeredPlayer inactive">
						<span><?php echo $player->name; ?></span>
						<input type="hidden" name="<?php echo $player->id; ?>" value="inactive" />
					</p>
<?php
	}
}
?>
				</fieldset>
				<fieldset id="newPlayersFieldset">
					<label>New player<input type="text" id="addPlayerText" /></label>
					<input type="button" value="Add player" id="addPlayerButton" />
				</fieldset>
			</form>
