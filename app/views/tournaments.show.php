			<h1>Rondes - <?php echo $tournament->name; ?></h1> 
			<ul>
<?php
foreach($tournament->rounds() as $round)
{
?>
				<li><a href="rounds/<?php echo $round->id; ?>">Ronde <?php echo $round->number; ?></a></li>
<?php
}
?>
			</ul>
			<form method="POST" action="rounds/create">
				<input type="hidden" name="tournament" value="<?php echo $tournament->id; ?>" />
				<input type="submit" value="Nouvelle ronde" />
			</form>
			
			<h1>Classement</h1>
			<table>
				<thead>
					<tr>
						<th>Joueur</th>
						<th>VP</th>
						<th>CP</th>
						<th>DP</th>
					</tr>
				</thead>
				<tbody>
<?php
foreach($players as $player)
{
?>
				<tr>
					<td><?php echo $player->name; ?></td>
					<td><?php echo $player->VP; ?></td>
					<td><?php echo $player->CP; ?></td>
					<td><?php echo $player->DP; ?></td>
				</tr>
<?php
}
?>
				</tbody>
			</table>