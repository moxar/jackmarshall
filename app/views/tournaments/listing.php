				<section class="container">
				<h1>Tournois</h1>
				<a href="tournaments/create">Nouveau tournois</a>
				<table class="table table-striped table-condensed table-hover">
					<caption class="h2">Liste des tournois</caption>
					<thead>
						<tr>
							<th>Nom du tournois</th>
							<th>Date du tournois</th>
							<th>Nombre de participants</th>
							<th><!-- GET --></th>
							<th><!-- UPD --></th>
							<th><!-- DEL --></th>
						</tr>
					</thead>
					<tbody>
<?php
foreach($tournaments as $tournament)
{
?>
						<tr>
							<td><?php echo $tournament->name; ?></td>
							<td><?php echo $tournament->created_at; ?></td>
							<td><?php echo count($tournament->playersButFantom); ?></td>
							<td>
								<a href="tournaments/<?php echo $tournament->id; ?>/show">
									<span class="glyphicon glyphicon-circle-arrow-right"></span>
								</a>
							</td>
							<td>
								<a href="tournaments/<?php echo $tournament->id; ?>/update">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
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
					</tbody>
				</table>
			</section>
