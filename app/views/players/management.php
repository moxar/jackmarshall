			<section class="container">
				<script type="text/javascript" src="js/players.create.js"></script>
				<form method="POST" id="#tournamentCreateForm">
					<fieldset>
						<label>Nom du tournois<input type="text" name="name" value="<?php echo $tournament->name; ?>" class="form-control"/></label>
						<input type="submit" value="Valider" class="btn btn-default"/>
					</fieldset>
					<fieldset id="registeredPlayersFieldset">
<?php
$pt = 0;
while($pt < count($players)) {		
	for($ct = 0; $ct < 6; $ct++)
	{
		if(!isset($players[$pt])) break 2;
		$player = $players[$pt];
		if(in_array($player->id, $tournamentPlayers))
		{
?>
							<section class="cell checker registeredPlayer active">
								<span><?php echo $player->name; ?></span>
								<input type="hidden" name="players[<?php echo $player->id; ?>]"/>
							</section>
<?php
		}
		else
		{
?>
							<section class="cell checker registeredPlayer inactive">
								<span><?php echo $player->name; ?></span>
								<input type="hidden" name="players[<?php echo $player->id; ?>]" disabled="disabled"/>
							</section>
<?php
		}
		$pt++;
	}
}
?>
					</fieldset>
					<fieldset>
						<label>New player<input type="text" id="addPlayerText"  class="form-control"/></label>
						<input type="button" value="Add player" id="addPlayerButton" class="btn btn-default"/>
					</fieldset>
					<fieldset id="newPlayersFieldset">
					</fieldset>
				</form>
			</section>
