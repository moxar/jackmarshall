			<section class="container" id="rankingSection">
				<h1>Classement</h1>
				<table class="table table-striped table-condensed table-hover">
					<thead>
						<tr>
							<th>Joueur</th>
							<th>VP</th>
							<th>SOS</th>
							<th>CP</th>
							<th>DP</th>
						</tr>
					</thead>
					<tbody>
<?php
$it = 0;
$players->each(function($player) use(&$it) {
	$it++;
?>
					<tr>
						<td><?= $it.". ".$player->name; ?></td>
						<td><?= $player->victory; ?></td>
						<td><?= $player->sos; ?></td>
						<td><?= $player->control; ?></td>
						<td><?= $player->destruction; ?></td>
					</tr>
<?php
});
?>
					</tbody>
				</table>
			</section>