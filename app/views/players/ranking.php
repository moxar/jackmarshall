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
						<td><?= $player->name; ?></td>
						<td><?= $player->victory; ?></td>
						<td><?= $player->control; ?></td>
						<td><?= $player->destruction; ?></td>
						<td><?= $player->sos; ?></td>
					</tr>
<?php
}
?>
					</tbody>
				</table>
			</section>