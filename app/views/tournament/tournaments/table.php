			<nav>Tournois</nav>
			<h1>Tournois</h1>
			<table class="table table-striped table-condensed table-hover">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Date</th>
						<th>Participants</th>
						<th><!-- DEL --></th>
					</tr>
				</thead>
				<tbody>
<?php
foreach($tournaments as $tournament) {
?>
					<tr>
						<td>
							<a href="tournaments/<?php echo $tournament->id; ?>"><?php echo $tournament->name; ?></a>
						</td>
						<td><?php echo $tournament->created_at; ?></td>
						<td>
							<?php echo count($tournament->playersButFantom); ?>
							<a href="tournaments/<?php echo $tournament->id; ?>/update">(Contrôler)</a>
						</td>
						<td>
							<a href="tournaments/<?php echo $tournament->id; ?>/delete">
								<span class="glyphicon glyphicon-remove"></span>
							</a>
						</td>
					</tr>
<?php
}
?>
					<tr>
						<td colspan="6"><a href="tournaments/create"><span class="glyphicon glyphicon-plus"></span> Nouveau tournois</a></td>
					</tr>
				</tbody>
			</table>
