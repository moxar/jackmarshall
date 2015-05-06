			<section class="container">
				<form method="POST" id="tournamentCreateForm">
					<fieldset>
						<div class="row">
							<label>Nom du tournois</label>
						</div>
						<div class="row">
							<div class="input-group">
								<input type="text" name="name" value="<?php echo $tournament->name; ?>" class="form-control"/>
								<input type="submit" value="Valider" class="btn btn-default"/>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="row">
							<label>New player<label>
						</div>
						<div class="row">
							<div class="input-group">
								<input type="text" id="addPlayerText"  class="form-control"/></label>
								<input type="button" value="Add player" id="addPlayerButton" class="btn btn-default"/>
							</div>
						</div>
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
					<fieldset id="newPlayersFieldset">
					</fieldset>
				</form>
			</section>
