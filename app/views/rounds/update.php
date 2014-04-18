			<h1>Ronde - <?php echo $round->number; ?></h1>
			<form method="POST">
				<input type="hidden" name="number" value="<?php echo $round->number; ?>" />
				<table class="table table-striped table-condensed table-hover">
					<thead>
						<tr>
							<th>Game</th>
							<th>Player 1</th>
							<th>Player 2</th>
						</tr>
					</thead>
					<tbody>
<?php
foreach($games as $game)
{
?>
						<tr>
							<td>
								<input class="form-control" type="text" name="games[<?php echo $game->id; ?>][slug]" value="<?php echo $game->slug; ?>" />
							</td>
							<td>
								<input type="hidden" name="games[<?php echo $game->id; ?>][players][0]" value="<?php echo $game->players[0]->id; ?>" />
<?php
	if(!$round->placeHolder) {
?>
								<a href="#"><?php echo $game->players[0]->name; ?></a>
<?php
	}
	else
	{
?>
								<?php echo $game->players[0]->name; ?>
<?php
	}
?>
							</td>
							<td>
								<input type="hidden" name="games[<?php echo $game->id; ?>][players][1]" value="<?php echo $game->players[1]->id; ?>" />
<?php
	if(!$round->placeHolder) {
?>
								<a href="#"><?php echo $game->players[1]->name; ?></a>
<?php
	}
	else
	{
?>
								<?php echo $game->players[1]->name; ?>
<?php
	}
?>
							</td>
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
