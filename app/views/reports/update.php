			<section class="container reports-update">
				<nav>
					<a href="tournaments/<?= $round->tournament()->id; ?>"><?= $round->tournament()->name; ?></a>
					&gt; Ronde - <?= $round->number; ?>
				</nav>
				<h1>Rapports de partie</h1>
				<input type="hidden" name="tournament" value="<?= $round->tournament()->id; ?>" />
				<table class="table table-striped table-condensed table-hover">
					<thead>
						<tr>
							<th>Partie</th>
<?php
if(!empty($games[0])){
	for($pt = 0; $pt < count($games[0]->players); $pt++) {
?>
							<th>Joueur</th>
							<th>Victoire</th>
							<th>Contrôle</th>
							<th>Destruction</th>
<?php
	}
}
?>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td colspan="<?= 1+count($games[0]->players)*4; ?>">
								<a href="rounds/<?= $round->tournament()->id; ?>/create" class="disabled"><span class="glyphicon glyphicon-plus"></span> Nouvelle ronde</a>
							</td>
						</tr>
					</tfoot>
					<tbody>
<?php
foreach($games as $game) {
?>
						<tr>
							<td>
								<p><?= $game->slug; ?></p>
							</td>
<?php

	for($pt = 0; $pt < count($game->players); $pt++) {
		
		$player = $game->players[$pt];
		$report = $player->report;
?>
							<td>
								<input type="hidden" name="report" value="<?= $report->id; ?>" />
								<?= $player->name."\n"; ?>
							</td>
							<td>
								<input class="score form-control" type="text" name="victory" value="<?= $report->victory; ?>" />
							</td>
							<td>
								<input class="score form-control" type="text" name="control" value="<?= $report->control; ?>" />
							</td>
							<td>
								<input class="score form-control" type="text" name="destruction" value="<?= $report->destruction; ?>" />
							</td>
<?php
	}
?>
						</tr>
<?php
}
?>
					</tbody>
				</table>
				<button class="btn btn-primary btn-save" />
					<span>enregistrer</span>
					<i class="fa fa-spinner"></i>
				</button>
			</section>