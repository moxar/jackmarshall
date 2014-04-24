				<nav>
					<a href="tournaments/<?php echo $round->tournament()->id; ?>"><?php echo $round->tournament()->name; ?></a>
					&gt; Ronde - <?php echo $round->number; ?>
				</nav>
				<script type="text/javascript" src="js/reports.update.js"></script>
				<h1>Rapports de partie</h1>
				<form method="POST">
					<input type="hidden" name="number" value="<?php echo $round->number; ?>" />
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
									<p><?php echo $game->slug; ?></p>
								</td>
<?php
	for($pt = 0; $pt < count($game->players); $pt++) {
		$player = $game->players[$pt];
		$report = $player->report;
?>
								<td>
									<input type="hidden" name="games[<?php echo $game->id; ?>][players][<?php echo $pt; ?>]" value="<?php echo $player->id; ?>" />
									<?php echo $player->name."\n"; ?>
								</td>
								<td>
									<input class="scoreInput" type="text" data-id="<?php echo $report->id; ?>" data-score="victory" value="<?php echo $report->victory; ?>" />
								</td>
								<td>
									<input class="scoreInput" type="text" data-id="<?php echo $report->id; ?>" data-score="control" value="<?php echo $report->control; ?>" />
								</td>
								<td>
									<input class="scoreInput" type="text" data-id="<?php echo $report->id; ?>" data-score="destruction" value="<?php echo $report->destruction; ?>" />
								</td>
<?php
	}
?>
							</tr>
<?php
}
?>
							<tr>
								<td colspan="<?php echo 1+count($games[0]->players)*4; ?>">
									<a href="rounds/<?php echo $round->tournament()->id; ?>/create"><span class="glyphicon glyphicon-plus"></span> Nouvelle ronde</a>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
