			<h1>Rondes - <?php echo $tournament->name; ?></h1> 
			<ul>
<?php
foreach($tournament->rounds as $round)
{
?>
				<li><a href="rounds/<?php echo $round->id; ?>">Ronde <?php echo $round->number; ?></a></li>
<?php
}
?>
			</ul>
			<a href="rounds/<?php echo $tournament->id; ?>/create">Nouvelle ronde</a>
			
			<h1>Classement</h1>
			<table>
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
					<td><?php echo $player->vp; ?></td>
					<td><?php echo $player->cp; ?></td>
					<td><?php echo $player->dp; ?></td>
					<td><?php echo $player->sos; ?></td>
				</tr>
<?php
}
?>
				</tbody>
			</table>