			<section class="container">
				<nav>
					<a href="tournaments/<?= $tournament->id; ?>"><?= $tournament->name; ?></a>
					&gt; Ronde - <?= $round->number; ?>
				</nav>
				<h1>Nouvelle ronde</h1>
				<section class="view round-create">
					<form method="POST">
						<section class="players-pool has-error">
							<div class="row">
								<p class="col-sm-2 cell th">Table</p>
								<p class="col-sm-2 cell th">Joueur 1</p>
								<p class="col-sm-2 cell th">Joueur 2</p>
							</div>
<?php
$it = 0; 
$players->each(function(&$p) use($tournament, &$it, &$maps) {
	$it++;
	$p->name = $it.". ".$p->name;
	$game = ceil($it / 2);
	switch($it % 2) {
		case 1:
                        $map = $maps->shift();
?>
							<div class="row">
								<p class="col-sm-2 cell th"
									data-id="<?= $map->id; ?>"
									data-name="<?= $map->name; ?>">
										<span><?= $map->name;?></span>
										<input type="hidden" name="games[<?= $game; ?>][slug]" value="game <?= $game; ?>"/>
										<input type="hidden" name="games[<?= $game; ?>][map]" value="<?= $map->id; ?>"/>
								</p>
								<p class="col-sm-2 cell" 
									data-id="<?= $p->id; ?>" 
									data-name="<?= $p->name; ?>" 
									data-opponents="<?= $p->opponents($tournament)->get()->implode('id', ',') ?>"
									data-maps="<?= $p->maps($tournament)->implode('id', ','); ?>"
									>
									<span><?= $p->name; ?></span>
									<input type="hidden" name="games[<?= $game; ?>][players][1]" value="<?= $p->id; ?>"/>
								</p>
<?php
			break;
		case 0:
?>
								<p class="col-sm-2 cell" 
									data-id="<?= $p->id; ?>" 
									data-name="<?= $p->name; ?>" 
									data-opponents="<?= $p->opponents($tournament)->get()->implode('id', ',') ?>"
									data-maps="<?= $p->maps($tournament)->implode('id', ','); ?>"
									>
									<span><?= $p->name; ?></span>
									<input type="hidden" name="games[<?= $game; ?>][players][2]" value="<?= $p->id; ?>"/>
								</p>
							</div>
<?php
			break;
	}
});
?>
						
						
						</section>
						<input type="hidden" name="number" value="<?= $round->number; ?>" />
						<input type="submit" value="Créer" class="btn btn-default"/>
						<input type="button" value="Mélanger" class="btn btn-default btn-shuffle" />
					</form>
				</section>
			
