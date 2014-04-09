			<h1>Tournament - Create<h1>
			<form method="POST">
				<fieldset>
					<legend></legend>
					<input type="text" name="name" placeholder="tournament's name" />
					<input type="sbumit" value="create" />
				</fieldset>
				<fieldset id="registeredPlayersFieldset">
<?php
foreach($players as $player)
{
?>
					<p class="checker registeredPlayer inactive">
						<span><?php echo $player->name; ?></span>
						<input type="hidden" name="<?php echo $player->id; ?>" value="inactive" />
					</p>
<?php
}
?>
				</fieldset>
				<fieldset id="newPlayersFieldset">
					<label>New player<input type="text" id="addPlayerText" /></label>
					<input type="button" value="Add player" id="addPlayerButton" />
				</fieldset>
			</form>