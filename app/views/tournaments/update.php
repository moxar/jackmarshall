			<h1>Tournois - <?php echo is_null($tournament->name) ? "Nouveau" : $tournament->name; ?></h1>
			<script type="text/javascript" src="js/tournaments.create.js"></script>
			<form method="POST" id="#tournamentCreateForm">
				<fieldset>
					<label>Nom du tournois<input type="text" name="name" value="<?php echo $tournament->name; ?>" class="form-control"/></label>
					<input type="submit" value="Valider" class="btn btn-default"/>
				</fieldset>
				<fieldset id="registeredPlayersFieldset">
<?php
foreach(Auth::user()->playersButFantom as $player)
{
	if(in_array($player->id, $tournamentPlayers))
	{
?>
					<p class="checker registeredPlayer active">
						<span><?php echo $player->name; ?></span>
						<input type="hidden" name="players[<?php echo $player->id; ?>]"/>
					</p>
<?php
	}
	else
	{
?>
					<p class="checker registeredPlayer inactive">
						<span><?php echo $player->name; ?></span>
						<input type="hidden" name="players[<?php echo $player->id; ?>]" disabled="disabled"/>
					</p>
<?php
	}
}
?>
				</fieldset>
				<fieldset id="newPlayersFieldset">
					<label>New player<input type="text" id="addPlayerText"  class="form-control"/></label>
					<input type="button" value="Add player" id="addPlayerButton" class="btn btn-default"/>
				</fieldset>
			</form>
