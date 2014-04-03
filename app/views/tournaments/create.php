			<section class="container">
				<h1>Tournois</h1>
				<form method="POST" role="form" class="form" id="tournamentCreateForm">
			
					<fieldset class="form-group has-feedback">
						<label class="control-label" for="name">Nom du tournois</label>
						<input class="form-control" type="text" name="name" id="name"/>
						<span class="glyphicon form-control-feedback"></span>
						<p class="help-block"></p>
					</fieldset>
			
					<fieldset class="form-group">
						<legend>Participants</legend>
						<div class="input-group">
							<input class="form-control" type="text" name="new_player" id="new_player" placeholder="Nouveau participant" />
							<span class="input-group-btn" >
								<input class="btn btn-default" type="button" value="ajouter" id="addPlayerButton"/>
							</span>
						</div>
<?php
foreach(Auth::user()->players() as $player)
{
?>
						<input class="btn btn-default" type="button" name="players[<?php echo $player->id; ?>]" value="<?php echo $player->name; ?>" />
<?php
}
?>
					</fieldset>
				
					<fieldset class="form-group">
						<input class="btn btn-default" type="submit" value="Creer"/>
						<a class="btn btn-default" href="tournaments">Retour</a>
					</fieldset>
				
				</form>
			</section>