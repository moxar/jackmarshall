			<script type="text/javascript" src="js/rounds.update.js"></script>
			<h1><a href="tournaments/<?php echo $round->tournament()->id; ?>"><?php echo $round->tournament()->name; ?></a> &gt; Ronde - <?php echo $round->number; ?></h1>
<?php
if(!$round->placeHolder) {
?>
			<a href="rounds/<?php echo $round->tournament()->id; ?>/create"><span class="glyphicon glyphicon-plus"></span> Nouvelle ronde</a>
<?php
}
?>
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
							<th>Joueur <?php echo $pt+1; ?></th>
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
								<input type="hidden" name="games[<?php echo $game->id; ?>][id]" value="<?php echo $game->id; ?>" />
								<input type="hidden" name="games[<?php echo $game->id; ?>][slug]" value="<?php echo $game->slug; ?>" />
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
<?php
		if($round->placeHolder) {
?>
							<td></td>
							<td></td>
							<td></td>
<?php
		}
		else {
?>
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
	}
?>
						</tr>
<?php
}
?>
							<!--
						<tr>
							<td colspan="3">
								<input type="button" value="Classer" id="sortButton" class="btn btn-default"/>
								<input type="button" value="Mélanger" id="shuffleButton" class="btn btn-default" />
							</td>
						</tr>
							-->
					</tbody>
				</table>
				<input type="submit" value="Valider"  class="btn btn-default"/>
			</form>
