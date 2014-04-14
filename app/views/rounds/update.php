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
$jj = 0;
for($ii = 0; $ii < count($players); $ii+=2)
{
?>					
						<tr>
							<td>
								<input type="hidden" name="games[<?php echo $jj; ?>][slug]" value="<?php echo "ronde ".$round->number.": table ".$jj; ?>" />
								<?php echo $jj; ?>
							</td>
							<td>
								<input type="hidden" name="games[<?php echo $jj; ?>][player][1]" value="<?php echo $players[$ii]->id; ?>" />
								<?php echo $players[$ii]->name; ?>
							</td>
							<td>
								<input type="hidden" name="games[<?php echo $jj; ?>][player][2]" value="<?php echo $players[$ii+1]->id; ?>" />
								<?php echo $players[$ii+1]->name; ?>
							</td>
						</tr>
<?php
$jj++;
}
?>
					</tbody>
				</table>
				<input type="submit" value="Démarer" />
			</form>
