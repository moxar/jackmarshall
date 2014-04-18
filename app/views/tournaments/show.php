			<h1><?php echo $tournament->name; ?> > Rondes</h1> 
			<table class="table table-striped table-condensed table-hover">
				<thead>
					<tr>
						<th>Ronde</th>
						<th><!-- DEL --></th>
					</tr>
				</thead>
				<tbody>
<?php
foreach($tournament->rounds as $round)
{
?>
				<tr>
					<td><a href="rounds/<?php echo $round->id; ?>/update">Ronde <?php echo $round->number; ?></a></td>
					<td><a href="rounds/<?php echo $round->id; ?>/delete"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
<?php
}
?>
				<tr>
					<td colspan="2"><a href="rounds/<?php echo $tournament->id; ?>/create">Nouvelle ronde</a></td>
				</tr>
				</tbody>
			</table>
			
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