			<h1>Ronde - <?php echo $round->number; ?></h1>
			<form method="POST">
				<table>
					<thead>
						<tr>
							<th>Game</th>
							<th>Player 1</th>
							<th>Player 2</th>
						</tr>
					</thead>
					<tbody>
<?php
foreach($round->games as $game)
{
?>
						<tr>
							<td>
								<input type="text" name="games[<?php echo $game->id; ?>][slug]" value="<?php echo $game->slug; ?>" />
							</td>
							<td>
								<input type="hidden" name="games[<?php echo $game->id; ?>][player][0]" value="<?php echo "PLACEHOLDER"; ?>" />
								<a href="reports/<?php echo "PLACEHOLDER"; ?>/update"><?php echo "PLACEHOLDER"; ?></a>
							</td>
							<td>
								<input type="hidden" name="games[<?php echo $game->id; ?>][player][1]" value="<?php echo "PLACEHOLDER"; ?>" />
								<a href="reports/<?php echo "PLACEHOLDER"; ?>/update"><?php echo "PLACEHOLDER"; ?></a>
							</td>
						</tr>
<?php
}
?>
					</tbody>
				</table>
				<input type="submit" value="Valider" />
			</form>
			<input type="button" value="Classer" id="sortButton" />
			<input type="button" value="Mélanger" id="shuffleButton" />
