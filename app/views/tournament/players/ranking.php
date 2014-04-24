			<section class="container" id="rankingSection">
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
			</section>