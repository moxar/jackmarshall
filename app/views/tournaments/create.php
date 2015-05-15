				<section class="container">
                                    <nav><a href="tournaments">Tournois</a> &gt; Nouveau</nav>
                                    <h1>Création</h1>
                                    <section class="view tournament-create">
                                        <form method="POST">
                                                <div class="row">
							<div class="col-md-6">
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
                                                            <div>
                                                                    <div>
                                                                            <label>Nouveau joueur<label>
                                                                    </div>
                                                                    <div class="group-add-player input-group">
                                                                            <input type="text" class="form-control"/></label>
                                                                            <input type="button" value="Ajouter" class="btn btn-default"/>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    
							<div class="col-md-6">
								<h3>Tables</h3>
								<ul class="list-group">
<?php
$maps->each(function($map) {
?>
                                                                    <li class="list-group-item">
                                                                        <label class="control-label"><input type="checkbox" name="maps[<?= $map->id; ?>]"> <?= $map->name; ?></label>
<?php
});
?>
                                                                    </li>
                                                                </ul>
							</div>
                                                </div>
                                                    
                                                <hr/>
                                                    
                                                <div class="row">
                                                    <div class="col-md-6 players-pool">
                                                            <h3>Joueurs existants</h3>
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
                                                            <h3>Joueurs inscrits <span></span></h3>
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
                                                </form>
                                        </section>
                                    </section>

