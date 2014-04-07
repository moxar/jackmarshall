			<section class="container">
				<h2>Nouveau tournois</h2>
				<fieldset class="form-group">
					<input class="btn btn-default" type="submit" value="Creer"/>
					<a class="btn btn-default" href="tournaments">Retour</a>
				</fieldset>
				<hr/>
				<form method="POST" role="form" class="form" id="tournamentCreateForm">
					<fieldset class="form-group">
						<h2>Informations sur le tournois</h2>
						<div class="row has-feedback">
							<div class="col-xs-3">
								<label class="control-label" for="name">Nom du tournois</label>
							</div>
							<div class="col-xs-3">
								<input class="col-xs-2 form-control" type="text" name="name" id="name"/>
								<span class="glyphicon form-control-feedback"></span>
							</div>
							<div class="col-xs-6">
								<p class="help-block"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<label class="control-label" for="new_player">Nouveau joueur</label>
							</div>
							<div class="col-xs-3">
								<input class="form-control" type="text" name="new_player" id="new_player"/>
							</div>
							<div class="col-xs-3">
								<input class="btn btn-default" type="button" value="ajouter" id="addPlayerButton"/>
							</div>
						</div>
					</fieldset>
					<div class="row">
						<fieldset class="form-group">
							<div class="col-xs-6">
								<h2>Joueurs existants</h2>
								<hr>
<?php
foreach($players as $player)
{
?>
								<p class="inactive"><?php echo $player->name; ?>
									<input type="hidden" name="players[<?php echo $player->id; ?>]" value="inactive" data-id="<?php echo $player->id; ?>"/>
								</p>
<?php
}
?>
							</div>
							<div class="col-xs-6">
								<h2>Nouveaux joueurs</h2>
								<hr>
							</div>
						</fieldset>
					</div>
				</form>
			</section>