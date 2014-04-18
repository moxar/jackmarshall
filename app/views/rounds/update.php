			<h1><a href="tournaments/<?php echo $round->tournament()->id; ?>"><?php echo $round->tournament()->name; ?></a> &gt; Ronde - <?php echo $round->number; ?></h1>
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
								<input class="form-control" type="text" name="games[<?php echo $game->id; ?>][slug]" value="<?php echo $game->slug; ?>" />
							</td>
<?php

	for($pt = 0; $pt < count($game->players); $pt++) {
		
		$player = $game->players[$pt];
?>
							<td>
								<input type="hidden" name="games[<?php echo $game->id; ?>][players][<?php echo $pt; ?>]" value="<?php echo $player->id; ?>" />
<?php
		if(!$round->placeHolder) {
?>
								<a href="reports/<?php echo $player->report->id; ?>/update"><?php echo $player->name; ?></a>
<?php
		}
		else
		{
?>
								<?php echo $game->players[$pt]->name."\n"; ?>
<?php
		}
?>
							</td>
<?php
	}
?>
						</tr>
<?php
}
?>
						<tr>
							<td colspan="3">
								<input type="button" value="Classer" id="sortButton" class="btn btn-default"/>
								<input type="button" value="Mélanger" id="shuffleButton" class="btn btn-default" />
							</td>
						</tr>
					</tbody>
				</table>
				<input type="submit" value="Valider"  class="btn btn-default"/>
			</form>
			
			<h1>Classement</h1>
			<table class="table table-striped table-condensed table-hover">
				<thead>
					<tr>
						<th>Joueur</th>
						<th>VP</th>
						<th>CP</th>
						<th>DP</th>
						<th>SOS</th>
					</tr>
				</thead>
				<tbody>
<?php
foreach($players as $player)
{
?>
				<tr>
					<td><?php echo $player->name; ?></td>
					<td><?php echo $player->victory; ?></td>
					<td><?php echo $player->control; ?></td>
					<td><?php echo $player->destruction; ?></td>
					<td><?php echo $player->sos; ?></td>
				</tr>
<?php
}
?>
				</tbody>
			</table>
