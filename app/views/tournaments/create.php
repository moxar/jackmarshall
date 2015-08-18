			<section class="container">
				<nav><a href="tournaments">Tournois</a> &gt; Nouveau</nav>
				<h1>Création</h1>
				<section class="view tournament-create">
					<form method="POST">
						<div class="row">
							<div class="col-md-12">
								<h3>Paramètres</h3>
								<div>
									<label>Nom du tournois</label>
								</div>
								<div>
									<div class="input-group">
										<input type="text" name="name" value="<?= $tournament->name; ?>" class="form-control"/>
										<input type="submit" value="Valider" class="btn btn-default"/>
									</div>
								</div>
							</div>
						</div>
						<hr/>
<!--						
						<div class="row">
							<div class="col-md-12">
								<h3>Joueurs</h3>
								<div>
									<label>Nouveau joueur<label>
								</div>
								<div class="group-add-player input-group">
									<input type="text" class="form-control"/>
									<input type="button" value="Ajouter" class="btn btn-default"/>
								</div>
							</div>
							<div class="col-md-6 players-pool">
								<h4>Joueurs existants</h4>
								<ul class="list-group">
<?php
$players->each(function($player) {
?>
									<li class="list-group-item" data-id="<?= $player->id; ?>" data-name="<?= $player->name; ?>">
										<i class="btn btn-link fa fa-plus btn-add-player"></i> 
										<?= $player->name; ?>
									</li>				
<?php
});
?>
								</ul>
							</div>
							<div class="col-md-6 players-registered">
								<h4>Joueurs inscrits<span></span></h4>
								<ul class="list-group">
								</ul>
								<div class="template">
									<li class="player list-group-item">
										<i class="btn btn-link btn-remove fa fa-times"></i>
										<span></span>
										<input type="hidden" />
									</li>
								</div>
							</div>
						</div>
-->						
						<div class="row">					
							<div class="col-md-6">
								<h4>Tables</h4>
								<ul class="list-group">
<?php
$maps->each(function($map) {
?>
									<li class="map list-group-item">
										<label class="control-label"><input type="checkbox" name="maps[<?= $map->id; ?>]"> <?= $map->name; ?></label>
										<ul class="list-group">
										</ul>
										<input type="hidden" name="scenarii-of-map[<?= $map->id; ?>]"/>
									</li>
<?php
});
?>
								</ul>
							</div>
							<div class="col-md-6">
								<h4>Scenarii</h4>
								<ul class="list-group">
<?php
$scenarii->each(function($scenario) {
?>
									<li class="scenario list-group-item" data-id="<?= $scenario->id; ?>">
										<i class="btn btn-link btn-remove fa fa-times"></i>
										<label class="control-label"><?= $scenario->id; ?>. <?= $scenario->name; ?></label>
									</li>
<?php
});
?>
								</ul>
							</div>
						</div>
					</form>
				</section>
			</section>
