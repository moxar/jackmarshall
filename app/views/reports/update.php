			<section class="container">
				<nav>
					<a href="tournaments/<?= $round->tournament()->id; ?>"><?= $round->tournament()->name; ?></a>
					&gt; Ronde - <?= $round->number; ?>
				</nav>
				<h1>Rapports de partie</h1>
				<form method="POST">
					<input type="hidden" name="number" value="<?= $round->number; ?>" />
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
									<input type="hidden" name="games[<?= $game->id; ?>][players][<?= $pt; ?>]" value="<?= $player->id; ?>" />
									<?= $player->name."\n"; ?>
								</td>
								<td>
									<input class="scoreInput" type="text" data-id="<?= $report->id; ?>" data-score="victory" value="<?= $report->victory; ?>" />
								</td>
								<td>
									<input class="scoreInput" type="text" data-id="<?= $report->id; ?>" data-score="control" value="<?= $report->control; ?>" />
								</td>
								<td>
									<input class="scoreInput" type="text" data-id="<?= $report->id; ?>" data-score="destruction" value="<?= $report->destruction; ?>" />
								</td>
<?php
	}
?>
							</tr>
<?php
}
?>
							<tr>
								<td colspan="<?= 1+count($games[0]->players)*4; ?>">
									<a href="rounds/<?= $round->tournament()->id; ?>/create"><span class="glyphicon glyphicon-plus"></span> Nouvelle ronde</a>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</section>