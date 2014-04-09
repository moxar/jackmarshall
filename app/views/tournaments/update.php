			<h1>Tournament - Update<h1>
			<form method="POST">
				<fieldset>
					<legend></legend>
					<input type="text" name="name" value="<?php echo $tournament->name; ?>" />
					<input type="sbumit" value="update" />
				</fieldset>
				<fieldset id="registeredPlayersFieldset">
<?php
foreach($players as $player)
{
	if(in_array($player->id, $tournamentPlayers))
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
